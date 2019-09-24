<?php require_once "classes/cart.php";?>
<?php 
    //initialize Cart
    $cart = new Cart();

    if($_SERVER['HTTP_HOST']){
        //add product
        if(isset($_POST['add_to_cart'])){
            if($_GET['action'] == 'add'){
                $cart->addToCart();
            }
        }
        //delete product
        if(isset($_GET['action'])){
            if($_GET['action'] == 'delete'){
                $cart->removeFromCart();
            }
        }
    }
    
?>