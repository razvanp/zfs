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
 * @Table(name="userauth")
 * @Entity
 * @author Razvan
 */
class UserAuth {
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
    private $username;
    
    /**
     * @Column(type="string", length=60, nullable=false)
     * @var string
     */
    private $password;
    
    /**
     * @Column(type="string", length=60, nullable=false)
     * @var string
     */
    private $name;
    
    /**
     * @Column(type="string", length=60, nullable=false)
     * @var string
     */
    private $role;
    
    public function __get($property){
        return $this->$property;
    }
    
    public function __set($property, $value){
        $this->$property = $value;
    }
}