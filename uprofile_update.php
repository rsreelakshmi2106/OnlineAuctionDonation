<?php
include("header.php");
?>

 <!-- Quote Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <!--div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
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
 if(isset($_POST['submit']))
 {
 $q=$_POST['name'];
 $w=$_POST['email'];
 $e=$_POST['phone'];
 $r=$_POST['password'];
 $t=$_POST['address'];

$update="update u_register set name='$q',email='$w',phone='$e',password='$r',address='$t' where id='$_REQUEST[id]'";
mysqli_query($con,$update);
header("location:edit_profile.php");
 }
 
$select="select * from u_register where id='$_REQUEST[id]'";
$res=mysqli_query($con,$select);
$row=mysqli_fetch_array($res);

 ?>
                <div class="col-lg-12">
                    <div class="bg-light text-center p-5 wow fadeIn" data-wow-delay="0.5s">
                        <form method="post">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
								<label style="float:left">Name</label>
                                    <input type="text" class="form-control border-0" name="name" value="<?php echo $row['name']?>" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
								<label style="float:left">Email</label>
                                    <input type="email" class="form-control border-0" name="email" value="<?php echo $row['email']?>" style="height: 55px;" required>
                                </div>
								   <div class="col-12 col-sm-6">
								   <label style="float:left">Phone No</label>
                                    <input type="text" class="form-control border-0" name="phone" value="<?php echo $row['phone']?>" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
								<label style="float:left">Password</label>
                                    <input type="text" class="form-control border-0" name="password" value="<?php echo $row['password']?>" style="height:55px;" required>
                                </div>
                               
                                <div class="col-12">
								<label style="float:left">Address</label>
                                    <input class="form-control border-0"value="<?php echo $row['address']?>" name="address" required >
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
						

						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->











<?php
include("footer.php");
?>