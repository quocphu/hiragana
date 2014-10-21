{include file="header.tpl.php"  body_class="index" root=""}
{include file="menu.tpl.php"  css_class="alt reveal"  nav_class="alt reveal" param=""}

<div class="main">
		<div class="wrap">
			<h1>Moi nhat</h1>
			<ul class="list-pattern">
				{foreach $searchResult as $p}
			    <li>
					<h3><a href="/detail/{$p->id}">{$p->title}</a></h3>
					<div class="detail">
						<div class="avatar">
							<img src="images/avatar.jpg" />
						</div>
						<ul>
							<li>{$p->authorName}</li>
							<li>{$p->createDate}</li>
							<li>{$p->itemCount}</li>
							<li>{$p->views} views</li>
						</ul>
						<div class="clear"></div>
					</div>
				</li>
			{/foreach}
			</ul>
			
		</div>
	</div>
	<script>
		
	
	</script>
{include file="footer.tpl.php"}
