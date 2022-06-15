<!DOCTYPE HTML>
<html>
	<head>
		<title>Flash Library | Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	
	<body class="is-preload">	

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<?php
	session_start();

	include("login/connection.php");
    include("login/functions.php");
	
	if(!$_SESSION['id']){
		header("Location: login/login.php");
		die;
	}
	$user_data = check_login($cnx);
	?>

			<!-- Wrapper -->
			<div id="wrapper">
			<h2  style="text-align:center"><?php echo "Welcome ".$_SESSION['username']; ?></h2>

			<!-- Header -->
			<?php include("Header.html"); ?>

			<!-- Menu -->
			<?php include("Menu.html"); ?>

			<!-- Main -->
			<div id="main">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
					<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="images/slider-image-1-1920x700.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/slider-image-2-1920x700.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/slider-image-3-1920x700.jpg" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
				</a>
			</div>
			<br>
			<br>

			<div class="inner">
				<!-- About Us -->
				<header id="inner">
					<h1>Find your new book!</h1>
					<p>Etiam quis viverra lorem, in semper lorem. Sed nisl arcu euismod sit amet nisi euismod sed cursus arcu elementum ipsum arcu vivamus quis venenatis orci lorem ipsum et magna feugiat veroeros aliquam. Lorem ipsum dolor sit amet nullam dolore.</p>
				</header>

				<br>

				<h2 class="h2">Featured Books</h2>

				<!-- Products -->

				<?php include("books.php"); ?>
						
			</div>

			<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<section>
							<h2>Contact Us</h2>
							<form method="post" action="#">
								<div class="fields">
									<div class="field half">
										<input type="text" name="name" id="name" placeholder="Name" />
									</div>

									<div class="field half">
										<input type="text" name="email" id="email" placeholder="Email" />
									</div>

									<div class="field">
										<input type="text" name="subject" id="subject" placeholder="Subject" />
									</div>

									<div class="field">
										<textarea name="message" id="message" rows="3" placeholder="Notes"></textarea>
									</div>

									<div class="field text-right">
										<label>&nbsp;</label>
										<ul class="actions">
											<li><input type="submit" value="Send Message" class="primary" /></li>
										</ul>
									</div>

								</div>
							</form>
						</section>
					</div>

					<?php include("Contact_Info.html"); ?>
					<ul class="copyright">
						<li>Copyright © 2022 Abdessamad Sayhi </li>
					</ul>
				</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>