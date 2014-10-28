{extends file='templates/main.tpl.php'}
{block name=main}
  <h1>Loi roi</h1>
  <input id="post" value="test" type="button"/>
  {literal}
  	<script>
  	$('#post').click(function(){

  	  	token = 'CAAMJG2gMxkwBAOnE7sxjfvIZCAoECegDEYvxcZCmrZCPtYrAKWAseVOt78FhzbLkawPPzEUnU1QrmqlQkh4lx8xvPTZAHg42ZB23B5q0GqlITWhYamKLRCZA4HYF2XCl6JrmbARcHZBxA58YxYrwQcabznyrdLuDQc1BZA8L1NmmNlHD7gYv7w8q5PBbAvYWU0iY1uLED9I1g7ZCl0q41SAjW';
  		$.ajax({
  			type: 'POST',
  			url: '/api/checkToken',
  			data: {'token': token}
  		}).done(function(data){
  			//
  		});
  	 });
  	
  	</script>
  {/literal}
{/block}