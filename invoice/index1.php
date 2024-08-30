
	 
 <?php 
session_start();

error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
    $date=date('Y-m-d');
$con=mysqli_connect("localhost","root","","online_auction");
// Start the session
$oid=$_SESSION['oid'];
 

$sql1="SELECT * FROM `auction` WHERE `a_id`='$oid'";
$result1=mysqli_query($con,$sql1);
$cc1=mysqli_fetch_array($result1);


 ?>
 
<script> 
    function printDiv() { 
      var divContents = document.getElementById("div_print").innerHTML; 
      var a = window.open('', '', 'height=500, width=500'); 
      a.document.write(divContents); 
      a.document.close(); 
      a.print(); 
    } 
  </script> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Donate Sell Bid
</title>
   

    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body  id='print'>
 <div id="div_print" >
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png" style="width: 250px;">
      </div>
      <h1>INVOICE</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div><!--
      <div id="project">
        <div><span>PROJECT</span> Website development</div>
        <div><span>CLIENT</span> John Doe</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>-->
    </header>
        <main>
      <table border=1>
        <thead>
          <tr>
            <th class="service">NAME</th>
            <th class="service">CATEGORY</th>
            <th class="desc">DESCRIPTION</th>
            <th>BID PRICE</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
            <?php 
		date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d');
		
		$sql="SELECT * FROM `auction` WHERE `a_id`='$oid'";
		$result=mysqli_query($con,$sql);
		$i=1;
		$cc=mysqli_fetch_array($result);
		{
		 
		 $sql5="SELECT * FROM `product` WHERE `id`='$cc[pro_id]'";
		$result11=mysqli_query($con,$sql5);
		$cc11=mysqli_fetch_array($result11);

		 
		 $t1=$cc['amount'];
		 $t2=$cc['qty'];
		 
         $tot=$t1*$t2;
		 $tp=$tp+$tot;
		 
      ?>
		  <tr>
            <td class="service"><?php echo $cc1['name']; ?></td>
            <td class="service"><?php echo $cc['category']; ?></td>
            <td class="service"><?php echo $cc['disc']; ?></td>
            <td class="service">₹ <?php echo $cc['price']; ?></td>
            <td class="total">₹ <?php echo $cc['price']; ?></td>
          </tr>
		 <?php
	 $i++;
       }
     ?> 
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">₹ <?php echo $cc1['price']; ?></td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">₹ <?php echo $cc1['price']; ?></td>
          </tr>
        </tbody>
      </table>
	  
	  
	  </div>
	  
	   <a href="../availableauction.php" class="">Back</a>
	<input type="button" value="click" onclick="printDiv()">
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>