<?php ob_start(); 
?>
<?php include"sessions.php"; 
		$page="allowed";

?>
	<?php
	if(!$user_id){
	header("location: index.php");
	exit;
				}
		
 		

//I Try To Comment on my code but time ...
	if($user_id){
		include "connect.php";
		$gotof = "SELECT username,avatar,name,id
                              FROM users 
                              WHERE id='$user_id'
                             ";
							 $goto=mysqli_query($conn, $gotof) or die(mysql_error());
		mysqli_close($conn);
		$rows= mysqli_fetch_assoc($goto);
		$usernames = $rows['username'];
		$imagess = $rows['avatar'];
		$names = $rows['name'];
		}
		
		if($user_id){
 		include"connect.php";
			$queryyi = "SELECT name,avatar,background,about,user_id,website,hometown,id
                              FROM tribes 
                              WHERE user_id='$user_id' AND id = '$tri' 
                             ";
							 $query=mysqli_query($conn, $queryyi) or die(mysql_error());	
					
		mysqli_close($conn);
		
		
		$row = mysqli_fetch_assoc($query);
		$image = $row['avatar'];
		$background = $row['background'];
		$name = $row['name'];
		$hometown = $row['hometown'];
		$website = $row['website'];
		$about = $row['about'];
		$tribe_id = $row['id'];
				   	$about = preg_replace('/@(\\w+)/','
			
			<a href=userprofile.php?username=$1>
			
			$0</a>',$about);
			
			 $about = preg_replace('/#(\\w+)/','
			 
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$about);
				 //Replace www. with a link https:
			 
		 $about = preg_replace ("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"https://\\2\" target=\"_blank\">\\2</a>", $about);	
		}
	?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>IntelliStudent</title>
		 <!-- Path to Framework7 Library CSS-->
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
					<div class="page" data-page="index" <?php echo"style='background-color:$backgroundc;'"; ?> >
   <div class="navbar " style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"#0c56ac";
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
      <div class="center"><?php echo"$name"; ?></div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
  		<?php include"sidemenu.php"; ?>				
		
	
						<div class="page-content">

						
	  <?php
	  	  echo"  <div class='card' style='background-image:url($background)' >
      <div class='card-content'>
        <div class='ks-grid'>
		  <div class='row no-gutter'>
          <div class='col-33'></div>
          <div class='col-33'><img src='$image' width='100%'/>
		  </div>
          <div class='col-33'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>";
		  
		  	if($auth==1){
						
						echo "		
		  <i class='icon material-icons'>verified_user</i></div>
         ";
						
					}
					else{
						
						echo "  ";
					}
			
		echo"
		 <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		</div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>$name</div>
          <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>";
	
		  
		  echo"
		  </div>
		  
          <div class='col-20'></div>
          <div class='col-20'></div>
        </div>";
		
		
		if($about){
					echo "<p style='color:silver,align:center';> $about </p>";
								}else{
						  echo "<a href='about-settings.php' <p>Enter A Short Bio About Your Classroom</p></a>";
							}
		
		echo"
		</div>
	
    </div>
	";
		
		 echo" 
	  <div class='list-block accordion-list'>
      <ul>
	    <li> 
	  	<a href='about-settings.php' >	  <p class='buttons-row'> <p class='button button-fill'  style='background-color:$well'>  <i class='icon f7-icons'>person</i>About me
			  </p></a>
			  
	  </li>
        <li class='accordion-item'><a href='#' class='item-link item-content'>
       			  <p class='buttons-row'><i class='icon f7-icons'>linked_camera</i> <p class='button button-fill'  style='background-color:$well'> Change profile picture
			  </p>
			  </p>
			 </a>
          <div class='accordion-item-content'>
            <div class='content-block'>
                 <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>"; ?>
       <form enctype="multipart/form-data" id="form04" method="post" action="tribepicture.php">
						
					
		 				
							<p class="attach">Source:</p>
						<?php echo"<input type='hidden' name='tribe' value='$tribe_id'>";
						?>	
  <p>  <input name="file" type="file" id="file" size="20"> 
  </p> <br />              
					
					<p id="but"><br />
						 
							
					
							 <p class='buttons-row'> <input class='link  button button-fill' value='Save'   type='submit' name='submit'  style='background-color:teal'>
							 
							 		<input class='link  button button-fill' value="Clear" type="reset" /></p>
							 </p>
	  </form>
       <?php echo"</div>
	</div>
	</div>
            </div>
          </div>
        </li>
  
      </ul>
    </div>";
		 echo" 
	  <div class='list-block accordion-list'>
      <ul>
        <li class='accordion-item'><a href='#' class='item-link item-content'>
			  <p class='buttons-row'> <i class='icon f7-icons'>camera_enhance</i><p class='button button-fill'  style='background-color:$well'> Change background picture
			  </p>
			  </p>
			 </a>
          <div class='accordion-item-content'>
            <div class='content-block'>
                 <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>"; ?>
       <form enctype="multipart/form-data" id="form05" method="post" action="tribebackground.php">
				<?php echo"<input type='hidden' name='tribe' value='$tribe_id'>";
						?>		
					
		 				
							<p class="attach">Source:</p>
						
  <p>  <input name="file" type="file" id="file" size="20"> 
  </p> <br />              
					
					<p id="but"><br />
						 
							
					
							 <p class='buttons-row'> <input class='link  button button-fill' value='Save'   type='submit' name='submit'  style='background-color:teal'>
							 
							 		<input class='link  button button-fill' value="Clear" type="reset" /></p>
							 </p>
	  </form>
       <?php echo"</div>
	</div>
	</div>
            </div>
          </div>
        </li>
  
      </ul>
    </div>";
	  	 echo" 
	  <div class='list-block accordion-list'>
      <ul>
        <li class='accordion-item'><a href='#' class='item-link item-content'>
          
		
			  </p>
			 </a>
          <div class='accordion-item-content'>
            <div class='content-block'>
			
                 <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>";
		 
		 
		 
	   
	   
	   echo"
	   
	   
        </div>
	
	
	</div>
	</div>
	
	
	
	
	
	
            </div>
          </div>
        </li>

      </ul>
    </div>
	  <div class='list-block accordion-list'>
      <ul>
	  
  
	<!---    <li> 
	  		<a href='themes.php' >	  <p class='buttons-row'> <p class='button button-fill'  style='background-color:$well'>  <i class='icon f7-icons'>layers</i>Themes
			  </p></a>
			  
	  </li> --->
	    <li> 
	  		
			  
	  </li>

  
      </ul>
    </div>
	

	
	";
	
		
	  
       		?>

	  

      </div>
    </div>	

       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
    
</body>
</html>
