<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test
 *
 * @author C_O_D
 */
class ZF_Plugins_test extends Zend_Controller_Plugin_Abstract {
    //put your code here
    protected $layout;
    
    public function __construct(Zend_Layout $layout) {
        $this->layout = $layout;
    }
    
    public function preDispatch(Zend_Controller_Request_Abstract  $request){
        $moduleName = $request->getModuleName();
        if ($moduleName == 'admin') {
                $this->layout->setLayout('admin');
                $view = $this->layout->getView();
                //pr($view);
        }else{
                $this->layout->setLayout('layout'); 
        }
    }
    
    
}

