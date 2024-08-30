<?php
include("header.php");
?>

 <!-- Quote Start -->
    <!--div class="container-xxl py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Get A Quote</h6>
                    <h1 class="mb-5">Request A Free Qoute!</h1>
                    <p class="mb-5">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-headphones fa-2x flex-shrink-0 bg-primary p-3 text-white"></i>
                        <div class="ps-4">
                            <h6>Call for any query!</h6>
                            <h3 class="text-primary m-0">+012 345 6789</h3>
                        </div>
                    </div>
                </div-->
				<?php
include("conn.php");
$select="select * from auction WHERE a_id='$_REQUEST[id]'";
$res=mysqli_query($con,$select);
$row=mysqli_fetch_array($res)

	?>	
                <div class="col-lg-12">
				<br>
				<br>
				  <div class="row g-5 align-items-center">
				  <center><h1 class="mb-5">Claim Bid</h1></center>
				 </div>
                    <div class="bg-light text-center p-5 wow fadeIn" data-wow-delay="0.5s">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
							  <div class="col-12 col-sm-12">
                                    <input type="hidden" class="form-control border-0" name="u_id"  value="<?php echo $row['id'];?>" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="p_id" value="<?php echo $row['p_id'];?>" placeholder="Item Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="price" value="<?php echo $row['price'];?>" placeholder="Bid Price" style="height: 55px;">
                                </div>
								<div class="col-12 col-sm-6">
                                    <input type="date" class="form-control border-0" name="cdate"   style="height: 55px;" required>
                                </div> 
								 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Card Type</label>
                                        <select name="card" class="form-control input-md">
										  <option value="">-- Select --</option>
										  <option value="debit">Debit </option>
										  <option value="credit">Credit</option>
										</select> 
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Card Holder</label>
                                        <input  name="holder" type="text" placeholder="Card Holder" class="form-control input-md" required>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Card Number</label>
                                        <input  name="num" type="text" placeholder="Card Number" class="form-control input-md" required>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="email">Expire Date</label>
                                        <select name="mm" class="form-control input-md">
										  <option value="">-- Select --</option>
										  <option value="1">01 </option>
										  <option value="2">02</option>
										  <option value="3">03</option>
										  <option value="4">04</option>
										  <option value="5">05</option>
										  <option value="6">06</option>
										  <option value="7">07</option>
										  <option value="8">08</option>
										  <option value="9">09</option>
										  <option value="10">10</option>
										  <option value="11">11</option>
										  <option value="12">12</option>
										</select>
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="email">.</label>
                                        <select name="yy" class="form-control input-md">
										  <option value="">-- Select --</option>
										  <option value="2022">2022 </option>
										  <option value="2023">2023 </option>
										  <option value="2024">2024 </option>
										  <option value="2025">2025</option>
										  <option value="2026">2026</option>
										</select> 
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="email">CVV</label>
                                        <input  name="cvv" type="password" placeholder="CVV" class="form-control input-md" required>
                                    </div>
                                </div>
								 
								 
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
						<?php
	
include("conn.php");
	
	if(isset($_POST['submit']))
	{
		$u_id=$_SESSION['uid'];
		$p_id=$_POST['p_id'];
		$price=$_POST['price'];
		$card=$_POST['card'];
		$holder=$_POST['holder'];
		$num=$_POST['num'];
		$mm=$_POST['mm'];
		$yy=$_POST['yy'];
		$cvv=$_POST['cvv'];
		$cdate=$_POST['cdate'];
		$ins="insert into payment(`u_id`, `p_id`, `amount`, `card_type`, `card_name`, `card_no`, `card_year`, `card_month`, `cvv`,`cdate`, `status`) values('$u_id','$p_id','$price','$card','$holder','$num','$mm','$yy','$cvv','$cdate','completed')";
		//echo $ins;
		//echo $_SESSION['subloc_id'];
		//echo $_SESSION['slot_id'];
		//$cc=mysqli_insert_id($con);
			$_SESSION['oid']=$_REQUEST['id'];
			$_SESSION['price']=$price;
		if(mysqli_query($con,$ins))
		{
			//mysqli_query($con,"DELETE FROM `auction` WHERE `p_id`='$p_id'");
			mysqli_query($con,"update auction set status='claimed',u_id='$_SESSION[uid]',date='$cdate' WHERE `p_id`='$p_id'");
		echo '<script>alert("Succesful!")
				window.location="invoice/index1.php"
			  </script>';
		}
	}
	
	?>				
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->











<?php
include("footer.php");
?>