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

//    public static function dropSchema($params) {
//        if(file_exists($params['path'])){
//            chmod($params['path'], 0777);
//            unlink($params['path'] );
//        }
//    }
//    public function getCalassMetas($path, $namespace) {
//        $metas = array();
//        $handle = opendir($path);
//        if ($handle) {
//            while (false !== ($file = readdir($handle))) {
//                if (strstr($file, '.php')) {
//                    
//                    list($class) = explode('.', $file);
//                    $metas[] = $this->doctrineContainer->getEntityManager()->getClassMetadata($namespace . $class);
//                }
//            }
//        }
//
//        return $metas;
//    }


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
    
    
    public function getTestUser($name)
    {
        $user = new ZF\Entity\User();
        $user->firstName = $name;
        $user->lastName = "Constantin";
        return $user;
    }
    
    public function getProductOrange()
    {
        $product = new ZF\Entity\Product();
        $product->name = "Oranges";
        $product->amount = 2.66;
        $this->doctrineContainer->getEntityManager()->persist($product);
        return $product;
    }
    
    public function getProductApple()
    {
        $product = new ZF\Entity\Product();
        $product->name = "Apples";
        $product->amount = 2.66;
        $this->doctrineContainer->getEntityManager()->persist($product);
        return $product;
    }
    
    public function getPurchase()
    {
        $purchase = new \ZF\Entity\Purchase();
        $purchase->storeName = "My Store";
        return $purchase;
    }
    
}
