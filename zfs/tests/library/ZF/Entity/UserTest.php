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
    //put your code her
    
    public function testFirstname(){
        
        $u = new User();
        
        $u->firstName = "jone";
        $u->lastName = "alfa";
        
        $em = $this->doctrineContainer->getEntityManager();
        $em->persist($u);
        $em->flush();
        
        $users = $em->createQuery('select u from Zf\Entity\User u')->execute();
        $this->assertEquals(1, count($users));
        //$this->assertTrue(true);
    }
    
    
}
