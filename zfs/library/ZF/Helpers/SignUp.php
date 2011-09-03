<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SignUp
 *
 * @author Cod
 */

class ZF_Helpers_SignUp extends Zend_Controller_Action_Helper_Abstract
{
    //put your code here
    protected $view;


    public function preDispatch()
    {
        $view = $this->getView();
        if ($this->getRequest()->getParam('logIn',FALSE)) {
            $view->signup = 'You are logged in';
        } else {
            $view->signup = 'Please sign UP!';
        }
        
    }
    
    public function getView()
    {
        if (null !== $this->view) {
            return $this->view;
        }
        $controller = $this->getActionController();
        $this->view = $controller->view;
        return $this->view;
    }
    
}
