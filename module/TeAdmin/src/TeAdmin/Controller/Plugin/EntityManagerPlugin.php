<?php

namespace TeAdmin\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin,
    Doctrine\ORM\EntityManager;

class EntityManagerPlugin extends AbstractPlugin {
    
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function setEntityManager(EntityManager $em) {
        $this->em = $em;
    }

    public function getEntityManager() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
    
}
