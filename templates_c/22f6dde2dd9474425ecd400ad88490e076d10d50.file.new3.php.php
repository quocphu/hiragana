<?php /* Smarty version Smarty-3.1.19, created on 2014-10-29 11:20:45
         compiled from "views/new3.php" */ ?>
<?php /*%%SmartyHeaderCode:327979575543b912905ebb5-87103196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22f6dde2dd9474425ecd400ad88490e076d10d50' => 
    array (
      0 => 'views/new3.php',
      1 => 1414565738,
      2 => 'file',
    ),
    'bfb5bf6d529a1de2057e120d97a8626aa9ef7fad' => 
    array (
      0 => 'templates/main.tpl.php',
      1 => 1414574948,
      2 => 'file',
    ),
    'e2d031adfce007f3e30b419472f88e1be179c8aa' => 
    array (
      0 => './templates/sub_nav.tpl.php',
      1 => 1414553767,
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
<?php if ($_valid && !is_callable('content_543b91290d1cc5_36401826')) {function content_543b91290d1cc5_36401826($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('body_class'=>"index",'root'=>''), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('css_class'=>"alt reveal",'nav_class'=>"alt reveal",'param'=>''), 0);?>

<div class="frame">

<div class="main">
		<div class="wrap">
			<div class="create-main">
				<?php /*  Call merged included template "sub_nav.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("sub_nav.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '327979575543b912905ebb5-87103196');
content_5450bf7d9e15b2_92848527($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "sub_nav.tpl.php" */?>
				<div class="content over-scroll">
				<form name="step2" action="">
					<table id="data" class="create">
					</table>
					<input name="columnSize" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['rowNum']->value;?>
"/>
					<input id="btnNext" type="button" value="Next"/>
					<input id="btnNewRow" type="button" value="New row"/>
				</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		createStep3($.parseJSON('<?php echo $_smarty_tpl->tpl_vars['data']->value;?>
'));
		// add new row event
		$('#btnNewRow').on('click', function(){
			addNewRow($('#data'));
		});
		$('#btnNext').on('click', function(){
			var form = $('form[name="step2"]');
			$.ajax({
				type: 'POST',
				url: '/api/pattern/checkStep2',
				data: form.serialize()
			}).done(function(data){
				rs = $.parseJSON(data);
				if(rs.valid == 0){
					alert("error");
				} else if(rs.valid == 1) {
					window.location.href = '/new/4';
				}
			});
		});

		// Change sub menu
		changeSubNavNew(["Tao moi bang tay"],[''], 1);
	});
</script>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('root'=>".."), 0);?>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2014-10-29 11:20:45
         compiled from "./templates/sub_nav.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5450bf7d9e15b2_92848527')) {function content_5450bf7d9e15b2_92848527($_smarty_tpl) {?><div class="detail-nav">
	<ul>
		<li><a href="#" class="active">Flash card</a></li>
		<li><a href="#">Learn</a></li>
		<li><a href="#">game</a></li>
		<li><a href="#">Edit</a></li>
		<li><a href="#">Delete</a></li>
	</ul>
</div>
<div class="clear"></div>
<script>
	subNavActive();
</script><?php }} ?>
