<!doctype html>
<html>
<head>
<title> 
 	
</title>
</head>

<body>
<?php

	if(!session_id()) {
    	session_start();
	}
 	ini_set('display_errors', 1);
	error_reporting(~0);
	require_once __DIR__ . '/vendor/facebook/graph-sdk/src/Facebook/autoload.php';


	$fb = new Facebook\Facebook([
  		'app_id' => '', //app-id of the application
  		'app_secret' => '',
  		'default_graph_version' => 'v2.9',
  		]);



	$linkData = [
  		'link' => 'http://blog.caesarcypher.info',
  		'message' => 'Hi, We have Liked Your Profile from blog.caesarcypher.info',
  	];

    $helper = $fb->getRedirectLoginHelper();  
	try {
  	// Returns a `Facebook\FacebookResponse` object
      $accessToken = $helper->getAccessToken(); 
  		$response = $fb->post('/me/feed', $linkData, $accessToken);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
  		echo 'Graph returned an error: ' . $e->getMessage();
  		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
  		echo 'Facebook SDK returned an error: ' . $e->getMessage();
  		exit;
	}

	$graphNode = $response->getGraphNode();

	echo 'Posted with id: ' . $graphNode['id'];

	?>
</body>

</html
