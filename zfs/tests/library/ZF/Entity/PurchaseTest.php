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

    public function testCanAddPurchesesToUser(){
        
        $em = $this->doctrineContainer->getEntityManager();
        
        $u1 = new User();
        $u1->firstName = "Andy";
        $u1->lastName = "Murray";

        $purchese1= new Purchase();
        $purchese1->amount = 12;
        $purchese1->itemName = "Primul test";
        
        
        $purchese2= new Purchase();
        $purchese2->amount = 12;
        $purchese2->itemName = "Seccond test";
        
        
        //$u = $this->getUser();
        $u1->purchase = array($purchese1, $purchese2);
        
        $em->persist($u1);
        $em->flush();
        
        $all = $em->createQuery('select u1 from ZF\Entity\User u1')->execute();
        
        $this->assertEquals(2,count($all[0]->purchase));
        
        //var_dump($all[0]->purchase->toArray());
        
    }
    
    
}
