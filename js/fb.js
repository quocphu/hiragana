(function(d, s, id) {
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk')
);

function login(url) {
		  window.fbAsyncInit = function() {
		      FB.init({
		        appId      : gbAppId,
		        status     : true,                                 // Check Facebook Login status
		        xfbml      : true,                                  // Look for social plugins on the page
		        cookie     : true,
		        version    : 'v2.1'
		      });
		      
		  	$('#btnLogin a').off('click').on('click', function(e){
		  		e.preventDefault();
		  		setSession('PREV_URL', location.href);
		  		location.href = $(this).attr('href');
      	 	});
		      FB.getLoginStatus(function(response) {
		    	  $('#main-avatar>img').remove();
		    	  var accessToken = '';
		    	  if (response.status === 'connected') {
		    		  var uid = response.authResponse.userID;
		    		  accessToken = response.authResponse.accessToken;

		    		  FB.api("/me/picture?width=30&height=30",  function(response) {
		  	    	      var img = $('<img src="'+response.data.url+'">');
		  	    	      
		  	    	      $('#main-avatar').append(img);
		  	    		});
		  	    	 
		    		  	$('#btnLogin a').html('Đăng xuất');
		    		  	$('#btnLogin a').off('click').on('click', function(e){
			      	 		e.preventDefault();
			      	 		FB.logout(function(response) {
			      	 			checkToken('');
			      	 			location.reload(true);
			      	 		});
		    		  	});
		      	  } else {
		      		  	$('#btnLogin a').html('Đăng nhập bằng Facebook');
		      		  	$('#btnLogin a').attr('href', $('#loginUrl').val());
		      	  }
		    	  checkToken(accessToken);
		  	});
		  };
		  function checkToken(token) {
			  $.ajax({
	  	  			type: 'POST',
	  	  			url: '/api/checkToken',
	  	  			data: {'token': token}
	  	  		}).done(function(data){
//	  	  			console.log(data);
	  	  		});
		  }
}
