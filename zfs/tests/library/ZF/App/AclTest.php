<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AclTest
 *
 * @author Cod
 */
class AclTest extends PHPUnit_Framework_Testcase{
    //put your code here
    
    protected $acl;
    
    public function setUp()
    {
        parent::setUp();
        $this->acl = new ZF_App_ACL();
    }
    
    public function testAdminAccess() {
        $this->assertTrue($this->acl->isAllowed(ZF_App_Rolers::ADMIN, ZF_App_Resources::ADMIN_SECT));
        $this->assertTrue($this->acl->isAllowed(ZF_App_Rolers::ADMIN, ZF_App_Resources::ACCOUNT_FREE));
        $this->assertTrue($this->acl->isAllowed(ZF_App_Rolers::ADMIN, ZF_App_Resources::ACCOUNT_PAID));
        $this->assertTrue($this->acl->isAllowed(ZF_App_Rolers::ADMIN, ZF_App_Resources::PUBLICPAGE));
    }
    
    public function testGuestAccess() {
        
       $guest = ZF_App_Rolers::GUEST;
       $this->assertFalse($this->acl->isAllowed($guest, ZF_App_Resources::ACCOUNT_FREE));
       $this->assertFalse($this->acl->isAllowed($guest, ZF_App_Resources::ACCOUNT_PAID));
       $this->assertFalse($this->acl->isAllowed($guest, ZF_App_Resources::ADMIN_SECT));
    }
    
    public function testpaidAcces() {
        $paid = ZF_App_Rolers::PAID;
       $this->assertFalse($this->acl->isAllowed($paid, ZF_App_Resources::ACCOUNT_FREE));
       $this->assertTrue($this->acl->isAllowed($paid, ZF_App_Resources::ACCOUNT_PAID));
       $this->assertFalse($this->acl->isAllowed($paid, ZF_App_Resources::ADMIN_SECT));
        
    }
    
    
    
    
}

?>
