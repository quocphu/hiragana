<?php /* Smarty version Smarty-3.1.19, created on 2014-11-13 08:21:39
         compiled from "./templates/header.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:17631406365417961966cf91-42568171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6d024528e2a409d7809ab579aeff15c17ca5c92' => 
    array (
      0 => './templates/header.tpl.php',
      1 => 1415863296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17631406365417961966cf91-42568171',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54179619679da6_34679707',
  'variables' => 
  array (
    'title' => 0,
    'root' => 0,
    'appId' => 0,
    'MAX_FILE_ROW_NUM' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54179619679da6_34679707')) {function content_54179619679da6_34679707($_smarty_tpl) {?><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
/css/reset.css">
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
/css/style.css">
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
/css/table.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
/js/numeral.min.js"></script>
<script type="text/javascript">
	var gbAppId = <?php echo $_smarty_tpl->tpl_vars['appId']->value;?>
;
	var MAX_FILE_ROW_NUM = <?php echo $_smarty_tpl->tpl_vars['MAX_FILE_ROW_NUM']->value;?>
;
</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
/js/startup.js"></script>
</head>
<?php }} ?>
