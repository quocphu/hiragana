<?php /* Smarty version Smarty-3.1.19, created on 2014-10-13 10:48:25
         compiled from "views/new3.php" */ ?>
<?php /*%%SmartyHeaderCode:327979575543b912905ebb5-87103196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22f6dde2dd9474425ecd400ad88490e076d10d50' => 
    array (
      0 => 'views/new3.php',
      1 => 1413190103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327979575543b912905ebb5-87103196',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543b91290d1cc5_36401826',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543b91290d1cc5_36401826')) {function content_543b91290d1cc5_36401826($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('body_class'=>"index",'root'=>".."), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('css_class'=>"alt reveal",'nav_class'=>"alt reveal"), 0);?>

<div class="main">
		<div class="wrap">
			<div class="create-main">
				<div class="detail-nav">
					<ul>
						<li><a href="#" class="active">row by row</a></li>
						<li><a href="#">Learn</a></li>
						<li><a href="#">game</a></li>
						<li><a href="#">Edit</a></li>
						<li><a href="#">Delete</a></li>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="content">
				<table id="data" class="create">
				</table>
					
					<input type="button" value="Next"/>
				</div>
			</div>
		</div>
	</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
