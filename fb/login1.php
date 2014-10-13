<?php
	session_start();
	require_once("../dao/config.properties");
	require_once("../autoload.php");
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\GraphUser;
	use Facebook\BaseFacebook;
	
	$redirect_url= 'http://localhost:8888/fb/callback.php';
	
	
	
	FacebookSession::setDefaultApplication(FBID, FBS);
	
	$session = new FacebookSession($_SESSION['token1']);
	
	try{
		$session->validate();
		$user_profile = (new FacebookRequest(
				$session, 'GET', '/me'
		))->execute()->getGraphObject(GraphUser::className());
		
		echo "Name: " . $user_profile->getName();
	} catch (Exception $ex){
		$helper = new FacebookRedirectLoginHelper($redirect_url, $appId = FBID, $appSecret = FBS);
		echo '<a href="' . $helper->getLoginUrl() . '">Login with Facebook</a>';
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '854438244566604',
          xfbml      : true,
          version    : 'v2.1'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
</script>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<div class="fb-like" data-href="http://localhost:8888"
		data-layout="standard" data-action="like" data-show-faces="true"
		data-share="true"></div>
	<div class="fb-comments" data-href="http://localhost:8888/fb/login.php"
		data-numposts="5" data-colorscheme="light"></div>
</body>
</html>

