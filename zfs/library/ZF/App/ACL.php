<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ACL
 *
 * @author Cod
 */
class ZF_App_ACL extends Zend_Acl{
    //put your code here
    public function __construct() {
        $this->add(new Zend_Acl_Resource(ZF_App_Resources::ACCOUNT_FREE));
        $this->add(new Zend_Acl_Resource(ZF_App_Resources::ACCOUNT_PAID));
        $this->add(new Zend_Acl_Resource(ZF_App_Resources::ADMIN_SECT));
        $this->add(new Zend_Acl_Resource(ZF_App_Resources::PUBLICPAGE));
        
        $this->addRole(new Zend_Acl_Role(ZF_App_Rolers::GUEST));
        $this->addRole(new Zend_Acl_Role(ZF_App_Rolers::FREE),  ZF_App_Rolers::GUEST);
        $this->addRole(new Zend_Acl_Role(ZF_App_Rolers::PAID), ZF_App_Rolers::FREE);
        $this->addRole(new Zend_Acl_Role(ZF_App_Rolers::ADMIN));
        
        
        $this->allow(ZF_App_Rolers::GUEST, ZF_App_Resources::PUBLICPAGE);
        $this->allow(ZF_App_Rolers::ADMIN, ZF_App_Resources::ADMIN_SECT);
        $this->allow(ZF_App_Rolers::FREE, ZF_App_Resources::ACCOUNT_FREE);
        $this->allow(ZF_App_Rolers::PAID, ZF_App_Resources::ACCOUNT_PAID);
        //$this->allow(ZF_App_Rolers::ADMIN, ZF_App_Resources::ACCOUNT_PAID);
        
        $this->deny(ZF_App_Rolers::PAID,ZF_App_Resources::ACCOUNT_FREE);
        $this->allow(ZF_App_Rolers::ADMIN, ZF_App_Resources::ACCOUNT_FREE);
        $this->allow(ZF_App_Rolers::ADMIN, ZF_App_Resources::ACCOUNT_PAID);
        $this->allow(ZF_App_Rolers::ADMIN, ZF_App_Resources::PUBLICPAGE);
    }
}

?>
