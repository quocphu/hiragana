<?php /* Smarty version Smarty-3.1.19, created on 2014-10-30 09:49:22
         compiled from "./templates/menu.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:17248648835417961967d993-42321363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bacc0f9eb48f8fb33335096c0961975a40e2e8db' => 
    array (
      0 => './templates/menu.tpl.php',
      1 => 1414658958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17248648835417961967d993-42321363',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_541796196836f0_50646246',
  'variables' => 
  array (
    'logo' => 0,
    'param' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541796196836f0_50646246')) {function content_541796196836f0_50646246($_smarty_tpl) {?>	<div class="header">
		<div class="wrap">
			<div class="logo"><a href='/'><?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
</a></div>
			<div class="search">
				<form name="search" method="get" action="/search">
					<input id="title" name="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
" /> <input type="submit" value="search" />
				</form>
			</div>

			<div class="menu">
				<ul>
					<li id="main-avatar"></li>
<!-- 					<li><a href="#">Dng nhap bang face nook doc ko</a></li> -->
<!-- 					<li><a href="#">My favour</a></li> -->

					<li id="btnLogin"><a href="#"></a></li>
				</ul>
			</div>
			<div id="pull">Menu</div>
			<div class="clear"></div>
		</div>
	</div>
<?php }} ?>
