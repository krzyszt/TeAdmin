<?php

namespace TeAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel,
    Zend\View\Model\JsonModel;

class UserController extends \ZfcUser\Controller\UserController {
    
    public function indexAction() {
         $result = new JsonModel(array(
            'data' => 'I am User Index Action',
            'success' => true,
        ));
        return $result;
       
    }
    
    public function loginAction() {
        $request = $this->getRequest();
        $result = new JsonModel(array(
            'data' => 'I am User Login Action',
            'success' => true,
        ));
        return $result;
        
    }

}

