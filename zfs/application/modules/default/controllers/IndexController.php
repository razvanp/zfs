<?php

class Default_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        
        //pr(APPLICATION_PATH);
        $u = new ZF\Entity\User();
        var_dump($u);
    }

    public function testAction()
    {
        // action body
    }


}



