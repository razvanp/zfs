<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FForm
 *
 * @author Cod
 */


class ZF_Forms_FForm extends Zend_Form{
    
    
    private $controller;


    public function setController($value){
        $this->controller = $value;
    }
    
    public function startup($object, $callback)
    {
        $args = func_get_args();
        array_unshift($args, $this);
        if ($this->controller->getRequest()->isPost() === true) {
            echo call_user_func_array($callback, $args);
        } else {
            return;
        }
    }
    
    
    protected function getFormParams()
    {
        if ($this->isValid($this->controller->getRequest()->getParams())) {
            return $this->controller->getRequest()->getParams();
        } else {
            throw new Zend_Exception('Your form have: '. count($this->getMessages()) . 'errors');
        }
    }
    
    
    
}
