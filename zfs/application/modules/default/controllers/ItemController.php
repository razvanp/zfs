<?php



class Default_ItemController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->session = new Zend_Session_Namespace('Default');
        
        if (!isset($this->session->items)) {
            
            $item1 = new \ZF\App\ItemDto();
            $item1->id = 1;
            $item1->description = "Hello World";
            $item1->name = 'item 1';

            $item2 = new \ZF\App\ItemDto();
            $item2->id = 1;
            $item2->description = "Hello World";
            $item2->name = 'item 2';
            
            $this->session->items = array($item1, $item2);
        }
    }

    public function indexAction()
    {
        // action body
        
        
        $this->view->items = $this->session->items;
    }

    public function createAction()
    {
        // action body
        $form = new Default_Form_ItemEditor(array('itemId' => 4, 'test'=> 'here'));
        $this->view->form = $form;
        
        $form->process($this);
                
    }


}



