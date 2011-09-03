<?php

class Default_IndexController extends Zend_Controller_Action
{
    /**
     * @var Zend_Session_Namespace
     */
    public function preDispatch() {
        
        
    }




    public function init()
    {
        /* Initialize action controller here */
//        $this->_flashMessenger =
//            $this->_helper->getHelper('FlashMessenger');
        
        
    }

    public function indexAction()
    {
        // action body
        //$this->view->message = $this->session->pageCounter;
        
        //pr(APPLICATION_PATH);
        //$u = new ZF\Entity\User();
        //var_dump($u);
        //$this->_flashMessenger->addMessage(array('error'=>'recored saved'));
        //$this->view->messages = $this->_flashMessenger->getMessages();
        $this->view->formreg = new Default_Form_RegTest();
        
        
    }

    public function testAction()
    {
        // action body
        //$this->view->messages = $this->_flashMessenger->getMessages();
    }


}



