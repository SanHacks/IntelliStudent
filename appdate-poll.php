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
    <body>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
					<div class="page" data-page="index">
<div class="navbar " style="background-color:#0c56ac" >
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
      <div class="center">Ask</div>
    </div>
  </div>
  
			
		
		 <?php
if(!$user_id){
		header (" location:index.php");
exit();
}
//I Try To Comment on my code but time ...
	if($user_id){
		include "connect.php";
	$gotos = "SELECT username,avatar,name,username,hometown
                              FROM users 
                              WHERE id='$user_id'
                             ";
							 	 $goto=mysqli_query($conn, $gotos) or die(mysql_error());
		mysqli_close($conn);
		$rows= mysqli_fetch_assoc($goto);
	$location = $rows['hometown'];
	
	
	?> 

						<div class="page-content">

<?php
		echo"				

       		  <form enctype='multipart/form-data' class='store-data list-block' role='form' action='savepoll.php' method='POST'>
      <ul>
        <li>
       
		            <div class='item-content'>
            <div class='item-media'><i class='icon f7-icons'>filter</i></div>
            <div class='item-inner'> 
              <div class='item-title label'>Publish...</div>
              <div class='item-input'>
			  <input type='hidden' name='post_id' value='$look'>
			    <textarea rows='8' cols='3'  placeholder='Let them know' name='content'></textarea>
           <input type='hidden' name='location' value='$location'>
			  
               <textarea rows='1' cols='1'  placeholder='First Choice' name='value1'></textarea>
				<textarea rows='1' cols='1'  placeholder='Second Choice' name='value2'></textarea>
				
		  	  
		  	         <div class='item-input'>
                <select name='section' class='item-link smart-select'>

                  
				  <option value='English'>English HL</option>
			
				  <option value='Life Sciences'>Life Sciences</option>
				  <option value='Geography'>Geography</option>
				  <option value='Physical Sciences'>Physical Sciences</option>
				  <option value='IT'>Information Technology</option>
				  <option value='Agricultural Sciences'>Agricultural Sciences</option>
				  <option value='EGD'>EGD</option>
				  <option value='Accounting'>Accounting</option>
				  <option value='Economics'>Economics</option>
				  <option value='Business Studies'>Business Studies</option>
				  <option value='Religious Studies'>Religious Studies</option>
				 
                </select>
              </div>
   
			<!---	     <p>  <input name='file' type='file' id='file' size='24'> 
  </p> --->
              </div>
            </div>
          </div>
        </li>
        
          <li>
		  

        </li>
      </ul>
	  	   
	      <div class='content-block'>";
		 		$strings = ",";
	
		$u = array('pink','teal', 'blue','#0c56ac');

		$well = $u[rand(0,4)];

    echo" <p class='buttons-row'>	<input type='submit' class='button button-fill ' name='submit' value='Publish' style='background-color:$well' ></p>";
	  
	   echo"
    </div>
    </form>";
	}
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