<?php
include("header.php");
?>

<style>
{
  text-align: center;
  padding:55px;
  border:1px dashed rgb(34, 255, 0);
  border-radius: 10px;
}

</style>
 <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
             
                <h1 class="mb-5">All Product</h1>
            </div>
			<table class="table table striped">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Category</th>
				<th>Discription</th>
				<th>Price</th>
				<th>Status</th>
				<th>Type</th>
				<th>Sell</th>
				<th>Auction</th>
			</tr>
	
					<?php
		include("conn.php");
		$sel="select * from products where status='approved'";
		//$sel="select * from products";
		//$sel="select * from donate_item";
		$res=mysqli_query($con,$sel);
		while($row=mysqli_fetch_array($res))
		{
			$q=mysqli_query($con,"SELECT * FROM `a_sell` WHERE `p_id`='$row[id]'");
			$qq=mysqli_fetch_array($q);
			$r=mysqli_query($con,"SELECT * FROM `auction` WHERE `p_id`='$row[id]'");
			$rr=mysqli_fetch_array($r);
		?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['category'];?></td>
			<td><?php echo $row['disc'];?></td>
			<td><?php echo $row['price'];?></td>
			<td><?php echo $row['status'];?></td>
			<td><?php echo $row['type']?></td>
			<!--<td><input type='submit' name='sell' value='Sell'></td>-->
			<?php
			if($qq['status']!='' || $rr['price']!='') //|| $row['type']=='Donated')
			{
			?>
			
			<?php
			}else{
			?>
			
			<td><a href="a_sellproduct.php?id=<?php echo $row['id'];?>"><i class="fa fa-arrow-right"></i><span>sell</span></a></td>
				<td><a href="auction.php?id=<?php echo $row['id'];?>"><i class="fa fa-arrow-right"></i><span>Auction</span></a></td>
			<?php
			}
			?>
		</tr>
		<?php
        }
                ?>
		</table>
		
				</div>
				</div>
    <!-- Service End -->

<?php
include("footer.php");
?>