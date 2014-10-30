<?php /* Smarty version Smarty-3.1.19, created on 2014-10-30 10:11:17
         compiled from "views/error.php" */ ?>
<?php /*%%SmartyHeaderCode:1094272875544e0156eddc08-42057319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b01ab64109da4973ee40bd51647a86b02feec3b' => 
    array (
      0 => 'views/error.php',
      1 => 1414660274,
      2 => 'file',
    ),
    'bfb5bf6d529a1de2057e120d97a8626aa9ef7fad' => 
    array (
      0 => 'templates/main.tpl.php',
      1 => 1414574948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1094272875544e0156eddc08-42057319',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_544e01570b1a03_67612188',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544e01570b1a03_67612188')) {function content_544e01570b1a03_67612188($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('body_class'=>"index",'root'=>''), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('css_class'=>"alt reveal",'nav_class'=>"alt reveal",'param'=>''), 0);?>

<div class="frame">

  
  <?php  $_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['error']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->key => $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
?>
  	<h1><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h1>
  <?php } ?>
  
  	<script>
  	$('#post').click(function(){

  	  	token = 'CAAMJG2gMxkwBAOnE7sxjfvIZCAoECegDEYvxcZCmrZCPtYrAKWAseVOt78FhzbLkawPPzEUnU1QrmqlQkh4lx8xvPTZAHg42ZB23B5q0GqlITWhYamKLRCZA4HYF2XCl6JrmbARcHZBxA58YxYrwQcabznyrdLuDQc1BZA8L1NmmNlHD7gYv7w8q5PBbAvYWU0iY1uLED9I1g7ZCl0q41SAjW';
  		$.ajax({
  			type: 'POST',
  			url: '/api/checkToken',
  			data: {'token': token}
  		}).done(function(data){
  			//
  		});
  	 });
  	
  	</script>
  

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('root'=>".."), 0);?>

<?php }} ?>
