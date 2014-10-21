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
				<div class="content">
					<form id="file_upload_form" action="../upload.php"  >
						<input type="file" id="upload_field" name="upload_field" />
						<input type="submit" value="Upload" /><span id="msg"></span>
					</form>
					<textarea id="file-data" >
awake	awoke	awoken
be	was, were	been
beat	beat	beaten
become	became	become
begin	began	begun
bend	bent	bent
bet	bet	bet
bid	bid	bid
bite	bit	bitten
blow	blew	blown
break	broke	broken
bring	brought	brought
broadcast	broadcast	broadcast
build	built	built
buy	bought	bought
catch	caught	caught
choose	chose	chosen
come	came	come
cost	cost	cost
cut	cut	cut
dig	dug	dug
do	did	done</textarea>
<form name = "step2" action="" method="post">
	
	<div class="review">
		<table id="data" class="create">
		
		</table>
	</div>
	<label><input type="radio" name="serapator" value="comma"/> dau phay</label>
	<label><input type="radio" name="serapator" value="space"/> khoang trang</label>
	<label><input type="radio" name="serapator" value="tab"/> tab</label>
	<label><input type="radio" name="serapator" value="other"/>Khac <input type="text" name="otherSerapator"/> </label>
	<input name="columnSize" type="hidden" value="{$rowNum}"/>
	<input id="btnNext"  type="button" value="Next"/><br>
</form>					
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		review();
		uploadFile();
		nextButton2();
	});
</script>
{include file="footer.tpl.php"}
