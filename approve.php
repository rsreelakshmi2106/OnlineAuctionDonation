<?php
include("conn.php");
$upd="update products set status='approved' where id='$_REQUEST[id]'";
mysqli_query($con,$upd);
header("location:receivedonation.php");
?>