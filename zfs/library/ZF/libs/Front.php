<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ZF_Libs_Front {
    
    protected static $_front;
    
    /**
     * Retrieve singleton instance
     *
     * @return Zend_Loader_Autoloader
     */
    public static function getInstance()
    {
        if (null === self::$_front) {
            self::$_front = new self();
        }
        return self::$_front;
    }
    
    
}


