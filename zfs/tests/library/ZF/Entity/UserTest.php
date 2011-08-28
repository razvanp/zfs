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

class UserTest extends \ModelTestCase{

    
    public function testCanCreateUser(){
        $this->assertInstanceOf('ZF\Entity\User', new User());
    }


    public function testFirstName(){
        
        $em = $this->doctrineContainer->getEntityManager();
        
        $v = new User;
        $v->firstName = "Jon";
        $v->lastName = "Smith";
        

        $em->persist($v);
        $em->flush();
        
        //$em->clear();
        $users = $em->createQuery('select u from ZF\Entity\User u')->execute();
        $this->assertEquals(1, count($users));
        $this->assertTrue(true);
    }
    
  
    
    
}
