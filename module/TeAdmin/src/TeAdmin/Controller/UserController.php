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
    
    public function listAction() {
        $em = $this->em()->getEntityManager();
        $query = $em->createQuery('SELECT u FROM TeAdmin\Entity\User u');
        $dataArray = $query->getResult();
        $data = array();
        foreach ($dataArray as $object) {
            $data[] = $object->getArrayCopy();
        }
        $result = new JsonModel(array(
            'data' => $data,
            'success' => true,
        ));
        return $result;
    }

}

