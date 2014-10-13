{include file="header.tpl.php" body_class="index" root=".."}
{include file="menu.tpl.php"  css_class="alt reveal"  nav_class="alt reveal"}
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
				<div class="content">
					<textarea id="data" >
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05</textarea>
					<div class="review">
						<table id="data" class="create">
						
						</table>
					</div>
					<label><input type="radio" name="serapator" value="comma"/> dau phay</label>
					<label><input type="radio" name="serapator" value="space"/> khoang trang</label>
					<label><input type="radio" name="serapator" value="tab"/> tab</label>
					<label><input type="radio" name="serapator" value="other"/>Khac <input type="text" name="otherSerapator"/> </label>
					<input id="btnNext"  type="button" value="Next"/>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		review();
	});
</script>
{include file="footer.tpl.php"}
