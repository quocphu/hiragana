{extends file='templates/main.tpl.php'}
{block name=main}
<div class="main">
		<div class="wrap">
			<div class="create-main">
				{include file="sub_nav.tpl.php"}
				<div class="content">
					<form id="file_upload_form" action="../upload.php"  >
						<input type="file" id="upload_field" name="upload_field" />
						<input type="submit" value="Upload" /><span id="msg"></span>
					</form>
					<textarea id="file-data" ></textarea>
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
		createStep2();
		uploadFile();
		nextButton2();
		// Change sub menu
		changeSubNavNew(["Tao moi bang File"],[''], 1);
	});
</script>
{/block}