{extends file='templates/main.tpl.php'}
{block name=main}
<div class="main">
		<div class="wrap">
			<div class="create-main">
				<div class="detail-nav">
					<ul>
						<li><a href="#" class="active">row by row</a></li>
<!-- 						<li><a href="#">Learn</a></li> -->
<!-- 						<li><a href="#">game</a></li> -->
<!-- 						<li><a href="#">Edit</a></li> -->
<!-- 						<li><a href="#">Delete</a></li> -->
					</ul>
				</div>
				<div class="clear"></div>
				<div class="content over-scroll">
				<form name="edit" action="">
					Tên: <input name="title" type="text" value="{$patternTitle}" /><br><br>
					<table id="data" class="create">
					</table>
					<input name="column_size" type="hidden" value="{$rowNum}"/>
					<input name="id" type="hidden" value="{$id}"/>
					<input name="update_date" type="hidden" value="{$updateTime}"/> <br>
					<input id="btnNext" type="button" value="Cập nhật"/>
					<input id="btnNewRow" type="button" value="Thêm dòng mới"/>
				</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		edit($.parseJSON('{$data}'));
		
		// Change sub menu
		changeSubNavNew(["Cập nhật"], ['#'], 1);
	});
</script>
{/block}
