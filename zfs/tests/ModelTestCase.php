<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelTestCase
 *
 * @author msg-prog
 */
class ModelTestCase extends PHPUnit_Framework_Testcase{
    /**
     * Get doctrine container
     *
     * @var \Bisna\Application\Container\DoctrineContainer
     */
    protected $doctrineContainer;

    public function setUp(){
        $this->doctrineContainer = Zend_Registry::get('doctrine');
        
        //self::dropSchema($this->doctrineContainer->getConnection()->getParams());
        $this->doctrineContainer->getConnection()->close();
        $em = $this->doctrineContainer->getEntityManager();
        $tool = new \Doctrine\ORM\Tools\SchemaTool($em);
        $tool->dropDatabase();
        
        //$metas = $this->getCalassMetas(APPLICATION_PATH . "/../library/ZF/Entity", "ZF\Entity\\");

        $allMetas = $em->getMetadataFactory()->getAllMetadata();
        $tool->createSchema($allMetas);
        parent::setUp();
    }
    
    public function tearDown(){
        
        $this->doctrineContainer->getConnection()->close();
        $em = $this->doctrineContainer->getEntityManager();
        $tool = new \Doctrine\ORM\Tools\SchemaTool($em);
        $tool->dropDatabase();
        parent::tearDown();
    }
    
}
