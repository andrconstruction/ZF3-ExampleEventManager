<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\EventManager\EventInterface;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;
use Application\Event\HelloListener;

class Module
{
    const VERSION = '3.0.3-dev';

    public function onBootstrap(EventInterface $e)
    {
        $application = $e->getApplication();
        $serviceManager = $application->getServiceManager();
        $eventManager = $application->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

		$hello = $serviceManager->get(HelloListener::class);
		$hello->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
