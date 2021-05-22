 <?php 


	if($user_id){
		include "connect.php";
		$look =$_GET[tribe];
		if($next){
		
	$pinfow = "SELECT user_id
                              FROM tribemems WHERE tribe_id='$look' 
                         ORDER BY member_id DESC LIMIT 200,300
						 

                             ";	
							 $pinfo=mysqli_query($conn, $pinfow) or die(mysql_error());
						}
						elseif($nextt)
						{
		
	$pinfow = "SELECT user_id
                              FROM tribemems WHERE tribe_id='$look' 
                         ORDER BY member_id DESC LIMIT 100,200
						 

                             ";	
							 $pinfo=mysqli_query($conn, $pinfow) or die(mysql_error());
						}else{
		
$pinfow = "SELECT user_id
                              FROM tribemems WHERE tribe_id='$look' 
                         ORDER BY member_id DESC LIMIT 100
						 

                             ";	
							 $pinfo=mysqli_query($conn, $pinfow) or die(mysql_error());
						
		}
	
				
		
		mysqli_close($conn);
		
		
	while ($stuff = mysqli_fetch_array($pinfo)) {
	
		$comment_id = $stuff['id'];
		$receipt = $stuff['user2_id'];
		$comment_user = $stuff['user1_id'];


			 			include "connect.php";
		  $sa = "SELECT avatar,id,username,name,auth  FROM users WHERE id='$comment_user' 
				"; 
				$col=mysqli_query($conn, $sa) or die(mysql_error());
				while ($wowW = mysqli_fetch_assoc($col)) {
				$imageR = $wowW['avatar'];
				$nameR = $wowW['name'];
				$usernameR = $wowW['username'];
				$identt = $wowW['id'];
				$auth = $wowW['auth'];
}	

	  
   
 echo " 
 
 
 
 <div class='list-block media-list'>
      <ul>
        <li><a href='userprofile.php?username=$usernameR'  class='item-link item-content'>
            <div class='item-media'><img src='$imageR' width='80'/></div>
            <div class='item-inner'>
              <div class='item-title-row'>
                <div class='item-title'>$nameR</div>
                <div class='item-after'>	
				
				


";
	     	if($auth==1){
						
						echo "<i class='icon material-icons'>verified_user</i>";
						
					}
					else{
						
						echo "  ";
					}
include 'iffollow.php';
		if($user_id){
				if($user_id!=$comment_user){
					include 'connect.php';
					$dds ="SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$comment_user'
										  ";
										     $query2=mysqli_query($conn, $dds) or die(mysql_error()); 
					mysqli_close($conn);
			if(mysqli_num_rows($query3)>=1){
				echo "  <p style='color:gold'>• Follows You •</p>";
				}
				}
			}
			
					if($user_id){                                                                                                                                                                                                                                           
				if($user_id!=$comment_user){
					include 'connect.php';
					$dds = "SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$comment_user'
										  ";
										   $query2=mysqli_query($conn, $dds) or die(mysql_error()); 
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
						echo "<span><a href='unfollow.php?userid=$comment_user&username=$usernameR&ref=2' class='button button-fill button-raised' style='background-color:teal'>Following</a></br></span>";
					}
					else{
						echo "<span><a href='follow.php?userid=$comment_user&username=$usernameR' class='button button-fill button-raised' style='background-color:teal'>Follow</a></br></span>";
					}
				}
			}	
			echo"</div>
            </div></a></li></ul>
			</div>";
       		
           }



		   } 
	   ?>  