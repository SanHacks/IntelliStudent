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

//Initialize Values

require_once('php/php_image_magician.php');
$userid = $_SESSION['user_id'];
$src = NULL;
$ext = "";

//Based upon file, convert for use in database
if (($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg"))
{
	$ext = "jpg";
	$src = imagecreatefromjpeg($_FILES['file']['tmp_name']);
}
else if ($_FILES["file"]["type"] == "image/png")
{
	$ext = "png";
	$src = imagecreatefrompng($_FILES['file']['tmp_name']);
}
else if ($_FILES["file"]["type"] == "image/gif")
{
	$ext = "gif";
	$src = imagecreatefromgif($_FILES['file']['tmp_name']);
}
else if ($_FILES["file"]["type"] == "video/mp4")
{
	$ext = "mp4";
	$src = $_FILES['file']['tmp_name'];
}else if ($_FILES["file"]["type"] == "video/webm")
{
	$ext = "webm";
	$src = $_FILES['file']['tmp_name'];
}else if ($_FILES["file"]["type"] == "video/ogg")
{
	$ext = "ogg";
	$src = $_FILES['file']['tmp_name'];
}


//Make sure it was a valid file, if not complain. 
if ((($ext == "mp4") ||($ext == "ogg") ||($ext == "webm") ||($ext == "jpg") || ($ext == "png") || ($ext == "gif")) && ($_FILES["file"]["size"] < 50000000))
  {
  	
  	//Check for errors, make sure upload worked
  	if ($_FILES["file"]["error"] > 0)
    	{
 $post_wid =$_POST[tribe];
	 $succes = 'succes';
header("location: appdate-listp.php?tribe=$post_wid&succes=$succes");
exit();
    	}
 	 else
    	{
    	//Check image size
    	list($width,$height)=getimagesize($_FILES["file"]["tmp_name"]);
    

		
		//Get pic info and upload pic to server
		$RandoNum = "IntelliFeed";
		$RandomNum = rand(0, 9999999999);
		$nameof = "$RandoNum-$RandomNum-$userid";
		
		$picid = $nameof;
		$picturelocation = "userfiles/photos/$picid.$ext";
	
		//move pic
		move_uploaded_file($_FILES["file"]["tmp_name"],
      "$picturelocation");
  	$magicianObj = new imageLib($picturelocation);


   $contentv = $_POST['content'];
	//$magicianObj -> addWatermark('images/logo.png', '50x 50', 180, 30);
		if($value0){
    //$magicianObj -> addCaptionBox('b', 115, 0, '#000',   65);
	//$magicianObj -> addText($valueme.$value0, 'bl', 20,'#FFF',90);
	//$magicianObj -> addTextToCaptionBox($value0);
	//$magicianObj -> addText($value0, '460x460', 65, '#000', 65, 65, 'php/fonts/windsong.ttf');
    }
    $magicianObj -> resizeImage(460,460, 'portrait', true);
	

     
$content = $_POST['content'];
$value1a = $_POST['value1'];
$value2a = $_POST['value2'];
$value1link = $_POST['value1link'];
$value2link = $_POST['value2link'];
$post_id =$_POST['post_id'];
$location =$_POST['location'];
$timestamp = time();
$role = "list";


		include "connect.php";


 $er="INSERT INTO posts(post,user_id,timestamp,location,value1,value2,value1link,value2link,roles,image)
VALUES
('$content','$user_id','$timestamp ','$location','$value1a','$value2a','$value1link','$value2link','$role','$picturelocation')";
$sqlsr=mysqli_query($conn, $er) or die(mysql_error());
	   $yi=  	"UPDATE users
					 SET posts = posts + 1
					 WHERE id='$user_id'
					";
					$com=mysqli_query($conn, $yi) or die(mysql_error());

						$strings =$_POST['content'];
 $result = explode('#',$strings);
 array_shift($result);
 
 

 
 //print_R($result);
//echo $cleantexts = implode($result, " 	"); 
 
  //  foreach($result as $key => $resul) {
   // $key = $result;
	//echo "$key 
//	";
	$value0 = $result[0];
   $value1 = $result[1]; 
   $value2 = $result[2];   
   $value3 = $result[3];   
   
   
   
   
   

if($value0){

$comie=	"INSERT INTO tags(tag,user_id,timestamp,location) 
						 VALUES ('#$value0','$user_id','$timestamp','$location')
						";	
						$comi=mysqli_query($conn, $comie) or die(mysql_error());
						if($value1){
$comie1=	"INSERT INTO tags(tag,user_id,timestamp,location) 
						 VALUES ('#$value1','$user_id','$timestamp','$location')
						";
						$comi1=mysqli_query($conn, $comie1) or die(mysql_error());
						}
						
						if($value2){
$comie2=	"INSERT INTO tags(tag,user_id,timestamp,location) 
						 VALUES ('#$value2','$user_id','$timestamp','$location')
						";
						$comi2=mysqli_query($conn, $comie2) or die(mysql_error());
						}	

						if($value3){
$comie3=	"INSERT INTO tags(tag,user_id,timestamp,location) 
						 VALUES ('#$value3','$user_id','$timestamp','$location')
						";
						$comi3=mysqli_query($conn, $comie3) or die(mysql_error());
						}
						
						}	

	$stringse = $_POST['content'];
 $resulte = explode('@',$stringse);
 array_shift($resulte);
 
 

 
 //print_R($result);
//echo $cleantexts = implode($result, " 	"); 
 
  //  foreach($result as $key => $resul) {
   // $key = $result;
	//echo "$key 
//	";
	$value0e = $resulte[0];
   $value1e = $resulte[1]; 
   $value2e = $resulte[2];   
   $value3e = $resulte[3];   
   $timestap = time();
   $types = "mention";
       $contenta = "Mentioned you on a post";
    
    $gotosms = "SELECT id,username
                          FROM users 
                          WHERE username='$value0e'
                          ";
		$querym=mysqli_query($conn, $gotosms) or die(mysql_error());
						 
    
    if(mysqli_num_rows($querym)>=1){
     
      $rows = mysqli_fetch_assoc($querym);
	  
	  
	 $id = $rows['id'];





     if($value0e){
       
                $not="INSERT INTO notifications(user_id,user2, timestamp,content,type) 
						 VALUES ('$user_id','$id','$timestap','$contenta','$types')
						";
						mysqli_query($conn, $not) or die(mysql_error());
					//	if($value1){
                     //    $comie1="INSERT INTO tags(tag,user_id,timestamp,location) 
					//	 VALUES ('#$value1','$user_id','$timestamp','$location')
					//	";
					//	$comi1=mysqli_query($conn, $comie1) or die(mysql_error());
					//	}					
						}	
							
   	}
   						

	   $success = 'success';
	
header("location: home.php?success=$success");
exit();

      } 
}
else
	{
	
	   $success = 'success';
header("location: appdate-listp.php?success=$success");
exit();
	}
?><?php ob_end_flush();?>