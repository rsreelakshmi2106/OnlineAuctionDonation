<?php
date_default_timezone_set("Asia/Calcutta");
include("header.php");
?>

<style>


</style>
 <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
             
                <h1 class="mb-5">Auction</h1>
            </div>
			
	
            <div class="row g-4" >
			<?php
include("conn.php");
$sel = "SELECT * FROM auction where status!='claimed' order by a_id";
//$sel = "SELECT * FROM auction order by a_id";
$res = mysqli_query($con, $sel);
while ($row = mysqli_fetch_array($res)) {
   /* $startTime = strtotime($row['s_time']);
    $endTime = strtotime($row['e_time']);
   // $currentTime = time();
    $currentTime = date('Y-m-d H:i:s');
    $timeDiff = $endTime - $currentTime;

    $days = floor($timeDiff / (60 * 60 * 24));
    $hours = floor(($timeDiff % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($timeDiff % (60 * 60)) / 60);
    $seconds = $timeDiff % 60;*/

    $startTime = strtotime($row['s_time']);
    $endTime = strtotime($row['e_time']);
    $currentTime = time();
    $timeDiff = $endTime - $currentTime;

    $days = floor($timeDiff / (60 * 60 * 24));
    $hours = floor(($timeDiff % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($timeDiff % (60 * 60)) / 60);
    $seconds = $timeDiff % 60;
   

    
        // Rest of your code
    
    


    //if ($currentTime < $endtTime && $currentTime > $startTime) {
    ?>
    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
        <div class="service-item p-4">
            <div class="overflow-hidden mb-4">
                <img class="img-fluid" src="./uploads/<?php echo $row['image']; ?>" alt="">
            </div>
            <h4 class="mb-3">Name: &nbsp;<?php echo $row['name']; ?></h4>
            <h6 class="mb-3"><b>Category: &nbsp;</b><?php echo $row['category']; ?></h6>
            <p><b>Description: &nbsp;</b><?php echo $row['disc']; ?></p>
            <p><b>Initial Price: &nbsp;</b><span>$</span><?php echo $row['initial_price']; ?></p>
            <p><b>Price: &nbsp;</b><span>$</span><?php echo $row['price']; ?></p>
            <p><b>Starting time: &nbsp;</b><?php echo $row['s_time']; ?></p>
            <p><b>Ending time: &nbsp;</b><?php echo $row['e_time'];//$endTime; ?></p>
            <?php
           
             echo "<p><b>Time Remaining: &nbsp;</b>" . $days . ' days, ' . $hours . ' hours, ' . $minutes . ' minutes, ' . $seconds . ' seconds</p>';
             //echo "<button class='btn btn-success'><a href='bid.php'>Place Bid</a></button>";
             /*else {
            echo "<h6 class='mb-3'>Time Expired: &nbsp;" . $days . ' days, ' . $hours . ' hours, ' . $minutes . ' minutes, ' . $seconds . ' seconds</h6';
            }*/
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