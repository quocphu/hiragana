<?php /* Smarty version Smarty-3.1.19, created on 2014-10-24 06:40:09
         compiled from "views/search.php" */ ?>
<?php /*%%SmartyHeaderCode:1574358447543f83d858a1b7-93042694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01ed9975ec9da14017925111adf46608f73ce480' => 
    array (
      0 => 'views/search.php',
      1 => 1414125605,
      2 => 'file',
    ),
    'bfb5bf6d529a1de2057e120d97a8626aa9ef7fad' => 
    array (
      0 => 'templates/main.tpl.php',
      1 => 1414125299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1574358447543f83d858a1b7-93042694',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543f83d85f77b3_85148602',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543f83d85f77b3_85148602')) {function content_543f83d85f77b3_85148602($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('body_class'=>"index",'root'=>''), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('css_class'=>"alt reveal",'nav_class'=>"alt reveal",'param'=>''), 0);?>



<div class="main">
		<div class="wrap">
			<h1>Moi nhat</h1>
			<ul class="list-pattern">
				<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['searchResult']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
			    <li id="<?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
">
					<h3><a href="/detail/<?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->title;?>
</a></h3>
					<div class="detail">
						<div class="avatar">
							<img src="images/avatar.jpg" />
						</div>
						<ul>
							<li><?php echo $_smarty_tpl->tpl_vars['p']->value->authorName;?>
</li>
							<li><?php echo $_smarty_tpl->tpl_vars['p']->value->createDate;?>
</li>
							<li><?php echo sprintf("%d",$_smarty_tpl->tpl_vars['p']->value->itemCount);?>
</li>
							<li><?php echo sprintf("%d",$_smarty_tpl->tpl_vars['p']->value->views);?>
 views</li>
						</ul>
						<div class="clear"></div>
					</div>
				</li>
			<?php } ?>
			</ul>
			<?php if ($_smarty_tpl->tpl_vars['nextPage']->value!=-1) {?>
			<a id="nextPage" href="#" param="<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
" page="<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
">More...</a>
			<?php }?>
		</div>
	</div>
	
	<script>
		$('#nextPage').off('click').on('click', function(e){
			e.preventDefault();
			search({'title':$(this).attr('param'), 'page':$(this).attr('page')});
		});
	
	</script>
	


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('root'=>".."), 0);?>

<?php }} ?>
