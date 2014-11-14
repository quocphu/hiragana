<?php /* Smarty version Smarty-3.1.19, created on 2014-11-13 09:50:23
         compiled from "views/new4.php" */ ?>
<?php /*%%SmartyHeaderCode:993354903543f4b4d5e3d20-12047336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bca1f84e7dcb7646d88f12f23f460e05a8753a6' => 
    array (
      0 => 'views/new4.php',
      1 => 1415868612,
      2 => 'file',
    ),
    'bfb5bf6d529a1de2057e120d97a8626aa9ef7fad' => 
    array (
      0 => 'templates/main.tpl.php',
      1 => 1415340764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '993354903543f4b4d5e3d20-12047336',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543f4b4d653cc3_47244280',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543f4b4d653cc3_47244280')) {function content_543f4b4d653cc3_47244280($_smarty_tpl) {?><!DOCTYPE html>
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
			var ptn = $.parseJSON('<?php echo $_smarty_tpl->tpl_vars['data']->value;?>
');
// 			console.log(<?php echo $_smarty_tpl->tpl_vars['data']->value;?>
);
			var rows = ptn.data;
			var table = $('table[id="data"]');
			table.html('');
			createRow(table, ptn.header, -1, true, false);
			for (var i = 0; i < rows.length; i++) {
				createRow(table, rows[i], i, true, false);
			}

// 			$('#btnReNew').off('click').on('click', function(){
// 				location.href = '/detail/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
';
// 			});	

			$('#btnReNew').off('click').on('click', function(){
				location.href = '/new/1';
			});
			$('#btnDetail').off('click').on('click',function(){
				location.href = '/detail/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
';
			});	
		});
	</script>
	

		</div>
		
		<!-- footer -->
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('root'=>".."), 0);?>

	</div>
</body>
</html><?php }} ?>
