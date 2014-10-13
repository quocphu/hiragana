<?php /* Smarty version Smarty-3.1.19, created on 2014-10-13 11:19:20
         compiled from "views/new1.php" */ ?>
<?php /*%%SmartyHeaderCode:1586432887543b8d3903f8e7-83257802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fc97f323865ccd96f0b234e54ef1ab3d4f15ea1' => 
    array (
      0 => 'views/new1.php',
      1 => 1413191955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1586432887543b8d3903f8e7-83257802',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543b8d390b6a76_50157682',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543b8d390b6a76_50157682')) {function content_543b8d390b6a76_50157682($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('body_class'=>"index",'root'=>".."), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('css_class'=>"alt reveal",'nav_class'=>"alt reveal"), 0);?>

<div class="main">
		<div class="wrap">
			<div class="detail-main">
				<?php echo $_smarty_tpl->getSubTemplate ("sub_nav.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<div class="content">
					<form name="create">
						<table class="create">
							<tr>
								<td>Title</td>
								<td colspan="2"><input type="text" value="column 11" /></td>

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
								<td><input type="text" value="column 1" /></td>

							</tr>
							<tr>
								<td colspan="2">Column title 2</td>
								<td><input type="text" value="column 2" /></td>

							</tr>
							<tr>
								<td colspan="2">Column title 3</td>
								<td><input type="text" value="column 3" /></td>

							</tr>
							<tr>
								<td colspan="2">Column title 4</td>
								<td><input type="text" value="column 4" /></td>

							</tr>
							<tr>
								<td colspan="2">Column title 5</td>
								<td><input type="text" value="column 5" /></td>

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
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
