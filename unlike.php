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
if($_GET['pid']){
	
		$follow_userid = $_GET['userid'];
		$post_id = $_GET['pid'];
		$timestamp = time();
		include "connect.php";
		
		
			
			
			$query2="DELETE FROM likes 
					WHERE post_id=' $post_id'  AND   user_id='$user_id'
						";
						 mysqli_query($conn,$query2);
			$query22="UPDATE posts
						 SET likes = likes - 1
						 WHERE id='$post_id' LIMIT 1
						";
						 mysqli_query($conn,$query22);
											$yh="UPDATE users
						 SET likes = likes - 1
						 WHERE id='$user_id'
						";
        mysqli_query($conn,$yh);
			mysqli_close($conn);
		
		header("location: post.php?pid=$post_id");
	
}
?><?php ob_end_flush();?>