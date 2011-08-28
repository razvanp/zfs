<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Purchase
 *
 * @author Cod
 */
namespace ZF\Entity;
/**
 * @Table(name="purchases")
 * @Entity
 */
class Purchase {
    /**
     * @var integer $id
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     *
     * @var datetime
     * @Column(type="datetime", nullable=false) 
     */
    private $created;
    
    /**
     *
     * @var string
     * @Column(type="string") 
     */
    private $itemName;
    
    /**
     *
     * @var decimal
     * @Column(type="decimal", precision=2, scale=4) 
     */
    private $amount;
    
    /**
     *
     * @var User 
     * @ManyToOne(targetEntity="User") 
     * @JoinColumn({
     *  @JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;
    
    public function __construct(){
        $this->created = new \DateTime(date("Y-m-d H:i:s"));
    }



    public function __get($property){
        return $this->$property;
    }
    
    public function __set($property, $value){
        $this->$property = $value;
    }
    
}
