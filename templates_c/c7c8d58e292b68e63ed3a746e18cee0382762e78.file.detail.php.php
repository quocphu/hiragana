<?php /* Smarty version Smarty-3.1.19, created on 2014-10-13 10:21:00
         compiled from "views/detail.php" */ ?>
<?php /*%%SmartyHeaderCode:1644160865543b8b6cde39a9-51599534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7c8d58e292b68e63ed3a746e18cee0382762e78' => 
    array (
      0 => 'views/detail.php',
      1 => 1413186555,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1644160865543b8b6cde39a9-51599534',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543b8b6ce53db9_97347733',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543b8b6ce53db9_97347733')) {function content_543b8b6ce53db9_97347733($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Trang chủ",'body_class'=>"index",'root'=>".."), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Trang chủ",'css_class'=>"alt reveal",'nav_class'=>"alt reveal"), 0);?>

<div class="main">
		<div class="wrap">
			<div class="detail-main">
				<?php echo $_smarty_tpl->getSubTemplate ("sub_nav.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<div class="content">
					<div class="detail-show">
						<ul>
							<li>show text 1</li>
							<li>show text 2</li>
							<li>show text 3</li>
							<li>show text 4</li>

						</ul>
					</div>
					<div class="input">
						<ul>
							<li><input type="text" value="input 1" /><span>Column title 1</span></li>
							<li><input type="text" value="input 2" /><span>Column title 2</span></li>
							<li><input type="text" value="input 3" /><span>Column title 3</span></li>
							<li><input type="text" value="input 4" /><span>Column title 4</span></li>
							<li><input type="button" value="Prev" /><input
								type="button" value="Next" /></li>
						</ul>
					</div>
					<div class="setting">
						<div>
							<span>Items show:</span> <input type="text" value="1,2,3,5-9" />
							<input type="button" value="apply" /> <span>Explain for
								this regex</span> <br>
						</div>
						<div class="show">
							<span>Column show:</span>
							<ul class="show">
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
							</ul>
						</div>

						<div class="clear"></div>
						<div class="show">
							<span>Input show:</span>
							<ul>
								<li class="selected">Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
