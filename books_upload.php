<!DOCTYPE html>
<html lang="en">
<head>
	<title>Flash Library</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
</head>
<body>
	
<?php
    session_start();
	
	include("login/connection.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$book_title = $_POST['title'];
		$book_price = $_POST['price'];
		$book_author = $_POST['author'];
		$book_desc = $_POST['description'];
		$image	=	$_FILES['image'];
		$image_loc = $_FILES['image']['tmp_name'];
		$image_name = $_FILES['image']['name'];
		$image_up = "images/".$image_name;
		$insert = "INSERT INTO books (title, author, image, price, description) VALUES ('$book_title', '$book_author', '$image_up', '$book_price', '$book_desc')";
		$result = mysqli_query($cnx, $insert);
		if(move_uploaded_file($image_loc, 'images/'.$image_name))
		{
			header("Location: products.php");
		}else
		{
			echo "<script>alert('Troubleshooting errors while uploading an image to the Library')</script>";
		}
	}

 	?>   
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="login/images/add_book_img.png" alt="IMG" width="350px" height="350px">
				</div>

				<form method="post" class="login100-form validate-form" enctype="multipart/form-data">
					<span class="login100-form-title">
						Add book
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid title is required: Title">
						<input class="input100" type="text" name="title" placeholder="Title">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid price is required: Price">
						<input class="input100" type="text" name="price" placeholder="Price">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid author name is required: Author">
						<input class="input100" type="text" name="author" placeholder="Author">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid description is required: Description">
						<input class="input100" type="text" name="description" placeholder="Description">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="mb-3">
  						<label for="image" class="form-label">Book's cover</label>
  						<input class="form-control form-control-sm" name="image" id="image" type="file">
					</div>					
					
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Add">
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="products.php">
							Product's page
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

		
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="login/vendor/select2/select2.min.js"></script>
	<script src="login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="login/js/main.js"></script>

</body>
</html>