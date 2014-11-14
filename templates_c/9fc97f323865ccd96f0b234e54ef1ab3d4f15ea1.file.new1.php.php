<?php /* Smarty version Smarty-3.1.19, created on 2014-11-07 10:23:12
         compiled from "views/new1.php" */ ?>
<?php /*%%SmartyHeaderCode:1586432887543b8d3903f8e7-83257802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fc97f323865ccd96f0b234e54ef1ab3d4f15ea1' => 
    array (
      0 => 'views/new1.php',
      1 => 1415266121,
      2 => 'file',
    ),
    'bfb5bf6d529a1de2057e120d97a8626aa9ef7fad' => 
    array (
      0 => 'templates/main.tpl.php',
      1 => 1415340764,
      2 => 'file',
    ),
    'e2d031adfce007f3e30b419472f88e1be179c8aa' => 
    array (
      0 => './templates/sub_nav.tpl.php',
      1 => 1414553767,
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
<?php if ($_valid && !is_callable('content_543b8d390b6a76_50157682')) {function content_543b8d390b6a76_50157682($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('body_class'=>"index",'root'=>''), 0);?>

<body>
	<div id="cloud-container">
		<!-- Menu -->
		<?php echo $_smarty_tpl->getSubTemplate ("menu.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('css_class'=>"alt reveal",'nav_class'=>"alt reveal",'param'=>''), 0);?>

		
		<!-- Content -->
		<div class="main">
			
<div class="main">
		<div class="wrap">
			<div class="detail-main">
				<?php /*  Call merged included template "sub_nav.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("sub_nav.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1586432887543b8d3903f8e7-83257802');
content_545c8f80d87bf4_26386763($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "sub_nav.tpl.php" */?>
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

		</div>
		
		<!-- footer -->
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('root'=>".."), 0);?>

	</div>
</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2014-11-07 10:23:12
         compiled from "./templates/sub_nav.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_545c8f80d87bf4_26386763')) {function content_545c8f80d87bf4_26386763($_smarty_tpl) {?><div class="detail-nav">
	<ul>
		<li><a href="#" class="active">Flash card</a></li>
		<li><a href="#">Learn</a></li>
		<li><a href="#">game</a></li>
		<li><a href="#">Edit</a></li>
		<li><a href="#">Delete</a></li>
	</ul>
</div>
<div class="clear"></div>
<script>
	subNavActive();
</script><?php }} ?>
