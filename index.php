<?php session_start();
// session_destroy();?>
<?php require "includes/shop.php"; ?>
<?php include "includes/header.php"; ?>

	
<div class="container">
	<h1 class="text-center text-info">Welcome to am-shop</h1>
	<div class="row main">
		<div class="col-md-10 col-md-offset-1">

		<?php
			//get all products
			$products = $cart->getProducts();
			//loop through and display products
			foreach($products as $keys => $product):?>
				<div class="col-sm-4 col-md-2 col-md-offset-1 m-5 product">
							<div class="products">
								<form method="post" action="index.php?action=add&id=<?php echo $product['id']; ?>">
									<h4 class="text-info"><?php echo $product['name'];?></h4>
									<p>R <?php echo $product['price'];?></p>
									<input type="hidden" name="name" value="<?php echo $product['name']; ?>">
									<input type="hidden" name="quantity" value="1">
									<input type="hidden" name="price" value="<?php echo $product['price']; ?>">
									<div class="form-group">
										<input type="submit" name="add_to_cart" class="btn btn-info btn-sm" value="Add to Cart">
									</div>
								</form>
							</div>
							</a>
						</div>
			<?php
			endforeach;
			
		?>
			
		</div>
	</div>
	</div>


<?php include "includes/footer.php" ?>