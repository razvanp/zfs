<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    
    protected function _initViewHelpers() {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        //$view->setHelperPath(APPLICATION_PATH.'/modules/admin', '');
        $view->doctype('XHTML1_STRICT');
        $view->headMeta()->appendHttpEquiv('Content-type', 'text/html;charset=utf-8');
        $view->headMeta()->appendHttpEquiv('content-language', 'en');
        //$fc = Zend_Controller_Front::getInstance();
        //$x = Zend_Auth::getInstance();
        //$fc->registerPlugin(new Admin_Plugin_AccessCheck(Zend_Layout::getMvcInstance(), Zend_Auth::getInstance()  , new Application_Model_AclLog()));
        //$navArray = new Zend_Config_Xml(APPLICATION_PATH.'/configs/nav.xml' , 'nav');
        //$nav = new Zend_Navigation($navArray);
        //$/view->navigation($nav);
    }

    protected function _initPlugins(){
        $fc = Zend_Controller_Front::getInstance();

        //$this->bootstrap('FrontController');
        //$this->bootstrap('layout');
        //$layout = $this->getResource('layout');
        //$view = $layout->getView();
        $fc->registerPlugin(new ZF_Plugins_test(Zend_Layout::getMvcInstance()));
        //$this->bootstrap('layout');
    }
    
    protected function _initActinHelper()
    {
        Zend_Controller_Action_HelperBroker::addHelper(new ZF_Helpers_SignUp());
    }

}

