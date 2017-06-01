
<!doctype html>
<html>

<head>
<title>
Like the Liker | Facebook
</title>

<link rel='stylesheet' type='text/css' href='css/style.css' />
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 



</head>

<body >
	
        <h2 style='color:blue;text-align:center;'>Welcome to LikeTheLiker</h2>
        <br />
   	
  
        <img src='images/like.png'/> 
        <br />
        <!--<input type='submit' value=submit />-->
     	<?php
     		if (!session_id()) {
    			session_start();
			}
			ini_set('display_errors', 1);
			error_reporting(~0);
			
			// Include the autoloader provided in the SDK
			require_once __DIR__ . '/vendor/facebook/graph-sdk/src/Facebook/autoload.php'; 


			$fb = new Facebook\Facebook([
  				'app_id' => '', //app-id of the application
  				'app_secret' => '',
  				'default_graph_version' => 'v2.9',
  			]);
			
		
			$helper = $fb->getRedirectLoginHelper();

			$permissions = ['email', 'publish_actions']; // Optional permissions


			$loginUrl = $helper->getLoginUrl('http://localhost/callback.php', $permissions);
			echo  $loginUrl;
			echo '<a href="' . htmlspecialchars($loginUrl) . '" class="w3-button w3-red btn" >Click here to Begin</a>';
		//$url = 'https://www.facebook.com/v2.9/dialog/oauth?client_id=1877971229140094&scope=public_profile,email,publish_actions&response_type=code&redirect_uri=http://localhost/FBApp/callback.php&state=STATE_TOKEN';
		//echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
		?>
		

        <!--<input type='submit' value=submit />-->
    
</body>

</html>


