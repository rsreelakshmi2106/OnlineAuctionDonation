<!DOCTYPE html>
<html lang="en">
<?php

 session_start();
 error_reporting(0);
 include("conn.php");
?>
<style>
<style>
.uppercase-text {
  text-transform: uppercase;
}
</style>
<head>
    <meta charset="utf-8">
    <title class="uppercase-text">Donate Sell Bid</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
        <a href="index.html" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <h2 class="mb-2 text-white"><span class="uppercase-text">Donate Sell Bid</span></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
		<?php
						   
						  
						   if($_SESSION['type']=='admin')
						   {
							
						   ?>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="receivedonation.php" class="nav-item nav-link">Receive Donation</a>
				                <a href="viewusell_product.php" class="nav-item nav-link">view Request</a>
                                <a href="all_product.php" class="nav-item nav-link">All Products</a>
                <a href="a_sellproduct2.php" class="nav-item nav-link">sell products</a>
                <a href="auctiondisplay.php" class="nav-item nav-link">view auction</a>
				<div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Reports
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="sales_report.php">Sales</a></li>
                <li><a class="dropdown-item" href="auction_report.php">Auction</a></li>
            </ul>
        </div>
        <a href="viewusers.php" class="nav-item nav-link">view users</a>
                <a href="logout.php" class="nav-item nav-link">logout</a>
            </div>
          
        </div>
		 <?php
						   }
						   elseif($_SESSION['type']=='user')
						   {
						   ?>
						   				
      <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="index.php" class="nav-item nav-link active">Home</a>
        <a href="donateitem.php" class="nav-item nav-link">Donate Item</a>
        <a href="u_sellproduct.php" class="nav-item nav-link">Sell Request</a>
        <a href="viewa_product.php" class="nav-item nav-link">Purchase Products</a>
        <a href="availableauction.php" class="nav-item nav-link">Auctions</a>
        <!--a href="viewu_donate.php" class="nav-item nav-link">Donated Products</a-->
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <!--profile-->
                <?php
                    $user = "SELECT name FROM u_register WHERE id = $_SESSION[uid]";
                    $res=mysqli_query($con,$user);
                    $row=mysqli_fetch_assoc($res);
                    echo $row['name']; 
                ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="usell_history.php">Sell Request History</a></li>
                <li><a class="dropdown-item" href="viewu_donate.php">Donate History</a></li>
                <li><a class="dropdown-item" href="purchas_history.php">purchase History</a></li>
                <li><a class="dropdown-item" href="auction_history.php">Auction History</a></li>
                <li><a class="dropdown-item" href="edit_profile.php">edit profile</a></li>
                <li><a class="dropdown-item" href="logout.php">logout</a></li>
            </ul>
        </div>
    </div>
</div>
		 <?php
						   }
						   else 
						   {
						   
						   ?>
						    <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="register.php" class="nav-item nav-link">Register</a>
                <a href="login.php" class="nav-item nav-link">Login</a>

            </div>
           
        </div>
		 <?php
						   }
						   ?>
    </nav>
    <!-- Navbar End -->