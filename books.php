<!DOCTYPE html>
<html lang="en">
<head>
	<title>Books</title>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

</head>
<body class="is-preload">

    <!-- Menu -->
    <?php include("Menu.html"); ?>
    
    <?php

    $user_data = check_login($cnx);

        $result = mysqli_query($cnx,"select * from books");
        $style=0;
        echo
        "
        <div id='wrapper'>
            <div class='main'>
                <div id='inner'>
                    <section class='tiles'>
        ";
        while($row = mysqli_fetch_array($result))
        {
            $style++;
            echo
            "
                <article class='style$style'>
                    <span class='image'>
                        <img src='$row[image]' alt='IMG' style='height: 220.333px'/>
                    </span>
                    <a href='product-details.php'>
                        <h2>$row[title]</h2>
                        <p style='color: white;'><del>".$row['price']*10.5."DH</del><br/><strong>" .$row['price']*10 ."DH</strong></p>
                        <p style='color:white;'>$row[description]</p>
                    </a>
                </article>
            ";
            if($style>6) $style=0;
        }
        echo
        "
        </section>
            </div>
                </div>
                    </div>
        "
    ?>
		<!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
		<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/main.js"></script>

</body>
</html>