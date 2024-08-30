
<?php
include("header.php");
?>

<style>


</style>
 <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
             
                <h1 class="mb-5">Auction History</h1>
            </div>
			
	
            <div class="row g-4" >
					<?php
		include("conn.php");
		//$sel="select * from u_sell where status='pending'";
			$sele="select * from auction where u_id='$_SESSION[uid]'";
				$res1=mysqli_query($con,$sele);
				while($row2=mysqli_fetch_array($res1))	
				{
		?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <div class="overflow-hidden mb-4">
						<img class="img-fluid" src="./uploads/<?php echo $row2['image'];?>" alt=""> 
                        </div>
                        <h4 class="mb-3">Name:&nbsp;&nbsp;<?php echo $row2['name'];?></h4>
                        <h6 class="mb-3"><b>Category:&nbsp;&nbsp;</b><?php echo $row2['category'];?></h6>
                        <h6 class="mb-3"><b>Date:&nbsp;&nbsp;</b><?php echo $row2['date'];?></h6>
                        <p><b>discription:&nbsp;&nbsp;</b><?php echo $row2['disc'];?></p>
                        <p><b>price:&nbsp;&nbsp;</b><span>$</span><?php echo $row2['price'];?></p>
						
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