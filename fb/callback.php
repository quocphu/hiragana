<?php
//     session_start();
//     require_once("../dao/config.properties");
//     $app_id = FBID;
//     $app_secret = FBS;
		$redirect_url = ("http://localhost:8888/fb/callback.php");
    
//     // Get code value
//     $code = $_GET['code'];
    
//     $token_url = "https://graph.facebook.com/oauth/access_token?"
//     		. "client_id=" . $app_id . "&redirect_uri=" . $redirect_url
//     		. "&client_secret=" . $app_secret . "&code=" . $code;
    
//    $response = file_get_contents($token_url);
//     $params = null;
//     parse_str($response, $params); //parse name value pair
//     $graph_url = "https://graph.facebook.com/me?access_token=". $params['access_token'];
//     $user = json_decode(file_get_contents($graph_url));
    
//    print_r ($user);

	session_start();
	require_once("../dao/config.properties");
	require_once("../autoload.php");
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\GraphUser;
	FacebookSession::setDefaultApplication(FBID, FBS);
	
	$helper = new FacebookRedirectLoginHelper($redirect_url);
	$session = null;
	try {
		$session = $helper->getSessionFromRedirect();
	} catch(\Exception $ex) {
		// When validation fails or other local issues
		print_r($ex);
	}
	
	if ($session) {
		// Logged in.

		$_SESSION['token'] =$session->getToken();
				
	    $user_profile = (new FacebookRequest(
	      $session, 'GET', '/me'
	    ))->execute()->getGraphObject(GraphUser::className());
	
	    echo "Name: " . $user_profile->getName();
	    print_r($user_profile);
	}
	header("Location: http://localhost:8888/fb/login.php");
	die();
    
    ?>