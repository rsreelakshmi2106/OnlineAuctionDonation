<html>
<body>
<?php
include("conn.php");
$del="delete from u_sell where id='$_REQUEST[id]'";
$res=mysqli_query($con,$del);
header("location:viewu_product.php");
?>

</body>





</html>