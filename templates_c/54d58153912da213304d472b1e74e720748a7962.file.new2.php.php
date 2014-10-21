<?php /* Smarty version Smarty-3.1.19, created on 2014-10-21 08:56:18
         compiled from "views/new2.php" */ ?>
<?php /*%%SmartyHeaderCode:604867661543b902e49a284-59619713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54d58153912da213304d472b1e74e720748a7962' => 
    array (
      0 => 'views/new2.php',
      1 => 1413874573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '604867661543b902e49a284-59619713',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543b902e5081d1_50773697',
  'variables' => 
  array (
    'rowNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543b902e5081d1_50773697')) {function content_543b902e5081d1_50773697($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('body_class'=>"index",'root'=>".."), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('css_class'=>"alt reveal",'nav_class'=>"alt reveal",'param'=>''), 0);?>

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
					<form id="file_upload_form" action="../upload.php"  >
						<input type="file" id="upload_field" name="upload_field" />
						<input type="submit" value="Upload" /><span id="msg"></span>
					</form>
					<textarea id="file-data" >
awake	awoke	awoken
be	was, were	been
beat	beat	beaten
become	became	become
begin	began	begun
bend	bent	bent
bet	bet	bet
bid	bid	bid
bite	bit	bitten
blow	blew	blown
break	broke	broken
bring	brought	brought
broadcast	broadcast	broadcast
build	built	built
buy	bought	bought
catch	caught	caught
choose	chose	chosen
come	came	come
cost	cost	cost
cut	cut	cut
dig	dug	dug
do	did	done</textarea>
<form name = "step2" action="" method="post">
	
	<div class="review">
		<table id="data" class="create">
		
		</table>
	</div>
	<label><input type="radio" name="serapator" value="comma"/> dau phay</label>
	<label><input type="radio" name="serapator" value="space"/> khoang trang</label>
	<label><input type="radio" name="serapator" value="tab"/> tab</label>
	<label><input type="radio" name="serapator" value="other"/>Khac <input type="text" name="otherSerapator"/> </label>
	<input name="columnSize" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['rowNum']->value;?>
"/>
	<input id="btnNext"  type="button" value="Next"/><br>
</form>					
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		review();
		uploadFile();
		nextButton2();
	});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
