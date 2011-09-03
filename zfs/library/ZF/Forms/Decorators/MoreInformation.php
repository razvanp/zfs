<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MoreInformation
 *
 * @author Cod
 */
class ZF_Forms_Decorators_MoreInformation  extends Zend_Form_Decorator_Abstract{
    //put your code here
    public function render($content) 
    {
        $placement = $this->getPlacement();
        $text = $this->getOption('text');
        $output = '<td colspan="2" style="border: 1px solid green;"><p class="more-info">'
        . $text . '</p></td>';
        
        switch ($placement) {
            case 'PREPEND': 
                    return $output . $content;
            case 'APPEND' : 
            default: return $content . $output;
                break;
        }
        
    }
}

