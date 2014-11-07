<?php /* Smarty version Smarty-3.1.19, created on 2014-11-07 05:35:00
         compiled from "./templates/footer.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:149382333354179619686d84-59662635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '068a76b4f490c64a7ef40f94584ad45b5b785c2d' => 
    array (
      0 => './templates/footer.tpl.php',
      1 => 1415334859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149382333354179619686d84-59662635',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54179619688c77_66608008',
  'variables' => 
  array (
    'loginUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54179619688c77_66608008')) {function content_54179619688c77_66608008($_smarty_tpl) {?>		<div id="footer">
	
			<ul class="nav">
				<li><a href="/">Trang chủ</a></li>
				<li><a href="/info">Thông tin</a></li>
				<li><a href="/contact">Liên hệ</a></li>
			</ul>
		<div class="clear"></div>
			<ul class="copyright">
				<li>Copyright &copy; 2014</li>
			</ul>
	
		</div>
	<input  id="loginUrl" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['loginUrl']->value;?>
"/>
		
		<script type="text/javascript" src="../js/fb.js"></script>
		<script>
			login();
		</script>
		
<?php }} ?>
