<?php /* Smarty version Smarty-3.1.19, created on 2014-11-13 10:43:58
         compiled from "views/edit.php" */ ?>
<?php /*%%SmartyHeaderCode:1489488516544636540280e1-93709797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66b4952be091646509822bf31f40f3ca205755b2' => 
    array (
      0 => 'views/edit.php',
      1 => 1415871835,
      2 => 'file',
    ),
    'bfb5bf6d529a1de2057e120d97a8626aa9ef7fad' => 
    array (
      0 => 'templates/main.tpl.php',
      1 => 1415340764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1489488516544636540280e1-93709797',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5446365409b719_16276176',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5446365409b719_16276176')) {function content_5446365409b719_16276176($_smarty_tpl) {?><!DOCTYPE html>
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
					Tên: <input name="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['patternTitle']->value;?>
" /><br><br>
					<table id="data" class="create">
					</table>
					<input name="column_size" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['rowNum']->value;?>
"/>
					<input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
					<input name="update_date" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['updateTime']->value;?>
"/> <br>
					<input id="btnNext" type="button" value="Cập nhật"/>
					<input id="btnNewRow" type="button" value="Thêm dòng mới"/>
				</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		edit($.parseJSON('<?php echo $_smarty_tpl->tpl_vars['data']->value;?>
'));
		
		// Change sub menu
		changeSubNavNew(["Cập nhật"], ['#'], 1);
	});
</script>

		</div>
		
		<!-- footer -->
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('root'=>".."), 0);?>

	</div>
</body>
</html><?php }} ?>
