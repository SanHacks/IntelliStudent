<?php ob_start(); ?>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>
<?php
 if(!$user_id){
   header("location: index.php");
  exit;
 }
?>
<?php


		$follow_userid = $_GET['tribe'];
		$name = $_GET['name'];
	
		include 'connect.php';
			$chi = "SELECT user_id
										   FROM tribemems 
										   WHERE user_id='$user_id' AND tribe_id='$follow_userid'
										  ";
			$query2=mysqli_query($conn, $chi);
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
			include 'connect.php';
			$yiq="DELETE FROM tribemems  WHERE user_id='$user_id'  AND  tribe_id='$follow_userid'
						";
			$com=mysqli_query($conn, $yiq);
			$yi="UPDATE tribes
						 SET members = members - 1
						 WHERE id='$follow_userid'
						";
	$comx=mysqli_query($conn, $yi);

			mysqli_close($conn);
		}
		header("Location: tribe.php?tribe=$follow_userid&name=$name");
	

?><?php ob_end_flush();?>