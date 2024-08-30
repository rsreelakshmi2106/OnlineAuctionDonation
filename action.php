<?php
session_start();
	include("conn.php");
	if(isset($_POST['submit']))
	{
	
	$email=$_POST['email']; 
	$password=$_POST['password'];
		if($email=="admin@gmail.com" && $password=="admin")
		{
	
			$_SESSION['type'] ="admin";
			$_SESSION['username'] ="admin";
			header("location:index.php");
		}
		else
			{
			$sel="SELECT * FROM u_register WHERE email='$email' and password='$password'";
			//echo $sel;
			$result = mysqli_query($con,$sel) or die(mysql_error());
			$rows = mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
					if($rows==1)
					{
						$_SESSION['uid']=$row['id'];
						$_SESSION['type']="user";
					
						header("Location:index.php");
					}

					else
					{
						header("Location:login.php");
					}
			
			}
		}	
	
?>