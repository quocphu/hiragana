{include file="header.tpl.php"  body_class="index" root=""}
{include file="menu.tpl.php"  css_class="alt reveal"  nav_class="alt reveal"  param=""}

<div class="main">
		<div class="wrap">
			<h1>Moi nhat</h1>
			<ul class="list-pattern">
				<li>
					<h3><a>Neque porro quisquam est qui dolorem ipsum
						quia dolor sit amet</a></h3>
					<div class="detail">
						<div class="avatar">
							<img src="images/avatar.jpg" />
						</div>
						<ul>
							<li>author</li>
							<li>2014 - 09 - 10</li>
							<li>260 items</li>
							<li>160 likes - 20 views</li>
						</ul>
						<div class="clear"></div>
					</div>
				</li>
				
			</ul>
			
		</div>
	</div>
	<script>
		
		$(document).ready(function() {
			var param = '{$param}';
			var url = '{$url}';

			searchNew(url, param);
		});
	</script>
{include file="footer.tpl.php" root=".."}
