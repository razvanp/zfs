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
    //put your code here
    
    /**
     * Get doctrine container
     *
     * @var \Bisna\Application\Container\DoctrineContainer
     */
    protected $doctrineContainer;

    public static function dropSchema($params) {
        if(file_exists($params['path'])){
            chmod($params['path'], 0777);
            unlink($params['path'] );
        }
    }

    public function getCalassMetas($path, $namespace) {
        $metas = array();
        $handle = opendir($path);
        if ($handle) {
            while (false !== ($file = readdir($handle))) {
                if (strstr($file, '.php')) {
                    
                    list($class) = explode('.', $file);
                    $metas[] = $this->doctrineContainer->getEntityManager()->getClassMetadata($namespace . $class);
                }
            }
        }

        return $metas;
    }
    
    
    public function setUp(){
        $this->doctrineContainer = Zend_Registry::get('doctrine');
        
        self::dropSchema($this->doctrineContainer->getConnection()->getParams());
        
        $tool = new \Doctrine\ORM\Tools\SchemaTool($this->doctrineContainer->getEntityManager());
        
        $tool->createSchema($this->getCalassMetas(APPLICATION_PATH . "/../library/ZF/Entity", "ZF\Entity\\"));
        
        parent::setUp();
    }
    
    public function tearDown(){
        parent::tearDown();
    }
    
}
