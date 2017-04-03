<?php

namespace Application\Event;

use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Application\Event\HelloEvent;

class HelloListener implements ListenerAggregateInterface
{
	private $listeners = [];

    public function attach(EventManagerInterface $events, $priority = 200)
    {
        $sharedEvents = $events->getSharedManager();
        $this->listeners[] = $sharedEvents->attach('Application\Controller\IndexController', HelloEvent::EVENT_HELLO_POST, [$this, 'onHello'], $priority);
    }

    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            $events->detach($listener);
            unset($this->listeners[$index]);
        }
    }

    public function onHello(EventInterface $event)
    {
        // Retrieving data from the controller
        $data = $event->getParams();

        // Example event
        //var_dump("EXAMPLE EVENT WITH ZF3 RETURN MESSAGE: Hello World");
    }
}
