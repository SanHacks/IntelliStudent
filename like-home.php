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
	
		$follow_userid = $_GET['key'];
		$post_id = $_GET['pid'];
		$post = $_GET['post'];
		$user = $_GET['user'];
		$reaction = $_GET['type'];
		$timestamp = time();
		$timestap = time();
include 'connect.php';
		if($post){

	$query2w ="SELECT id
										   FROM likes 
										   WHERE post_id='$post' AND user_id='$user_id'
										  ";
						 $query2=mysqli_query($conn, $query2w) or die(mysql_error());	


			}else{
					$query2w ="SELECT id
										   FROM likes 
										   WHERE post_id='$post_id' AND user_id='$user_id'
										  ";
						 $query2=mysqli_query($conn, $query2w) or die(mysql_error());		
				}						 
					mysqli_close($conn);

		if(!(mysqli_num_rows($query2)>=1)){
			include 'connect.php';
			$likes = likes + 1;
			$content = "Reacted on your post";
			$type = "like";
				if($user_id==$follow_userid){
				}else{
			$not="INSERT INTO notifications(post_id,user_id,user2, timestamp,content,type) 
						 VALUES ('$post_id','$user_id','$follow_userid','$timestap','$content','$type')
						";
						mysqli_query($conn, $not) or die(mysql_error());
					}	
//If POST IS REPOST OR ORIGINAL
if($post){
    $repost="INSERT INTO likes(post_id,user_id, timestamp,username) 
						 VALUES ('$POST','$user_id','$timestamp','$reaction')
						";
						
						mysqli_query($conn, $repost) or die(mysql_error());
						
						
						   $ORIGINAL="INSERT INTO likes(post_id,user_id, timestamp,username) 
						 VALUES ('$post_id','$user_id','$timestamp','$reaction')
						";
						
						mysqli_query($conn, $ORIGINAL) or die(mysql_error());
						
				$notsq="UPDATE posts
						 SET likes = likes + 1
						 WHERE id='$post_id'
						";	
						mysqli_query($conn, $notsq) or die(mysql_error());
						
			}else{
			
			
				$nots="INSERT INTO likes(post_id,user_id, timestamp,username) 
						 VALUES ('$post_id','$user_id','$timestamp','$reaction')
						";
						
						mysqli_query($conn, $nots) or die(mysql_error());
						
				$notsq="UPDATE posts
						 SET likes = likes + 1
						 WHERE id='$post_id'
						";	
						mysqli_query($conn, $notsq) or die(mysql_error());
						
							
			}		
	
						
						if($user){
							if($user_id==$user){
				}else{
			$notv="INSERT INTO notifications(post_id,user_id,user2, timestamp,content,type) 
						 VALUES ('$post_id','$user_id','$user','$timestap','$content','$type')
						";
						mysqli_query($conn, $notv) or die(mysql_error());
					}			
			$notsv="INSERT INTO likes(post_id,user_id, timestamp) 
						 VALUES ('$post','$user_id','$timestamp')
						";
						mysqli_query($conn, $notsv) or die(mysql_error());
			$notsqv="UPDATE posts
						 SET likes = likes + 1
						 WHERE id='$post'
						";	
						mysqli_query($conn, $notsqv) or die(mysql_error());
						}
		//	mysql_query("UPDATE users
			//			 SET followers = followers + 1
			//			 WHERE id='$follow_userid'
	//					");
	
	

			mysqli_close($conn);
		}
		$from_url = $_SERVER['HTTP_REFERER'];
				header("location: post.php?pid=$post_id");
	
}else{
header("location: index.php");
}
?><?php ob_end_flush();?>