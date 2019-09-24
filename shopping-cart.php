<?php session_start();?>
<?php require "includes/shop.php"; ?>
<?php include "includes/header.php"; ?>
		<div class="container">

			<div class="row">
				
				

			<?php
				//get all cart items from
				$productInCart = $cart->getCart();
				if(!empty($productInCart)){ ?>
				<h3 class="mt-5">Cart Item(s) </h3>
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th width="40%">Item Name</th>
							<th width="10%">Quantity</th>
							<th width="20%">Price</th>
							<th width="15%">Total</th>
							<th width="5%">Action</th>
						</tr>
						<?php
								$total = 0;
								foreach($_SESSION['shopping_cart'] as $keys => $values){
									?>
									<tr>
										<td><?php echo $values['name']; ?></td>
										<td><?php echo $values['quantity']; ?></td>
										<td>R <?php echo $values['price']; ?></td>
										<td>R <?php echo number_format($values['quantity'] * $values['price'], 2); ?></td>
										<td> <a href="shopping-cart.php?action=delete&id=<?php echo $values['id']; ?>"> <span class="text-danger">Remove</span> </a> </td>
									</tr>
									<?php
									$total = $total + ($values['quantity'] * $values['price']);
								}?>
								<tr>
									<td colspan="3" align="right">Total</td>
									<td align="right" >R <?php echo number_format($total, 2) ?></td>
								</tr>
								
					</table>
					<a class="btn btn-warning" href="index.php">continue shopping</a>
				</div>

				<?php
						
					}else{
						//show message if cart is empty
						echo "<h4>No item(s) in cart</h4>";
						echo '<a class="btn btn-warning" href="index.php">Back To Shop</a>';
					}
				?>
			</div>
		</div>
		<!-- footer -->
		<?php include "includes/footer.php" ?>