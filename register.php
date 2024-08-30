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
                <div class="col-lg-12">
                    <div class="bg-light text-center p-5 wow fadeIn" data-wow-delay="0.5s">
                        <form method="post">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="name" placeholder="Your Name" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0" name="email" placeholder="Your Email" style="height: 55px;" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Enter a valid email address">
                                </div>
								   <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="phone" placeholder="Your Mobile"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" 
       title="Phone number with 7-9 and remaing 9 digit with 0-9" required style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="password" class="form-control border-0" name="password" placeholder="Your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" style="height: 55px;" required>
                                </div>
                               
                                <div class="col-12">
                                    <textarea class="form-control border-0" name="address" placeholder="Your Address" required></textarea>
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
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];
		$address=$_POST['address'];
		
		
		
		
		$insert="INSERT INTO u_register(name,email,phone,password,address) VALUES ('$name','$email','$phone','$password','$address')";
		mysqli_query($con,$insert);
		//echo insert;
		
		echo "<script>
        alert('Sucessfully Registered');
        window.location='index.php';
        </script>";	
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