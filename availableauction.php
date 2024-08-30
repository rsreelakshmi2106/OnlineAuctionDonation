<?php
date_default_timezone_set("Asia/Calcutta");
include("header.php");
session_start();
?>

<style>


</style>
<!--meta http-equiv="refresh" content="10"-->



 <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
             
                <h1 class="mb-5">Auction</h1>
            </div>
			
	
            <div class="row g-4" >
			<?php
include("conn.php");
$sel = "SELECT * FROM auction where status !='claimed'";
$res = mysqli_query($con, $sel);
while ($row = mysqli_fetch_array($res)) {
    $startTime=$row['s_time'];
    $endTime = $row['e_time'];

/*
date_default_timezone_set('Asia/Kolkata');
$current_date = date( 'Y-m-d h:i:s');
//echo $current_date;
//echo $endTime;

    $to_time = strtotime($current_date);
	$from_time = strtotime($endTime);
	$time_remain= round(($from_time-$to_time) / 60,2);
	
	//echo "<br>$current_date <br> $endTime <br>Diff ".$time_remain;
	*/
//echo "SELECT MAX(bid_amount) AS cc FROM bid WHERE u_id='$_SESSION[uid]' and p_id='$row[p_id]'";

$query = "SELECT * FROM bid WHERE a_id = '$row[a_id]'";
$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
 
  while ($rows = mysqli_fetch_assoc($result)) {
    // Access the data from the row
  }
} else {
  //echo "No data";
}

?>
	
    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
        <div class="service-item p-4">
            <div class="overflow-hidden mb-4">
                <img class="img-fluid" src="./uploads/<?php echo $row['image']; ?>" alt="">
            </div>
            <h4 class="mb-3">Name: &nbsp;<?php echo $row['name']; ?></h4>
            <h6 class="mb-3"><b>Category: &nbsp;</b><?php echo $row['category']; ?></h6>
            <p><b>Description: &nbsp;</b><?php echo $row['disc']; ?></p>
            <p><b>Price: &nbsp;</b><span>$</span><?php echo $row['price']; ?></p>
            
            <?php
			
			// Admin inputs the bid date and time (YYYY-MM-DD HH:MM:SS format)
			//$bidDateTime = "2023-06-23 24:00:00";
			$bidDateTime = $endTime;

			// Get the current date and time
			$currentDateTime = date("Y-m-d H:i:s");
			//echo $currentDateTime;

			// Compare the bid date and time with the current date and time
			if ($currentDateTime > $bidDateTime) {
				echo "<b style='color:red;'>Bid is over.</b><br>";
               // if($userIDWithMaxBid = $qq['u_id'])
				if($qq['cc']=== null)
				{
				//echo "<a href='claim.php?id=" . $row['a_id'] . "' class='btn btn-success'>Claim</a>";
                //$ins="insert into a_sell(p_id,name,category,disc,image,price,status)select p_id,name,category,disc,image,price from auction where a_id='$row[a_id]'"
                $cc=mysqli_query($con,"select * from a_sell where p_id='$row[p_id]'");
				//echo "select * from a_sell where p_id='$row[p_id]'";
				$cc1=mysqli_num_rows($cc);
				//echo $cc1;
				if($cc1>0)
				{
					//echo "qqq";
				}elseif($row['status']==null){
				
				$ins = "INSERT INTO a_sell (p_id, name, category, disc, image, price, status)
                SELECT p_id, name, category, disc, image, price, 'pending'
                FROM auction
                WHERE a_id = '$row[a_id]'";
				mysqli_query($con,$ins); 
				$pid=$row['p_id'];
				mysqli_query($con,"DELETE FROM `auction` WHERE `p_id`='$pid'");
				}
				else{
					//hello
					}
                   
            }
				//echo "SELECT MAX(bid_amount) AS cc,u_id FROM bid WHERE p_id='$row[p_id]'";
				$q=mysqli_query($con,"SELECT MAX(bid_amount) AS cc   FROM bid WHERE p_id='$row[p_id]'");
//$q=mysqli_query($con,"SELECT MAX(bid_amount) AS cc FROM bid WHERE p_id='$row[p_id]'");
$qq=mysqli_fetch_array($q);


			$q=mysqli_query($con,"SELECT * FROM bid WHERE p_id='$row[p_id]' and bid_amount=$qq[cc] ");
			$qq=mysqli_fetch_array($q);
			$userIDWithMaxBid = $qq['u_id'];


				
				//echo $userIDWithMaxBid."-".$_SESSION['uid']."-".$row['p_id'];
				  if($_SESSION['uid']==$userIDWithMaxBid){
					echo "<a href='claim.php?id=" . $row['a_id'] . "' class='btn btn-success'>Claim</a>";
				  }
				
		
				
			} else {
				$remainingTime = strtotime($bidDateTime) - strtotime($currentDateTime);
				$remainingHours = floor($remainingTime / 3600);
				$remainingMinutes = floor(($remainingTime % 3600) / 60);
				$remainingSeconds = $remainingTime % 60;
				
				echo "Remaining time: $remainingHours hours, $remainingMinutes minutes, $remainingSeconds seconds";
                echo "Current date : $currentDateTime";
				
				//echo "<p><b>Time Remaining: &nbsp;</b>" . $time_remain." minute</p>";
				echo "<br>";
				echo "<button class='btn btn-success'><a href='bid.php?id=" . $row['a_id'] . "'>Place Bid</a></button>";
			}
			
			
			
?>
        </div>
    </div>
    <?php
}
?>

<!--script>
    // Auto-refresh the page every 5 seconds
    setInterval(function() {
        location.reload();
    }, 5000);
</script-->


               </div>
				</div>
				</div>
    <!-- Service End -->














<?php
include("footer.php");
?>