<?php
include("header.php");
?>

<style>


</style>

<script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
          
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
 <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
             
                <h1 class="mb-5">Sell Product</h1>
            </div>
			<form class="form-inline" method="POST" >
		  <label for="email">Start Date:</label>
		  <input type="date" id="email" placeholder="Enter email" name="start">
		  <label for="pwd">End Date:</label>
		  <input type="date" id="pwd" placeholder="Enter password" name="end"> &nbsp;&nbsp;&nbsp;
		  <input type="submit" name="search" value="serach" class="btn btn-primary">
		</form>
		<div id="GFG" >	
	
            <div class="row g-4" >
			
				<table class="table">
					<tr>
						<th>#</th>
						<th>user</th>
						<th>name</th>
						<th>category</th>
						<th>date</th>
						<th>Initial price</th>
						<th>Bid Price</th>
					</tr>
								<?php
		include("conn.php");
		
		if(isset($_POST['search']))
	{
		$s=$_POST['start'];
		$e=$_POST['end'];
		
		//echo $s;
		//echo $e;
		
		//echo "SELECT * FROM $table where order_date between '$s' AND '$e' and shop_id='$_SESSION[shop_id]'";
		$sel = "SELECT * FROM auction where status='claimed' and date between '$s' AND '$e' ";
		
	}else{		
		$sel="select * from auction";
	}    
		
		//$sel="select * from donate_item";
		$res=mysqli_query($con,$sel);
		$i=1;
		while($row=mysqli_fetch_array($res))
		{
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['p_id'];?></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['category'];?></td>
				<td><?php echo $row['date'];?></td>
				<td><?php echo $row['initial_price'];?></td>
				<td><?php echo $row['price'];?></td>
			</tr>
				
				<?php
				$i++;
		}
		?>
				</table>
					
					
		
               </div>
			   </div>
			    <input type="button" value="Print" onclick="printDiv()" class='btn btn-primary'>
				</div>
				</div>
    <!-- Service End -->



















<?php
include("footer.php");
?>