		<?php		
						if($user_id!=$id){
					include 'connect.php';
					$query23l= "SELECT id
										   FROM votesup 
										   WHERE comment_id='$id' AND user_id='$user_id'
										  ";
	$query23=mysqli_query($conn, $query23l);
					mysqli_close($conn);
if(mysqli_num_rows($query23)>=1){
				
						echo "
			<div class='col-25'>			
<a href='#'
style='font-weight:bold;font-size: 14px;color:red;' ><i class='icon f7-icons'>chevron_up</i><p>Upvoted</p>$votesup</a></div>";
					}
					else{
						echo"<div class='col-25'>
<a href='upvote.php?comment_id=$id&post=$id&user=$comment_user' style='font-weight:bold;font-size: 14px;color:white;' ><i class='icon f7-icons'>up</i><p>Upvote</p>
";
if($votesup){
echo "$votesup";
}
echo"</a></div>";
					}
				}
				
						if($user_id!=$id){
					include 'connect.php';
					$query23la = "SELECT id
										   FROM votesdown 
										   WHERE comment_id='$id' AND user_id='$user_id'
										  ";
										  
						$query233=mysqli_query($conn, $query23la);				  
					mysqli_close($conn);

					if(mysqli_num_rows($query233)>=1){
						echo "<div class='col-25'>
<a href='#'
style='font-weight:bold;font-size: 14px;color:red;' ><i class='icon f7-icons'>chevron_down</i><p>Downvoted</p>$votesdown</a></div>";
					}else{

echo "<div class='col-25'>
<a href='downvote.php?comment_id=$id&post=$id' style='font-weight:bold;font-size: 14px;color:white;'><i class='icon f7-icons'>down</i><p>Downvote</p>";
if($votesdown){
echo "$votesdown";
}
echo"</a> </div>";

					}
				}
				
				
				?>