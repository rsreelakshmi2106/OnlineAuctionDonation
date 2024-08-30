<?php
include("header.php");
?>

<style>


</style>
 <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
             
                <h1 class="mb-5">Donated Items List</h1>
            </div>
			
	
            <div class="row g-4" >
					<?php
		include("conn.php");
		$sel="select * from products where status='pending' and type='Donated'";
		$res=mysqli_query($con,$sel);
		while($row=mysqli_fetch_array($res))
		{
            $adr="select * from u_register where id='$row[u_id]'";
            $adres=mysqli_query($con,$adr);
            $rows=mysqli_fetch_array($adres);
		?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <div class="overflow-hidden mb-4">
						<img class="img-fluid" src="./uploads/<?php echo $row['image'];?>" alt=""> 
                        </div>
                        <h4 class="mb-3"><?php echo $row['name'];?></h4>
                        <h6 class="mb-3"><?php echo $row['category'];?></h6>
                        <p><?php echo $row['disc'];?></p>
                        <h6 class="mb-3">Address : <?php echo $rows['address'];?></h6>
						 <!--p><b>discription:&nbsp;&nbsp;</b><a href=""><?php echo $row['disc'];?></a></p-->
                        <a class="btn-slide mt-2" href="approve.php?id=<?php echo $row['id'];?>"><i class="fa fa-arrow-right"></i><span>accept</span></a>
						 <a class="btn-slide mt-2" href="reject.php?id=<?php echo $row['id'];?>"><i class="fa fa-arrow-right"></i><span>Reject</span></a>
                    </div>
                </div>
				
				<?php
		}
		?>
               </div>
				</div>
				</div>
    <!-- Service End -->



















<?php
include("footer.php");
?>