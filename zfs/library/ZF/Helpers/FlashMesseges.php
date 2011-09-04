<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlashMesseges
 *
 * @author Cod
 */
class ZF_Helpers_FlashMesseges extends Zend_Controller_Action_Helper_Abstract{
    //put your code here
    //put your code here
    protected $view;


    public function preDispatch()
    {
        $view = $this->getView();
        
        $controller = $this->getActionController();
        $controller->_flashMessenger = $controller->getHelper('FlashMessenger');
        $this->view->flashmessages = $controller->_flashMessenger->getMessages();
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
