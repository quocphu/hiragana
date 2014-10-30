{extends file='templates/main.tpl.php'}
{block name=main}
<div class="main">
		<div class="wrap">
			<div class="create-main">
				{include file="sub_nav.tpl.php"}
				<div class="content over-scroll">
				<form name="step2" action="">
					<table id="data" class="create">
					</table>
					<input name="columnSize" type="hidden" value="{$rowNum}"/>
					<input id="btnNext" type="button" value="Next"/>
					<input id="btnNewRow" type="button" value="New row"/>
				</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		createStep3($.parseJSON('{$data}'));
		// add new row event
		$('#btnNewRow').on('click', function(){
			addNewRow($('#data'));
		});
		$('#btnNext').on('click', function(){
			var form = $('form[name="step2"]');
			$.ajax({
				type: 'POST',
				url: '/api/pattern/checkStep2',
				data: form.serialize()
			}).done(function(data){
				rs = $.parseJSON(data);
				if(rs.valid == 0){
					alert("error");
				} else if(rs.valid == 1) {
					window.location.href = '/new/4';
				}
			});
		});

		// Change sub menu
		changeSubNavNew(["Tao moi bang tay"],[''], 1);
	});
</script>
{/block}
