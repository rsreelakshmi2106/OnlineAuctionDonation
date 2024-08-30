<?php
include("header.php");
?>

<style>


</style>
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

            <h1 class="mb-5">Auction Item</h1>
        </div>


        <div class="row g-4">
            <?php
            include("conn.php");
            //include("action.php");
            $sel = "SELECT * FROM auction WHERE a_id='$_REQUEST[id]'";
            $res = mysqli_query($con, $sel);
            while ($row = mysqli_fetch_array($res)) {
				$startTime=$row['s_time'];
    $endTime = $row['e_time'];
                $to_time = strtotime($endTime);
	$from_time = strtotime($startTime);
	$time_remain= round(abs($to_time - $from_time) / 60,2);
	//echo $time_remain;
            ?>
                <div class="col-md-6 col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid" src="./uploads/<?php echo $row['image']; ?>" alt="" width="600px" height="50px">
                </div>
                <div class="col-md-6 col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <p><b style="color:red">Time Remaining: &nbsp;</b><br><?php echo $time_remain . ' minutes ' ; ?></p>
                        <h4 class="mb-3">Name: &nbsp;<?php echo $row['name']; ?></h4>
                        <h6 class="mb-3"><b>Category: &nbsp;</b><?php echo $row['category']; ?></h6>
                        <p><b>Description: &nbsp;</b><?php echo $row['disc']; ?></p>
                        <p><b>Price: &nbsp;</b><span>$</span><?php echo $row['price']; ?></p>
                        <form method="post">
                            <input type="hidden" name="u_id" value="<?php echo $_SESSION['uid']; ?>" style="width:200px">
                            <input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">
                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <input type="text" name="bid_price" style="width:200px" placeholder="enter bid amount">
                            <input type="submit" name="submit" value="add amount">
                        </form>

                    </div>
                </div>
            <?php
            }
            ?>


            <?php
            //header("location:availableauction.php");
            if (isset($_POST['submit'])) {
                $bidPrice = $_POST['bid_price'];
                $u_id = $_SESSION['uid'];
                $aid = $_REQUEST['id'];
                $pid = $_POST['p_id'];
                $name=$_POST['name'];

                $selectAuction = "SELECT * FROM auction WHERE a_id='$aid'";
                $resultAuction = mysqli_query($con, $selectAuction);
                $rowAuction = mysqli_fetch_assoc($resultAuction);
                if ($bidPrice > $rowAuction['price']) {
                    $insertBid = "INSERT INTO bid (u_id,a_id,p_id,name,bid_amount) VALUES ('$u_id','$aid','$pid','$name','$bidPrice')";
                    mysqli_query($con, $insertBid);

                    $updateAuction = "UPDATE auction SET price='$bidPrice',status='biding' WHERE a_id='$aid'";
                    $cc=mysqli_query($con, $updateAuction);
					if($cc)
					{
						echo "<script>alert('success')
							window.location='availableauction.php';</script>";
					}
                    // You can add additional logic or display a success message here
					
                }
				else{
					echo "<script>alert('bid amount is lower than current amount')</script>";
				}
            }
            ?>


<?php
// Fetch and display the bid list
$selectBids = "SELECT * FROM bid WHERE a_id='$_REQUEST[id]' ORDER BY bid_amount DESC";
$resultBids = mysqli_query($con, $selectBids);

if (mysqli_num_rows($resultBids) > 0) {
    echo '<h3>Bid List:</h3>';
    echo '<ul>';
    while ($rowBid = mysqli_fetch_assoc($resultBids)) {
        echo '<li>User ID: ' . $rowBid['u_id'] . ', Bid Amount: $' . $rowBid['bid_amount'] . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>No bids found.</p>';
}
?>


        </div>
    </div>
</div>
<!-- Service End -->

<?php
include("footer.php");
?>
