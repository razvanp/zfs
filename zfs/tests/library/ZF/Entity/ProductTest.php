<?php
/**
 * Description of ProductTest
 *
 * @author Cod
 */

 namespace ZF\Entity;

class ProductTest extends \ModelTestCase
{
    public function getUser()
    {
        $user = new User();
        $user->firstName = "Razvan";
        $user->lastName = "Constantin";
        return $user;
    }
    
    public function getApple()
    {
        $apple = new Product();
        $apple->name = "apple";
        $apple->amount = 2.50;
        return $apple;
    }
    
    public function getOrange()
    {
        $orange = new Product();
        $orange->name = "orange";
        $orange->amount = 2.99;
        return $orange;
    }
    
    public function getPurchases(){
        $purchase = new Purchase();
        $purchase->storeName = "My Store";
        return $purchase;
    }
    
//    public function testCanAddProductstoPurchases(){
//        $orange = $this->getOrange();
//        $apple = $this->getApple();
//        
//        $purchases = $this->getPurchases();
//        
//        $purchases->products = array($apple,$orange);
//        //$purchases->amount = $orange->amount + $apple->amount;
//        //$purchases->user = $this->getUser();
//        
//        
//        $em = $this->doctrineContainer->getEntityManager();
//        $em->persist($purchases);
//        $em->flush();
//        
//        $purchasesFromDb = $em->find('ZF\Entity\Purchase', $purchases->id);
//        $total = 0;
//        foreach ($purchasesFromDb->products as $product) {
//            $total = $total + $product->amount;
//        }
//        //var_dump($purchasesFromDb->products[0]);
//        $this->assertEquals($total, $apple->amount + $orange->amount);      
//    }
    
    public function testHasManyPurchases()
    {
        $em = $this->doctrineContainer->getEntityManager();
        $jon = $this->getUser();
        $em->persist($jon);
        
        
        //$em->clear();
        $purchases = $this->getPurchases();
        $orange = $this->getOrange();
        $orange->amount = 10.44;
        $purchases->products = array($orange,$this->getApple());
        $purchases->user = $jon;
               
        $purchases2 = $this->getPurchases();
        $purchases2->user = $jon;
        $purchases2->products = array($this->getOrange(),$this->getApple());
        
        //$em->persist($purchases->products[0]);
        //$em->persist($purchases->products[1]);
        $em->persist($purchases);
        
        //$em->persist($purchases2->products[0]);
        ///$em->persist($purchases2->products[1]);
        $em->persist($purchases2);
        $em->flush();
        
        $em->clear();
        $jonFromDb = $em->find("ZF\Entity\User", $jon->id);
        $this->assertEquals(2, count($jonFromDb->purchases));
        
    }
    
    public function testCanCreateLineItems(){
        $product = new Product();
        $product->name = "foo";
        $product->amount = 1;
        
        $em = $this->doctrineContainer->getEntityManager();
        $em->persist($product);
        //$em->flush();
        
        $purchase = $this->getPurchases();
        $purchase->products->add($product);
        
        $em->persist($purchase);
        $em->flush();
        
        $purchases = $em->createQuery('select p from \ZF\Entity\Purchase p')->execute();
        $this->assertEquals(1, count($purchases[0]->products) );
        
        //var_dump($prod);
        //$this->assertEquals($products[0]->products,1);
        //$em->clear();
    }
    
}

