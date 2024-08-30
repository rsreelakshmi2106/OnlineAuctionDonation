<?php
include("conn.php");
session_start();
$upd="update a_sell set status='accepted',u_id='$_SESSION[uid]' where id='$_REQUEST[id]'";
$pid=$_REQUEST[id];
mysqli_query($con,$upd);
header("location:u_pay.php?id=".$pid);
?>