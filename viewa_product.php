<?php
include("header.php");
?>

<style>


</style>
 <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
             
                <h1 class="mb-5">view product</h1>
            </div>
			
	
            <div class="row g-4" >
					<?php
		include("conn.php");
		//$sel="select * from u_sell where status='pending'";
		$sel="select * from a_sell where status!='accepted'";
		$res=mysqli_query($con,$sel);
		while($row=mysqli_fetch_array($res))
		{
		?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <div class="overflow-hidden mb-4">
						<img class="img-fluid" src="./uploads/<?php echo $row['image'];?>" alt=""> 
                        </div>
                        <h4 class="mb-3">Name:&nbsp;&nbsp;<?php echo $row['name'];?></h4>
                        <h6 class="mb-3"><b>Category:&nbsp;&nbsp;</b><?php echo $row['category'];?></h6>
                        <p><b>discription:&nbsp;&nbsp;</b><?php echo $row['disc'];?></p>
                       
                        <p><b>price:&nbsp;&nbsp;</b><span>$</span><?php echo $row['price'];?></p>
                       <a class="btn-slide mt-2" href="u_approve.php?id=<?php echo $row['id'];?>"><i class="fa fa-arrow-right"></i><span>accept</span></a>
					   
						 <!--<a class="btn-slide mt-2" href="u_reject.php?id=<?php echo $row['id'];?>"><i class="fa fa-arrow-right"></i><span>Reject</span></a> -->
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