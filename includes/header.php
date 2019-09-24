
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>am-shop</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/style.css" rel="stylesheet">

  </head>
  <body>

  <nav class="navbar navbar-default navbar-fixed-top mb-5" role="navigation">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span>am-shop</span></a>
			</div>
			<div class="navbar-collapse collapse">							
				<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
						<li><a href="index.php">Shop</a></li>
						<li><a href="shopping-cart.php"> <i class="fa fa-shopping-cart"></i>
						<span class="badge text-dark badge-pill badge-warning">
						<?php 
						
							$items_in_cart = is_array($_SESSION['shopping_cart']) ? count($_SESSION['shopping_cart']) : 0;

							echo $items_in_cart;
						?>
						</span>
						
						</a></li>					
					</ul>
				</div>
			</div>			
		</div>
	</nav>