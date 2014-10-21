<?php /* Smarty version Smarty-3.1.19, created on 2014-10-21 04:19:33
         compiled from "views/detail.php" */ ?>
<?php /*%%SmartyHeaderCode:1644160865543b8b6cde39a9-51599534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7c8d58e292b68e63ed3a746e18cee0382762e78' => 
    array (
      0 => 'views/detail.php',
      1 => 1413857414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1644160865543b8b6cde39a9-51599534',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543b8b6ce53db9_97347733',
  'variables' => 
  array (
    'pattern' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543b8b6ce53db9_97347733')) {function content_543b8b6ce53db9_97347733($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Trang chủ",'body_class'=>"index",'root'=>".."), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Trang chủ",'css_class'=>"alt reveal",'nav_class'=>"alt reveal",'param'=>''), 0);?>

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
							<li>show text 5</li>

						</ul>
					</div>
					<div class="input">
						<ul>
							<li><input type="text" value="input 1" /><span>Column title 1</span></li>
							<li ><input type="text" value="input 2" /><span>Column title 2</span></li>
							<li ><input type="text" value="input 3" /><span>Column title 3</span></li>
							<li ><input type="text" value="input 4" /><span>Column title 4</span></li>
							<li ><input type="text" value="input 5" /><span>Column title 4</span></li>
							<li ><input type="button" value="Prev" /><input type="button" value="Next" /></li>
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
							<ul class="show" id="showControl" other="inputControl" display=".detail-show">
								<li><a href="#" >show 1</a></li>
								<li><a href="#" class="selected">show 2</a></li>
								<li><a href="#" class="selected">show 3</a></li>
								<li><a href="#" class="selected">show 4</a></li>
								<li><a href="#" class="selected">show 5</a></li>
								
							</ul>
						</div>

						<div class="clear"></div>
						<div class="show">
							<span>Input show:</span>
							<ul id="inputControl" other="showControl" display =".input">
								<li ><a class="selected" href="#" >Input 1</a></li>
								<li><a href="#" >Input 2</a></li>
								<li><a href="#" >Input 3</a></li>
								<li><a href="#" >Input 4</a></li>
								<li><a href="#" >Input 5</a></li>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="../js/quiz.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var ptn = $.parseJSON('<?php echo $_smarty_tpl->tpl_vars['pattern']->value;?>
');
// 		console.log(ptn);
		var q = new Quiz(ptn)
		q.init();
		q.random('');
	});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
