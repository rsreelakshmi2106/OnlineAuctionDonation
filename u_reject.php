<?php
include("conn.php");
$upd="update a_sell set status='rejected' where id='$_REQUEST[id]'";
mysqli_query($con,$upd);
header("location:viewa_product.php");
?>