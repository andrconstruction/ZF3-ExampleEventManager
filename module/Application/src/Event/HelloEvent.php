<?php

namespace Application\Event;

use Zend\EventManager\Event;

class HelloEvent extends Event
{
	const EVENT_HELLO_PRE = 'hello.pre';
    const EVENT_HELLO_POST = 'hello.post';
}
