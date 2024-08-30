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
$select="select * from u_register WHERE id='$_SESSION[uid]'";
$res=mysqli_query($con,$select);
$row=mysqli_fetch_array($res)

	?>	
                <div class="col-lg-12">
				<br>
				<br>
				  <div class="row g-5 align-items-center">
				  <center><h1 class="mb-5">Sell Request </h1></center>
				 </div>
                    <div class="bg-light text-center p-5 wow fadeIn" data-wow-delay="0.5s">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
							  <div class="col-12 col-sm-12">
                                    <input type="text" class="form-control border-0" name="u_id" hidden value="<?php echo $row['id'];?>" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="name" placeholder="Item Name" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" name="category" placeholder="Item Category" style="height: 55px;" required>
                                </div>
								 
                                <div class="col-6">
                                    <textarea class="form-control border-0" name="disc" placeholder="Discription" required></textarea>
                                </div>
								 <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control border-0" name="price"  placeholder="Price" style="height: 55px;" required>
                                </div>
								  <div class="col-12 col-sm-6">
                                    <input type="file" class="form-control border-0" name="image"  style="height: 55px;" required>
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
		$u_id=$_POST['u_id'];
		$name=$_POST['name'];
		$category=$_POST['category'];
		$disc=$_POST['disc'];
		$price=$_POST['price'];
		if($_FILES['image']['name'])
    {
        move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$_FILES['image']['name']);
        $f=$_FILES['image']['name'];
        $ins="insert into products(u_id,name,category,disc,price,image,type,status)values('$u_id','$name','$category','$disc',$price,'$f','Purchased','pending')";
        if(mysqli_query($con,$ins))
        {
			$cc=mysqli_insert_id($con);
			$_SESSION['oid']=$cc;
			//header("location:invoice/index.php");
			echo '<script>alert("Success!")
									  //window.location="invoice/index.php";
									  </script>'; 
        }
        else
        {
            header("location:index.php");
        }
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