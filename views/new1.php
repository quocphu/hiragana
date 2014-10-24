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
								<td>Title</td>
								<td colspan="2"><input name="title" type="text" value="column 11" /></td>

							</tr>
							<tr>
								<td>So cot</td>
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
								<td colspan="2">Column title 1</td>
								<td><input name="column1" type="text" value="column 1" /></td>

							</tr>
							<tr>
								<td colspan="2">Column title 2</td>
								<td><input name="column2" type="text" value="column 2" /></td>

							</tr>
							<tr>
								<td colspan="2">Column title 3</td>
								<td><input name="column3" type="text" value="column 3" /></td>

							</tr>
							<tr>
								<td colspan="2">Column title 4</td>
								<td><input name="column4" type="text" value="column 4" /></td>

							</tr>
							<tr>
								<td colspan="2">Column title 5</td>
								<td><input name="column5" type="text" value="column 5" /></td>

							</tr>
						</table>
						<input id="btnNextHand" type="button" value="Hand input" />
						<input id="btnNextFile" type="button" value="File input" />
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		createStep1();
		nextButton1();

		$('form[name="search"]').on('submit', function(e) {
			e.preventDefault();
			alert(1);
		});
	});
</script>
{/block}
