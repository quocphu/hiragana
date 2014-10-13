<?php /* Smarty version Smarty-3.1.19, created on 2014-10-13 09:49:19
         compiled from "./templates/detail_content.php" */ ?>
<?php /*%%SmartyHeaderCode:1095986692543b7f995a7ee3-89542161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44457fd401bc8490df623486261729e350862e46' => 
    array (
      0 => './templates/detail_content.php',
      1 => 1413186555,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1095986692543b7f995a7ee3-89542161',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543b7f9961f314_69743632',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543b7f9961f314_69743632')) {function content_543b7f9961f314_69743632($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Trang chủ",'body_class'=>"index",'root'=>".."), 0);?>

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
