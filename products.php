<!DOCTYPE HTML>
<html>
	<head>
		<title>Flash Library</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/mystyles.css">
	</head>
	<body class="is-preload">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

		<!-- Wrapper -->
		<div id="wrapper">

		<!-- Header -->
		<?php include("Header.html"); ?>

		<!-- Menu -->
		<?php include("Menu.html"); ?>

		<!-- Main -->
		<div id="main">
			<div class="inner">
				<h1>
				Products 
				<label id='cart_nbr'>0</label>
				</h1>
				<div class="image main">
					<img src="images/banner-image-6-1920x500.jpg" class="img-fluid" alt="" />
				</div>

		<!-- Products -->
		<section class="tiles">
		<?php 
        session_start();        
        include("login/connection.php");
        include("login/functions.php");

        if(!$_SESSION['id']){
            header("Location: login/login.php");
            die;
        }

        $user_data = check_login($cnx);
        $result = mysqli_query($cnx,"select * from books");
        while($row = mysqli_fetch_array($result))
        {
			$token = strtok($row['description'],' ');
			$ctr = 0;
			$desc = '';
			while($token !== false && $ctr < 10)
			{
				$desc = $desc .' '.$token;
				$token = strtok(' ');
				$ctr++;
			}
			$desc = $desc . '...';
			echo
            "
				<div class='card' style='width: 15rem;'>
					<img class='card-img-top' src='$row[image]' alt='Card image cap' style='width:190px; height:160px'>
					<div class='card-body'>
			  			<h5 class='card-title' style='height:100px'>$row[title] </h5>
			  			<p class='card-text' style='height:100px'>$desc</p>
					</div>
					<ul class='list-group list-group-flush'>
			  			<li class='list-group-item' style='height:60px'>Author: $row[author]</li>
			 			<li class='list-group-item' style='height:50px'>Price: ". $row['price']*10 ." DH</li>
					</ul>
					<div class='card-body'>
						<a class='btn btn-success' id='btn_cart' style='color:white' onclick='cartClick()'>Add to cart</a>
					</div>
		  		</div>
            ";
        }
    ?>
							</section>
						</div>
					</div>
					<?php include("footer.html"); ?>
			</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>
			<script type="text/javascript">
			let btn,cart
			function cartClick()
			{
				btn = document.querySelector("#btn_cart")			
				cart = document.getElementById("cart_nbr")
				cart.textContent = parseInt(cart.textContent)+1
			}
			</script>
	</body>
</html>