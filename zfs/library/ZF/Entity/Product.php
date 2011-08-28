<?php


/**
 * Description of Product
 *
 * @author Cod
 */

namespace ZF\Entity;
/**
 * @Table(name="products")
 * @Entity
 */
class Product {
    /**
     * @var integer $id
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     *
     * @ManyToMany(targetEntity="Purchase", mappedBy="products", cascade={"ALL"})
     */
    private $purchases;
    
    /**
     *
     * @Column(type="string")
     */
    private $name;
    
    /**
     *
     * @Column(type="decimal", precision=2, scale=4) 
     */
    private $amount;


    public function __get($property){
        return $this->$property;
    }
    
    public function __set($property, $value){
        $this->$property = $value;
    }
    
}
