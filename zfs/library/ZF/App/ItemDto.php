<?php
/**
 * Description of ItemDto
 *
 * @author Cod
 */

namespace ZF\App;
class ItemDto {
    
    /**
     *
     * @var string 
     */
    public $name;
    
    /**
     *
     * @var string 
     */
    public $description;
    
    /**
     *
     * @var int 
     */
    public $id;
    
   
    
    public function __get($property){
        return $this->$property;
    }
    
    public function __set($property, $value){
        $this->$property = $value;
    }
    
}
