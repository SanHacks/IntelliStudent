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
 if($_POST['content']!="" ){

 }else{
     $succes = 'empty';
header("location: invent-tribe.php?success=$succes");
exit();
 }
include("connect.php");

$content = $_POST['content'];
$about = $_POST['about'];
$im = $_POST['image'];
$timestamp = time();
$subject = $_POST['subject'];

$grade = $_POST['grade'];



$eaa="INSERT INTO tribes(name,user_id,about,avatar,timestamp,grade,subject)
VALUES
('$content','$user_id','$about','$im','$timestamp ','$grade','$subject')";
 $sql=mysqli_query($conn, $eaa) or die(mysql_error());
	$eaea=  	"UPDATE users
					 SET tribes = tribes + 1
					 WHERE id='$user_id'
					";
					
		 $com=mysqli_query($conn, $eaea) or die(mysql_error());

 	   $success = 'success';
header("location: tribes.php?success=$success");
exit();

mysqli_close($conn)

?><?php ob_end_flush();?>