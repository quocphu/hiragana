{include file="header.tpl.php" body_class="index" root=".."}
{include file="menu.tpl.php"  css_class="alt reveal"  nav_class="alt reveal" param=""}
<div class="main">
		<div class="wrap">
			<div class="create-main">
				<div class="detail-nav">
					<ul>
						<li><a href="#" class="active">row by row</a></li>
						<li><a href="#">Learn</a></li>
						<li><a href="#">game</a></li>
						<li><a href="#">Edit</a></li>
						<li><a href="#">Delete</a></li>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="content over-scroll">
					<table id="data" class="create">
					</table>
						
					<input id="btnNext" type="button" value="Next"/>
					<input id="btnFinish" type="button" value="Finish"/>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			
		});
	</script>
{include file="footer.tpl.php"}
