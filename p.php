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
$post_id = $_GET[value2];
		$post_id1 = $_GET[value2];
		$postd = $_GET[pid];
		if($post_id){
		$follow_userid = $_GET[user];
		
		$comid = $_GET[comment_id];
		$ref = $_GET[ref];
		$timestamp = time();
		$timestap = time();
			$content = "voted your poll";
			$type = "poll";
							include "connect.php";
	
					if(mysqli_num_rows($query23)>=1){
	                $del="DELETE FROM poll 
					WHERE post_id='$postd'  AND   user_id='$user_id'
						";
					mysqli_query($conn,$del);
			
					}
					if($post_id){
					$sql="INSERT INTO poll (values,post_id,user_id,timestamp) 
						 VALUES ('$post_id','$postd','$user_id','$timestamp')
						";
				}else{
			$sql="INSERT INTO poll (values,post_id,user_id,timestamp) 
						 VALUES ('$post_id1','$postd','$user_id','$timestamp')
						";
						
						}
						mysqli_query($conn,$sql);
						
						
				if($user_id==$follow_userid){
				}else{
								$not="INSERT INTO notifications(post_id,user_id,user2, timestamp,content,type,content_id) 
						 VALUES ('$postd','$user_id','$follow_userid','$timestap','$content','$type','$comid')
						";
						mysqli_query($conn,$not);
						}
						
						
						if($post_id){
						
					$up="UPDATE posts
						 SET value2a = value2a + 1
						 WHERE id='$postd'
						"
					;	
						
				}
				
				if($post_id1){
			$up="UPDATE posts
						 SET value2a = value2a + 1
						 WHERE id='$postd'
						"
					;
					}
					mysqli_query($conn,$up);
						//Check If The PERSON WHO IS UPVOTING HAS ALREADY DOWNVOTED
					$qe = "SELECT id
							FROM poll 
							WHERE post_id='$postd' AND user_id='$user_id'
										  ";
				$query23= mysqli_query($conn,$qe);

			mysqli_close($conn);
if($ref ==13)
{
header ("location: comment.php?post=$postd&comment=$comid ");

}else{
header ("location: post.php?pid=$postd ");
}

}else{

if($ref ==13)
{
header ("location: comment.php?post=$postd&comment=$comid ");

}else{
header ("location: post.php?pid=$postd ");
}

}
?><?php ob_end_flush();?>