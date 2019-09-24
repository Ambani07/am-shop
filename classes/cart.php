<?php
class Cart {

    //returns product array data
    public function getProducts(){
        return Data::productArray();
    }

    //adds product to cart
    public function addToCart() {
        //get product id
        $id = intval($_GET['id']);
        
        if($id > 0){

            //add product to shopping cart session
            if(isset($_SESSION['shopping_cart'])){
                
                $item_array_id = array_column($_SESSION['shopping_cart'], "id");

                //check for duplicates
                if(!in_array($_GET['id'], $item_array_id)){
                    $count = count($_SESSION['shopping_cart']);

                    //create product array object
                    $item_array = array(
                        'id'		=>	$_GET['id'],
                        'name'		=>	$_POST['name'],
                        'price'	=>	$_POST['price'],
                        'quantity'	=>	$_POST['quantity']
                    );

                    //add product to shopping cart session
                    $_SESSION['shopping_cart'][$count] = $item_array;
                    
                    //display message and redirect
                    echo '<script>alert("Item Added")</script>';
                    echo '<script>window.location="index.php"</script>';
                }else{
                    //Product already exist in cart
                    //Increase Product quantity of that product

                    foreach($_SESSION['shopping_cart'] as $keys => $values){
                        if($values['id'] == $id){
                            
                            //increment quantity
                            $_SESSION['shopping_cart'][$keys]['quantity'] += 1;
                        };

                    }
 
                    //display message and redirect
                    echo '<script>alert("Item Quantity Updated")</script>';
                    echo '<script>window.location="index.php"</script>';

                }
            }else{

                //destroy shopping cart session before creating a new one
                unset($_SESSION['shopping_cart']);
                $item_array = array(
                    'id'		=>	$_GET['id'],
                    'name'		=>	$_POST['name'],
                    'price'	=>	$_POST['price'],
                    'quantity'	=>	$_POST['quantity']
                );

                //initilize shopping cart session
                $_SESSION['shopping_cart'][0] = $item_array;
                
                //display message and redirect
                echo '<script>alert("Item Added")</script>';
                echo '<script>window.location="index.php"</script>';

            }
        }
    }

    //removes item from shopping cart
    public function removeFromCart(){
        //get product id
        $id = intval($_GET["id"]);

        //search for product to be removed
        foreach($_SESSION['shopping_cart'] as $keys => $values){
            if($values['id'] == $_GET['id']){
                
                //delete product from shopping cart
                unset($_SESSION['shopping_cart'][$keys]);

                //display message and redirect
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="shopping-cart.php"</script>';
            }
        }

    }
    
    //get shopping cart
    public function getCart(){ 
        //check if shopping cart is not empty
        if(!empty($_SESSION['shopping_cart'])){

            return ($_SESSION['shopping_cart']);
        }
    } 

 }

class Data {

    //Product data
    static function productArray() { 
        return array(
            array("id" => 10, "name" => "Sledgehammer", "price" => 125.75),
            array("id" => 11, "name" => "Axe", "price" => 190.50),
            array("id" => 12, "name" => "Bandsaw", "price" => 562.13),
            array("id" => 13, "name" => "Chisel", "price" => 12.9),
            array("id" => 14, "name" => "Hacksaw", "price" => 18.45)
            ); 
    } 
}


?>