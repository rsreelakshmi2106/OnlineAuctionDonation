<?php
include("conn.php");
$upd="DELETE FROM `products` WHERE id='$_REQUEST[id]'";
mysqli_query($con,$upd);
header("location:viewusell_product.php");
?>