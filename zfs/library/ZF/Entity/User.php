<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Razvan
 */
namespace ZF\Entity;

/**
 * @Table(name="users")
 * @Entity
 * @author Razvan
 */
class User {
    /**
     * @var integer $id
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @Column(type="string",length=60, nullable=false)
     * @var string
     */
    private $firstName;
    
    /**
     * @Column(type="string", length=60, nullable=false)
     * @var string
     */
    private $lastName;
    
    public function __get($property){
        return $this->$property;
    }
    
    public function __set($property, $value){
        $this->$property = $value;
    }
}

