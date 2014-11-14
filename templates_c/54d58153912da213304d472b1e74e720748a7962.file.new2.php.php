<?php /* Smarty version Smarty-3.1.19, created on 2014-11-07 10:23:52
         compiled from "views/new2.php" */ ?>
<?php /*%%SmartyHeaderCode:604867661543b902e49a284-59619713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54d58153912da213304d472b1e74e720748a7962' => 
    array (
      0 => 'views/new2.php',
      1 => 1415266372,
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
  'nocache_hash' => '604867661543b902e49a284-59619713',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543b902e5081d1_50773697',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543b902e5081d1_50773697')) {function content_543b902e5081d1_50773697($_smarty_tpl) {?><!DOCTYPE html>
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
			<div class="create-main">
				<?php /*  Call merged included template "sub_nav.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("sub_nav.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '604867661543b902e49a284-59619713');
content_545c8fa89261c6_98806358($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "sub_nav.tpl.php" */?>
				<div class="content">
					<form id="file_upload_form" action="../upload.php">
						<input type="file" id="upload_field" name="upload_field" />
						<input type="submit" value="Upload" /><span id="msg"></span>
					</form>
					<textarea id="file-data" ></textarea>
<form name = "step2" action="" method="post">
	
	<div class="review">
		<table id="data" class="create">
		
		</table>
	</div>
	<label><input type="radio" name="serapator" value="comma"/> Dấu phẩy</label>
	<label><input type="radio" name="serapator" value="space"/> Khoảng trắng</label>
	<label><input type="radio" name="serapator" value="tab"/> Dấu tab</label>
	<label><input type="radio" name="serapator" value="other"/>Kí tự khác: <input type="text" name="otherSerapator"/> </label>
	<input name="columnSize" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['rowNum']->value;?>
"/>
	<input id="btnNext"  type="button" value="Tiếp tục"/><br>
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
		changeSubNavNew(["Tạo mới - nhập bằng file"],[''], 1);
	});
</script>

		</div>
		
		<!-- footer -->
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('root'=>".."), 0);?>

	</div>
</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2014-11-07 10:23:52
         compiled from "./templates/sub_nav.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_545c8fa89261c6_98806358')) {function content_545c8fa89261c6_98806358($_smarty_tpl) {?><div class="detail-nav">
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
