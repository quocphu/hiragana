{extends file='templates/main.tpl.php'}
{block name=main}
<div class="main">
		<div class="wrap">
			<div class="create-main">
				<div class="detail-nav">
					<ul>
<!-- 						<li><a href="#" class="active">row by row</a></li> -->
<!-- 						<li><a href="#">Learn</a></li> -->
<!-- 						<li><a href="#">game</a></li> -->
<!-- 						<li><a href="#">Edit</a></li> -->
						<li>Tạo mới thành công</li>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="content">
					<div class="all CSSTableGenerator">
						<table id="data" class="create">
						</table>
					</div>
						
					<input id="btnReNew" type="button" value="Tạo mới"/>
					<input id="btnDetail" type="button" value="Xem chi tiết"/>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" value="" id="hiddenData"/>

	<script type="text/javascript">
		$(document).ready(function() {
			var ptn = $.parseJSON('{$data}');
			var rows = ptn.data;
			var table = $('table[id="data"]');
			table.html('');
			createRow(table, ptn.header, -1, true, false);
			for (var i = 0; i < rows.length; i++) {
				createRow(table, rows[i], i, true, false);
			}

			$('#btnReNew').off('click').on('click', function(){
				location.href = '/new/1';
			});
			
			$('#btnDetail').off('click').on('click',function(){
				location.href = '/detail/{$id}';
			});	
		});
	</script>
	
{/block}
