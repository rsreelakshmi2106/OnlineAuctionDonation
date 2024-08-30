<?php
include("conn.php");
$upd="update products set status='approved' where id='$_REQUEST[id]'";
$pid=$_REQUEST[id];
mysqli_query($con,$upd);
header('Location:pay.php?id='.$pid); 
?>