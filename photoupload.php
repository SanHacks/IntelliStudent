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


//Make sure it was a valid file, if not complain. 
if ((($ext == "jpg") || ($ext == "png") || ($ext == "gif")) && ($_FILES["file"]["size"] < 5000000))
  {
  	
  	//Check for errors, make sure upload worked
  	if ($_FILES["file"]["error"] > 0)
    	{
		$post_wid =$_POST[username];
	   $success = 'success';
header("location: userprofile.php?name=$post_wid&successs=$success");
exit();
    	}
 	 else
    	{
    	//Check image size
    	list($width,$height)=getimagesize($_FILES["file"]["tmp_name"]);
    	if ($width > 600)
    	{
    	
    	//Resize image
    	$newwidth=300;
		$newheight=($height/$width)*$newwidth;
		$tmp = imagecreatetruecolor($newwidth, $newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$width = $newwidth;
		$height = $height;
		$oldsrc = $src;
		$src = $tmp;
		$ext="jpg";
		imagedestroy($oldsrc);
		}
    

		
		//Get pic info and upload pic to server
		$RandoNum = "IntelliFeed";
		$RandomNum = rand(0, 9999999999);
		$nameof = "$RandoNum-$RandomNum-$userid";
		
		$picid = $nameof;
		$picturelocation = "userfiles/photos/$picid.$ext";
	
		//move pic
		move_uploaded_file($_FILES["file"]["tmp_name"],
      "$picturelocation");
      	if($ext==gif){
		
		
		
		}else{
		     	$magicianObj = new imageLib($picturelocation);

     $contentv = $_POST['content'];
     $tgged = $_POST['tag'];

     $valueme = "#";
	
	$strings = $_POST['content'];
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
   
	
		if($tgged){
		if($value0){
    $magicianObj -> addCaptionBox('b', 115, 0, '#000',   65);
	$magicianObj -> addText($valueme.$value0, 'bl', 20,'#FFF',90);
	//$magicianObj -> addTextToCaptionBox($value0);
	//$magicianObj -> addText($value0, '460x460', 65, '#000', 65, 65, 'php/fonts/windsong.ttf');
	//$magicianObj -> addWatermark('images/logo.png', '50x 50', 180, 30);
    }
    }
	
    $magicianObj -> resizeImage(460,460, 'portrait', true);
	
   
		$magicianObj -> saveImage($picturelocation, 65);
		
		}
      	//post variables
		$nt = $_POST['content'];
		$typee = $_POST['type'];
		$tribe = $_POST['user'];
		$name = $_POST['username'];
		$location = $_POST['location'];
		 $section  =  $_POST['section']; 
		$timestamp = time();
		$timestap = time();


		include "connect.php";
	
	 $id = $rows['id'];

		

		$sql="INSERT INTO posts(post,user_id,image,timestamp,type,location,section)
VALUES
('$nt','$userid','$picturelocation','$timestamp ','$ext','$location','$section')";
$sqls=mysqli_query($conn, $sql) or die(mysql_error());

$flick = $_POST['twitter'];
if($flick){
      	require_once('/src/codebird.php');

\Codebird\Codebird::setConsumerKey("aQZaWL11hIMgYJoOTMcttTjNx", "3nvAK1HO5JhiCS4M0tFNZDD19HEWR0CF8AfqKJGzzvh6eiSBkd");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("2217127438-G759OmrTrig9mbVobiFlAweAmGx9asO7BPxHszN", "pxqxexpEyOVXcHBywKI5vKDqlbbIOA4IEGo90hpfe1M0A");

$params = array(
	'status' => "$contentv via @intellifeed_ ",
	'media[]' => "$picturelocation"
);
$reply = $cb->statuses_updateWithMedia($params);		

}
 
	   $yi="UPDATE users
					 SET posts = posts + 1
					 WHERE id='$user_id'
					";
					$com=mysqli_query($conn, $yi) or die(mysql_error());
						//Get hashtags from user text
	
   
   
   
   
				if($value0){

				$comie=	"INSERT INTO tags(tag,user_id,timestamp,location) 
						 VALUES ('#$value0','$user_id','$timestamp','$location')
						";	
						$comi=mysqli_query($conn, $comie) or die(mysql_error());
						if($value1){
$comie1="INSERT INTO tags(tag,user_id,timestamp,location) 
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
     
    $gotosms = "SELECT id,user_id
                          FROM posts 
                          WHERE user_id='$user_id' ORDER BY timestamp DESC
                          ";
		$querym=mysqli_query($conn, $gotosms) or die(mysql_error());
						 
    

     
      $rows = mysqli_fetch_assoc($querym);
	  
	  
	 $pp = $rows['id'];


		
	   $success = 'success';
header("location: home.php?username=$name&success=$success&pull=$pp");
exit();
      } 
}
else
	{
	$post_wid =$_POST[username];
	   $succes = 'succes';
header("location: home.php?username=$post_wid&successs=$succes");
exit();
	}
?>
<?php ob_end_flush();?>