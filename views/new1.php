{extends file='templates/main.tpl.php'}
{block name=main}
<div class="main">
		<div class="wrap">
			<div class="detail-main">
				{include file="sub_nav.tpl.php"}
				<div class="content">
					<form name="create1">
						<table class="create">
							<tr>
								<td>Tên</td>
								<td colspan="2"><input name="title" type="text" value="" /></td>

							</tr>
							<tr>
								<td>Số cột</td>
								<td colspan="2">
									<select name="column_number">
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
									</select>
								</td>

							</tr>
							<tr>
								<td colspan="2">Cột 1</td>
								<td><input name="column1" type="text" value="" /></td>

							</tr>
							<tr>
								<td colspan="2">Cột 2</td>
								<td><input name="column2" type="text" value="" /></td>

							</tr>
							<tr>
								<td colspan="2">Cột 3</td>
								<td><input name="column3" type="text" value="" /></td>

							</tr>
							<tr>
								<td colspan="2">Cột 4</td>
								<td><input name="column4" type="text" value="" /></td>

							</tr>
							<tr>
								<td colspan="2">Cột 5</td>
								<td><input name="column5" type="text" value="" /></td>

							</tr>
						</table>
						<input id="btnNextHand" type="button" value="Nhập bằng tay" />
						<input id="btnNextFile" type="button" value="Nhập bằng file" />
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		createStep1();
		nextButton1();

		
		// Change sub menu
		changeSubNavNew(["Tạo mới"], [''], 1);
	});
</script>
{/block}
