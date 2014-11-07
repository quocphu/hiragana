<!DOCTYPE html>
<html>
	{include file="header.tpl.php"  body_class="index" root=""}
<body>
	<div id="cloud-container">
		<!-- Menu -->
		{include file="menu.tpl.php"  css_class="alt reveal"  nav_class="alt reveal"  param=""}
		
		<!-- Content -->
		<div class="main">
			{block name=main}{/block}
		</div>
		
		<!-- footer -->
		{include file="footer.tpl.php" root=".."}
	</div>
</body>
</html>