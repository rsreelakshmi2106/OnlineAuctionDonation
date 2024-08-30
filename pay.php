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
$select="select * from products where id='$_REQUEST[id]'";
$res=mysqli_query($con,$select);
$row=mysqli_fetch_array($res)

	?>	
                <div class="col-lg-12">
				<br>
				<br>
				  <div class="row g-5 align-items-center">
				  <center><h1 class="mb-5">Payment</h1></center>
				 </div>
                    <div class="bg-light text-center p-5 wow fadeIn" data-wow-delay="0.5s">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
							  <div class="col-12 col-sm-12">
                                    <input type="hidden" class="form-control border-0" name="p_id"  value="<?php echo $row['id'];?>" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="name" readonly value="<?php echo $row['name'];?>"  style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="price"  readonly value="<?php  echo $row['price']; ?>" style="height: 55px;">
                                </div>
								   <div class="col-12 col-sm-6">
                                    <input type="date" class="form-control border-0" name="cdate"   style="height: 55px;" required>
                                </div>
								     <div class="col-6">
                                      <select  class="form-control border-0" name="card"  style="height: 55px;" required>
									  <option >select card type</option>
									  <option value="credit card">Credit card</option>
									  <option value="debit card">Debit card</option>
									  </select>
									  
                                </div>
                                   <div class="col-12 col-sm-12">
                                    <input type="text" class="form-control border-0" name="card_no"   placeholder="Card number"  pattern="[0-9]{16}" title="Must contain at least 16 digit" style="height: 55px;" required>
                                </div>
								 <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="expdate"   placeholder="Expired Date" style="height: 55px;" required>
                                </div>
								 <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="cvv"   placeholder="cvv"  pattern="[0-9]{3}" title="Must contain at least 3 digit" style="height: 55px;" required>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="pay" type="submit">pay</button>
                                </div>
                            </div>
                        </form>
							<?php
	
   include("conn.php");
	
	if(isset($_POST['pay']))
	{
		$p_id=$_POST['p_id'];
		$name=$_POST['name'];
		$price=$_POST['price'];
		$cdate=$_POST['cdate'];
		$card=$_POST['card'];
		$card_no=$_POST['card_no'];
		$expdate=$_POST['expdate'];
		$cvv=$_POST['cvv'];
		$insert="insert into a_payment(p_id,name,price,date,card,card_no,expdate,cvv)values('$p_id','$name','$price','$cdate','$card','$card_no','$expdate','$cvv')";
	//echo $insert;
	
	$_SESSION['oid']=$_REQUEST['id'];
	
	mysqli_query($con,$insert);
	echo '<script>alert("Success!")
									  window.location="invoice/index.php";
									  </script>'; 
	}
	
	?>				
						
				
                    </div>
                </div>
             
   
    <!-- Quote End -->











<?php
include("footer.php");
?>