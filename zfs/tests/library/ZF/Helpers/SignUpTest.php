<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SignUpTest
 *
 * @author Cod
 */


class ZF_Helpers_SignUpTest extends \Zend_Test_PHPUnit_ControllerTestCase
{
    
    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
    public function testInstanceOfHelper()
    {
        $helper = new ZF_Helpers_SignUp();
        $this->assertType('ZF_Helpers_SignUp',$helper);
    }
    
    public function testCanGetSignupInHtml()
    {
        $params = array('action' => 'index', 'controller' => 'index', 'module' => 'default');
        $urlParams = $this->urlizeOptions($params);
        $url = $this->url($urlParams);
        $controller = new Default_IndexController($this->getRequest(), $this->getResponse(), array());
        $this->dispatch($url);
        $this->assertAction('index');
        $this->assertContains('Please sign UP!',$controller->getResponse()->getBody());
        //die();
    }
    
    public function testUrlParamsSingUp(){
        $this->getRequest()->setParam('logIn', 1);
        $this->dispatch('/');
        $this->assertAction('index');
        $this->assertContains('You are logged in',$this->getResponse()->getBody());
    }
    
    public function testHelper()
    {
        $helper = new ZF_Helpers_SignUp();
        $this->dispatch('/');
        $controller = new Default_IndexController($this->getRequest(), $this->getResponse(), array());
        
        $helper->setActionController($controller);
        
        $this->assertType('Zend_View',$helper->getView());
        
        
    }
    
    public function testVariableHelper()
    {
        $helper = new ZF_Helpers_SignUp();
        $this->getRequest()->setParam('logIn', '1');
        $this->dispatch('/');
        $controller = new Default_IndexController($this->getRequest(), $this->getResponse(), array());
        
        $helper->setActionController($controller);
        
        $this->assertEquals('You are logged in',$helper->getView()->signup);
        
        
    }
    
    
    
}
