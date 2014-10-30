<?php /* Smarty version Smarty-3.1.19, created on 2014-10-30 08:42:34
         compiled from "views/index.php" */ ?>
<?php /*%%SmartyHeaderCode:2101918680543b8a5ac07149-40450912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6a0a497fd48d3f9722e89f19928e2d02f6723b3' => 
    array (
      0 => 'views/index.php',
      1 => 1414654953,
      2 => 'file',
    ),
    'bfb5bf6d529a1de2057e120d97a8626aa9ef7fad' => 
    array (
      0 => 'templates/main.tpl.php',
      1 => 1414574948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2101918680543b8a5ac07149-40450912',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543b8a5ac777f0_91262003',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543b8a5ac777f0_91262003')) {function content_543b8a5ac777f0_91262003($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('body_class'=>"index",'root'=>''), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('css_class'=>"alt reveal",'nav_class'=>"alt reveal",'param'=>''), 0);?>

<div class="frame">

  
<div class="main">
		<div class="wrap">
			<h1>Mới nhất</h1>
			<ul class="list-pattern">
				<li class="border">
					<h3><a>Neque porro quisquam est qui dolorem ipsum
						quia dolor sit amet</a></h3>
					<div class="detail">
						<div class="avatar">
							<img src="images/avatar.jpg" />
						</div>
						<ul>
							<li>author</li>
							<li>2014 - 09 - 10</li>
							<li>260 items</li>
							<li>160 likes - 20 views</li>
						</ul>
						<div class="clear"></div>
					</div>
				</li>
				
			</ul>
			
		</div>
	</div>
	<script>
		
		$(document).ready(function() {
			var param = '<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
';
			var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
			searchNew(url, param);

// 			$(".list-pattern").delegate( "li", "click", function() {
// 				location.href = $(this).find('a').attr('href');
// 			});
		});
	</script>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('root'=>".."), 0);?>

<?php }} ?>
