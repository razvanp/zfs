<?php

class Default_Form_RegTest extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('post');
        $fname = new Zend_Form_Element_Text('name');
        $fname->setLabel('First name')->setRequired(TRUE);
        
        $lastName = new Zend_Form_Element_Text('lastname');
        $lastName->setLabel('Last name')->setRequired(TRUE);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setValue('Submit');

        
        $this->addElements(array($fname,$lastName,$submit));
        
        
        //$fname->setDecorators(array('ViewHelper','Label'));
        //$submit->setDecorators(array('ViewHelper'));
        
        $this->setElementDecorators(array(
            'ViewHelper',
            array( array('data' =>'HtmlTag'),array('tag'=>'td', 'class'=>"element") ),
            array('Label', array('tag'=>'td')),
            array(array('row' => 'HtmlTag'), array('tag'=>'tr'))
        ));
        $submit->setDecorators(array(
            'ViewHelper',
             array( array('data' =>'HtmlTag'),array('tag'=>'td', 'class'=>"element") ),
             array(array('emptyrow'=>'HtmlTag'), array('tag'=>'td', 'placement'=>'PREPEND')),
             array(array('row' => 'HtmlTag'), array('tag'=>'tr'))
            ));
        
        
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag'=>'table')),
            //array('HtmlTag', array('tag' => 'dl', 'placement'=>'REPLACE', 'class'=>'test')),
            'Form'
        ));
    }


}

