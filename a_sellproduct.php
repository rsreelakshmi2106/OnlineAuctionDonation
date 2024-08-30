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
$select="select * from products WHERE id='$_REQUEST[id]'";
$res=mysqli_query($con,$select);
$row=mysqli_fetch_array($res)

	?>	
                <div class="col-lg-12">
				<br>
				<br>
				  <div class="row g-5 align-items-center">
				  <center><h1 class="mb-5"></h1></center>
				 </div>
                    <div class="bg-light text-center p-5 wow fadeIn" data-wow-delay="0.5s">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
							  <div class="col-12 col-sm-12">
                                    <input type="text" class="form-control border-0" name="p_id" hidden value="<?php echo $row['id'];?>" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" readonly name="name" value="<?php echo $row['name'];?>" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" readonly name="category" value="<?php echo $row['category'];?>"  style="height: 55px;">
                                </div>
								 
                                <div class="col-6">
                                    <input class="form-control border-0" name="disc" readonly value="<?php echo $row['disc'];?>" style="height: 55px;" >
                                </div>
								  <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0"  readonly value="<?php echo $row['image'];?>" name="image"  style="height: 55px;">
                                </div>
								  <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0"  name="price" placeholder="Price" style="height: 55px;" required>
                                </div>
								 <div class="col-12 col-sm-6">
                                    <input type="date" class="form-control border-0"  name="date"   style="height: 55px;" required>
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
		$p_id=$_POST['p_id'];
		$name=$_POST['name'];
		$category=$_POST['category'];
		$disc=$_POST['disc'];
		$image=$_POST['image'];
		$price=$_POST['price'];
		$date=$_POST['date'];
        $up="update products set price='$price' where id='$p_id'";
        mysqli_query($con,$up);
		$ins="insert into a_sell(p_id,name,category,disc,date,image,price,status) values('$p_id','$name','$category','$disc','$date','$image','$price','pending')";
	    mysqli_query($con,$ins);
echo'<script>
		window.location="index.php";
		</script>';
	
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