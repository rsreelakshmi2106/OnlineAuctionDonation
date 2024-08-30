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
             
                <h1 class="mb-5">Users</h1>
            </div>
			<table class="table table striped">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
			</tr>
	
					<?php
		include("conn.php");
		//$sel="select * from products where status='approved'";
		//$sel="select * from u_register where id='$_SESSION[uid]'";
		//$sel="select * from donate_item";
        $sel="select * from u_register";
		$res=mysqli_query($con,$sel);
        while($row=mysqli_fetch_array($res))
        {
		?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['email'];?></td>
			<td><?php echo $row['phone'];?></td>
			<td><?php echo $row['address'];?></td>
			<!--<td><button class="btn btn-info"><a href="uprofile_update.php?id=<?php echo $row['id'];?>"><span>Update Profile</span></a></button></td>
        --></tr>
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