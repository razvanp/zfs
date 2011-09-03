<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserTest
 *
 * @author msg-prog
 */

namespace ZF\Entity;

class PurchaseTest extends \ModelTestCase{

//    public function testCanAddPurchesesToUser(){
//        
//        $em = $this->doctrineContainer->getEntityManager();
//        
//        $u1 = new User();
//        $u1->firstName = "Andy";
//        $u1->lastName = "Murray";
//
//        $purchese1= new Purchase();
//        $purchese1->amount = 12;
//        $purchese1->storeName = "3A";
//        
//        
//        $purchese2= new Purchase();
//        $purchese2->amount = 12;
//        $purchese2->storeName = "3B";
//        
//        
//        //$u = $this->getUser();
//        $u1->purchases = array($purchese1, $purchese2);
//        
//        $em->persist($u1);
//        $em->flush();
//        
//        
//        $all = $em->createQuery('select u1 from ZF\Entity\User u1')->execute();
//        
//        $this->assertEquals(2,count($all[0]->purchases));
//        $this->assertEquals(0,$all[0]->purchases[0]->amount);
//        $em->clear();
//        //var_dump($all[0]->purchase->toArray());
//        
//    }
    
    public function testAmountIsUpdatedOnSave()
    {
        $purchase = $this->getPurchase();
        $purchase->products = array($this->getProductApple(),$this->getProductOrange());
        
        $em = $this->doctrineContainer->getEntityManager();
        $em->persist($purchase);
        $em->flush();
        
        $this->assertEquals($this->getProductOrange()->amount + $this->getProductApple()->amount,$purchase->amount);
    }
    
    
}
