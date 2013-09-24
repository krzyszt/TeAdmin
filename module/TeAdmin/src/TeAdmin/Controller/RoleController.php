<?php

namespace TeAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\JsonModel;

class RoleController extends AbstractActionController {

    public function listAction() {
        $em = $this->em()->getEntityManager();
        $query = $em->createQuery('SELECT r FROM TeAdmin\Entity\Role r');
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

