<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthAdapter
 *
 * @author Cod
 */
class ZF_libs_AuthAdapter  implements Zend_Auth_Adapter_Interface{
    
    
    const NOT_FOUND = 'USER NOT FOUND';
    const INVALID_PASSWORD = 'Invalid password';


    /**
     * Get doctrine container
     *
     * @var \Bisna\Application\Container\DoctrineContainer
     */
    protected $doctrineContainer;
    
    /**
     *
     * @var string
     */
    protected $password;
    
    /**
     *
     * @var string
     */
    protected $username;
    
    /**
     *
     * @var ZF\Entity\UserAuth 
     */
    protected $user;


    public function __construct($username,$passowrd) 
    {
        $this->password = $passowrd;
        $this->username = $username;
        $this->doctrineContainer = Zend_Registry::get('doctrine');
    }
     
    /**
     * Performs an authentication attempt
     *
     * @throws Zend_Auth_Adapter_Exception If authentication cannot be performed
     * @return Zend_Auth_Result
     */
    public function authenticate() 
    {
        
        try {
            $user = $this->getUser();
            return new Zend_Auth_Result(Zend_Auth_Result::SUCCESS,$user);
        } catch (Zend_Exception $e) {
            if ($e->getMessage() == 1) {
                 return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID,$this->user,array(self::INVALID_PASSWORD));
            }
            
            if ($e->getMessage() == 2) {
                 return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND,$this->user,array(self::NOT_FOUND));
            }
        }

        
    }
    
    protected function getUser()
    {
        $em = $this->doctrineContainer->getEntityManager();
        $this->user = $em->getRepository("ZF\Entity\UserAuth")->findOneBy(array('username'=>$this->username));
          
        if($this->user){
                if ($this->user->password == $this->password) {
                    return $this->user;
                }
                throw new Zend_Exception(1);
            
            } else{ 
                 throw new Zend_Exception(2);
            }
    }
}

?>
