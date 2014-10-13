{include file="header.tpl.php" body_class="index" root=".."}
{include file="menu.tpl.php"  css_class="alt reveal"  nav_class="alt reveal"}
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
								<td colspan="2"><select>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
								</select></td>

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
						<input id="btnNext" type="button" value="Next" />
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		createStep1();
		nextButton1();
	});
</script>
{include file="footer.tpl.php"}
