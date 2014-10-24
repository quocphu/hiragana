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
				<form name="edit" action="">
					Title: <input name="title" type="text" value="{$patternTitle}" />
					<table id="data" class="create">
					</table>
					<input name="column_size" type="hidden" value="{$rowNum}"/>
					<input name="id" type="hidden" value="{$id}"/>
					<input name="update_date" type="hidden" value="{$updateTime}"/>
					<input id="btnNext" type="button" value="Next"/>
					<input id="btnNewRow" type="button" value="New row"/>
				</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		edit($.parseJSON('{$data}'));
		
	});
</script>
{include file="footer.tpl.php"}
