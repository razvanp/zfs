<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserPassword
 *
 * @author Cod
 */
class Default_Form_ItemEditorTest extends PHPUnit_Framework_Testcase{
    //put your code here
    public function testCanTest(){
            $form = new Default_Form_ItemEditor(array('itemId' => 4));
            $this->assertType('Default_Form_ItemEditor', $form);

    }
    
    public function testFormElementsExits() {
        $form = new Default_Form_ItemEditor(array('itemId' => 4, 'test'=>'here'));
        $this->assertType('Zend_Form_Element_Text', $form->getElement('name'));
        $this->assertType('Zend_Form_Element_Textarea', $form->getElement('description'));
        $this->assertType('Zend_Form_Element_Hidden', $form->getElement('id'));
    }

    
    
}

