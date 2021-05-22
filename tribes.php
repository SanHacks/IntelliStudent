<?php ob_start(); 
?>
<?php include"sessions.php"; 
		$page="allowed";
error_reporting(0);

?>	<?php
	if(!$user_id){
	header("location: index.php");
	exit;
				}
		
 	if($user_id){
		include "connect.php";
		$queryh = "SELECT id,username,avatar,background,name,aboutme,hometown,followers,following,auth,facebook,pbackcolor,backcolor,stats,bback,posts,avatarpro,twitter,img
                              FROM users 
                              WHERE id='$user_id'
                             ";
						 $query=mysqli_query($conn, $queryh) or die(mysql_error());		 
							 
		mysqli_close($conn);
		$row = mysqli_fetch_assoc($query);
		//This one describes itself
		$username = $row['username'];
		$uid = $row['id'];
		$image = $row['avatar'];
		$imagepro = $row['avatarpro'];
		$back = $row['background'];
		$name = $row['name'];
		$about = $row['aboutme'];
		$followers = $row['followers'];
		$following = $row['following'];
        $hometown = $row['hometown'];
        $facebook = $row['facebook'];
        $auth = $row['auth'];
		$twitter=$row['twitter'];
		$postcolor=$row['pbackcolor'];
		$backgroundc=$row['backcolor'];
		$stats=$row['stats'];
		$bback=$row['bback'];
		$posts=$row['posts'];
				}
						  if($user_id){
  		include "connect.php";
		$birth ="SELECT id,user_id,bday,bmonth,byear,state,zodiac
                              FROM birthinfo 
                              WHERE user_id='$user_id'
                             ";
							 							$getbinfo=mysqli_query($conn, $birth) or die(mysql_error());
		mysqli_close($conn);
		$rowq = mysqli_fetch_array($getbinfo);
		$byear = $rowq['byear'];
		$bday = $rowq['bday'];
		$bmonth = $rowq['bmonth'];
		$pri = $rowq['state'];
		$sign = $rowq['zodiac'];
		}
		?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>IntelliStudent</title>
		 
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		  <link rel="stylesheet" href="css/framework7.material.min.css">
		<!-- Path to your custom app styles-->
		 <link rel="stylesheet" href="css/framework7.material.colors.min">
		<link rel="stylesheet" href="css/my-app.css">	
		
    </head>
    <body <?php echo"style='background-color:$backgroundc;'"; ?>>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
					<div class="page" data-page="index" <?php echo"style='background-color:$backgroundc;'"; ?>>
   <div class="navbar " style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"teal";
	} 
 
 ?>" >
    <div class="navbar-inner">
      <div class="left"><a href="
	  <?php				  		
					$from_url = $_SERVER['HTTP_REFERER'];

					if($from_url){		
		echo"$from_url";
								}else{
					echo"home.php";
								 }
								
								?>	
	  
	  " class="back link icon-only"><i class="icon icon-back"></i></a></div>
      <div class="center">Classrooms</div>

    </div>
  </div>
  		<?php include"bottom.php"; ?>				
		
					  <div class="toolbar tabbar" style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"teal";
	} 
 
 ?>">
    <div class="toolbar-inner"><a href="#tab1" class="active tab-link">Classrooms</a><a href="#tab2" class="tab-link">
	My Classrooms
	</a><a href="#tab3" class="tab-link">Suggested</a>
		<!-- <a href="#tab4" class="tab-link"><i class="icon f7-icons">social_instagram_fill</i></a> -->
	</div>
  </div>
  <div class="tabs-swipeable-wrap">

    <div class="tabs">
      <div id="tab1" class="page-content tab active hide-bars-on-scroll">

	 <?php	if($user_id){	  						    echo "  
			<div class='content-block'>
      <p class='buttons-row'><i class='icon f7-icons'>home</i><a href='t.php'  class='button button-fill button-raised'  >Build A Classroom</a></p>
			</div>
									";			
 } 
 ?>
         <?php   if($user_id){
		include "connect.php";
		

	
		$queryas = "SELECT avatar,name,about,views,comments,auth,members,id
                              FROM tribes Order by Views DESC Limit 12 
                             ";
							  $query=mysqli_query($conn, $queryas) or die(mysql_error());
		
		while ($row = mysqli_fetch_assoc ($query)) {
		
		$image = $row['avatar'];
		$name = $row['name'];
		$about = $row['about'];
		$hometown = $row['hometown'];
		$id = $row['id'];
                    $auth = $row['auth'];

echo"    <div class='list-block'>
      <ul>
        <li><a href='tribe.php?tribe=$id&name=$name'  class='item-link item-content'>
    
			
		                   <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>
         <div class='col-20'></div>
      <div class='col-20'>
		</div>
       <div class='col-20'>
		<img src='$image' width='95'/></div>
      <div class='col-20'>
	   </div>
       <div class='col-20'>
	   </div>
        </div>
	</div>
	</div>
            <div class='item-inner'>
              <div class='item-title-row'>
                <div class='item-title'>$name</div>";
				
				if($user_id){
		
					include 'connect.php';
					$querym = "SELECT user_id
										   FROM tribemems 
										   WHERE user_id='$user_id' AND tribe_id='$id'
										  ";
									$query2=mysqli_query($conn, $querym) or die(mysql_error());
			  
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
						echo "  <p style='color:gold'>• You're a member •</p>";
					}
					
			}
			
			echo"
                <div class='item-after'>	";
				if($auth==1){
						
						echo " <i class='icon material-icons'>verified_user</i>";
						
					}
					else{
						
						echo "  ";
					}
					//echo"@$usernameR";
					
				echo"</div>
              </div></br></br>
              <div class='item-subtitle'>••$about••</div>
			  ";

			
			
			echo"
              <div class='item-text'>	";
			  
			  
			
			
				if($user_id){                                                                                                                                                                                                                                           
			
					
						echo "<span><a href='tribe.php?tribe=$comment_user&name=$usernameR' class='button button-fill button-raised' style='background-color:teal'>Join</a></br></span>";
					}
				
			echo"</div>
            </div></a></li></ul>
			</div>";
       		}

           }
		   
		   
		?>
	
      </div>
      <div id="tab2" class="page-content tab">

		 <?php	if($user_id){	  						    echo "  
			<div class='content-block'>
      <p class='buttons-row'><i class='icon f7-icons'>home</i><a href='t.php'  class='button button-fill button-raised'  >Build A Classroom</a></p>
			</div>
									";			
 } 
 ?>
	
		  <?php   if($user_id){
		include "connect.php";
		

	
		$queryase = "SELECT avatar,name,about,views,comments,auth,members,id,user_id
                              FROM tribes WHERE user_id='$user_id' Order by Views DESC Limit 12 
                             ";
							  $queryw=mysqli_query($conn, $queryase) or die(mysql_error());
		
		while ($rowe = mysqli_fetch_assoc ($queryw)) {
		
		$imaget = $rowe['avatar'];
		$namet = $rowe['name'];
		$aboutt = $rowe['about'];
		$hometownt = $rowe['hometown'];
		$idtu = $rowe['id'];
        $autht = $rowe['auth'];
		$subjecto = $rowe['subject'];
		$school = $rowe['school'];



echo"    <div class='list-block'>
      <ul>
        <li><a href='tribe.php?tribe=$idtu&name=$namet'  class='item-link item-content'>
    
			
		                   <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>
         <div class='col-20'></div>
      <div class='col-20'>
		</div>
       <div class='col-20'>
		<img src='$imaget' width='95'/></div>
      <div class='col-20'>
	   </div>
       <div class='col-20'>
	   </div>
        </div>
	</div>
	</div>
            <div class='item-inner'>
              <div class='item-title-row'>
                <div class='item-title'>$namet</div>";
				
				if($user_id){
		
					include 'connect.php';
					$querymt = "SELECT user_id
										   FROM tribemems 
										   WHERE user_id='$user_id' AND tribe_id='$idt'
										  ";
									$query2e=mysqli_query($conn, $querymt) or die(mysql_error());
			  
					mysqli_close($conn);
					if(mysqli_num_rows($query2e)>=1){
						echo "  <p style='color:gold'>• You're a member •</p>";
					}
					
			}
			
			echo"
                <div class='item-after'>	";
				if($autht==1){
						
						echo " <i class='icon material-icons'>verified_user</i>";
						
					}
					else{
						
						echo "  ";
					}
					//echo"@$usernameR";
					
				echo"</div>
              </div></br></br>
              <div class='item-subtitle'>•$aboutt•</div>
			  ";

			
			
			echo"
              <div class='item-text'>	";
			  
			  
			
			
				if($user_id){                                                                                                                                                                                                                                           
			
					
						echo "<span><a href='tribe.php?tribe=$idtu&name=$namet' class='button button-fill button-raised' style='background-color:teal'>Join</a></br></span>";
					}
				
			echo"</div>
            </div></a></li></ul>
			</div>";
       		}

           }
		   
		   
		?>
      </div>
      <div id="tab3" class="page-content tab">

    </div>
  </div>
						<div class="page-content">

						


   					
	  
       		
 
   
	  
	  
      </div>
    </div>	

       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
		
	
    

</body>
</html>
