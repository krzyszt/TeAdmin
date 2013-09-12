<?php

namespace TeAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $sm = $this->getServiceLocator();
        $auth = $sm->get('zfcuser_auth_service');
        if ($auth->hasIdentity()) {
            echo $auth->getIdentity()->getEmail();
        } else {
            return new ViewModel();
        }
    }

}

