<?php

class Default_Form_ItemEditor extends Zend_Form
{

    /**
     * Item Id
     * @var int 
     */
    public $itemId;
    protected $test;
    
    public function setItemId($value){
        $this->itemId = $value;
    }
    
    public function setTest($value){
        $this->test = $value;
    }

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        var_dump($this->itemId);
        $this->name = new Zend_Form_Element_Text('name');
        $this->name->setLabel('item name')
                    ->setValue($this->test)
                   ->setRequired(true);
        
        $this->description = new Zend_Form_Element_Textarea('description');
        $this->description->setLabel('item description')
                         ->setRequired(true);
        
        $this->id = new Zend_Form_Element_Hidden('id');
        $this->id->setValue($this->itemId);
        
        $this->submit = new Zend_Form_Element_Submit('create_item');
        
        $this->addElements(array($this->name,  $this->description, $this->id));
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag'=>'dl')),
            'Form'
        ));
        
    }
    
    public function process(Default_ItemController $controller)
    {
        
        
        if ($controller->getRequest()->isPost() === true) {
            if ($this->isValid($controller->getRequest()->getParams())) {
                $controller->session->items[] = $this->mappToItemDto();
            } else {
                $controller->view->errorElemsnts = $this->getMessages();
            }
        }

       
    }
    
    protected function mappToItemDto() {
        $item = new \ZF\App\ItemDto();
        $item->name = $this->name->getValue();
        $item->description = $this->description->getValue();
        $item->id = $this->id->getValue();

        return $item;
    }
    
    
    


}

