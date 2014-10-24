<?php 
	session_start();
	require_once("../config/config.properties");
	require_once("../autoload.php");
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\GraphUser;
	FacebookSession::setDefaultApplication(FBID, FBS);
	$redirect_url = ("http://localhost:8888/fb/callback.php");
	$helper = new FacebookRedirectLoginHelper($redirect_url);
?>
<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<div class="fb-login" ><a href="<?php echo $helper->getLoginUrl()?>">Login with FB</a> </div>
<div id="fb-root"></div>
<script type="text/javascript">

window.fbAsyncInit = function() {
    FB.init({
      appId      : '854438244566604',
      xfbml      : true,
      version    : 'v2.1'
    });

    FB.getLoginStatus(function(response) {
    	if (response.status === 'connected') {
    	    var uid = response.authResponse.userID;
    	    var accessToken = response.authResponse.accessToken;
    	    $('.fb-login-button').hide();
    	    console.log(uid);
    	   
    	    
    	    FB.api("/me/picture?width=30&height=30",  function(response) {
	    	        console.log(response.data.url);
	    	        var img = $('<img src="'+response.data.url+'">');
	    	        $('#avatar').append(img);
	    	}); 
	    	
    	  } else if (response.status === 'not_authorized') {
    	    // the user is logged in to Facebook, 
    	    // but has not authenticated your app
    	  } else {
    		  $('.fb-login-button').show();
    	  }
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
<script type="text/javascript">


</script>
<div id="avatar" ></div>
</body>
</html>