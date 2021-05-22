
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>IntelliFeed</title>
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
 <div class="navbar" style="background-color:#0c56ac">
    <div class="navbar-inner">
  
    
      <div class="left"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
	    <div class="center">IntelliFeed</div>
    </div>
  </div>
			
		
          
		<?php
	echo"			<div class='page-content'>
	   
							   <div class='content-block'>
							   
      ";

session_start();
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY', '6zO3SHmUDEtMw51AwAts5HzMD'); 	// add your app consumer key between single quotes
define('CONSUMER_SECRET', '0hQoMcccXThNFbmDcBy3HF20fxUiNRhczdbPnn6EjHfadYCUne'); // add your app consumer 																			secret key between single quotes
define('OAUTH_CALLBACK', 'http://IntelliFeed.ga/callback.php'); // your app callback URL i.e. page 																			you want to load after successful 																			  getting the data
//define('oauth_token', '842987337353052160-LL8z2AHxYRP7lHo8iDaq8cLNzeSu8OP');
//define('oauth_token_secret', '6eZZno5qC6d8E5Gtc9jakmhEgvP07F3MfxOBwJ5ysLm8x');
if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	//echo $url;
	echo "<a href='$url' class='button button-fill  link external' >Twitter sign in</a>";
	

} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$user = $connection->get("account/verify_credentials", ['include_email' => 'true']);
//    $user1 = $connection->get("https://api.twitter.com/1.1/account/verify_credentials.json", ['include_email' => true]);
    echo "<img src='$user->profile_image_url'>";echo "<br>";		//profile image twitter link
    echo $user->name;echo "<br>";									//Full Name
    echo $user->location;echo "<br>";								//location
    echo $user->screen_name;echo "<br>";							//username
    echo $user->created_at;echo "<br>";
//    echo $user->profile_image_url;echo "<br>";
    echo $user->email;echo "<br>";									//Email, note you need to check permission on Twitter App Dashboard and it will take max 24 hours to use email 
    echo "<pre>";
    print_r($user);
    echo "<pre>";								//These are the sets of data you will be getting from Twitter 				

		  if($user ){

	  include 'connect.php';

  
       $email = strtolower($_POST['email']);
	   $image = strtolower($user->profile_image_url);
	   				  $timestamp = time();
   $client= getenv('HTTP_USER_AGENT');  //will output what web browser is currently viewing the page
//	$REMOTE_ADDR 
	   $ip = $_SERVER['REMOTE_ADDR'];
	   //Twitter user info to store at working database
	   $tv= $_SESSION['oauth_token'];
	   $Sec= $_SESSION['oauth_token_secret'];
		$queryaw = "SELECT id,password,img,oauth_token
                          FROM users 
                            WHERE oauth_token='$tv'
                            ";
							$query=mysqli_query($conn, $queryaw) ;
      mysqli_close($conn);
      if(!(mysqli_num_rows($query)>=1)){        
          $password = md5($_POST['password']);
          include 'connect.php';
        $user="INSERT INTO users(oauth_token,oauth_token_secret) 
                       VALUES ('$tv','$sec')
                      ";
mysqli_query($conn, $user);
    mysqli_close($conn);

			header("location: home.php?twitter=connected");
				exit;
   
      }
      else{
	 

        header("location: home.php?twitter=connected");
        exit;
      }

  }
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
