<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Event\HelloEvent;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $data = [
			'data' => 'test event'
		];

        $event = new HelloEvent(__METHOD__, null, [
			'data' => $data,
		]);

        $this->getEventManager()->trigger(HelloEvent::EVENT_HELLO_PRE, $this, $event);

        $this->getEventManager()->trigger(HelloEvent::EVENT_HELLO_POST, $this, $event);

        return new ViewModel();
    }
}
