<?php /* Smarty version Smarty-3.1.19, created on 2014-09-14 16:09:18
         compiled from ".\templates\nav.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:1603654155598253fc0-72467144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '595a18918897a2e7eeb1e837e53e32a44eac5697' => 
    array (
      0 => '.\\templates\\nav.tpl.php',
      1 => 1410703731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1603654155598253fc0-72467144',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54155598257e46_88279024',
  'variables' => 
  array (
    'css_class' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54155598257e46_88279024')) {function content_54155598257e46_88279024($_smarty_tpl) {?>	<!-- Header -->
			<header id="header" class="<?php echo $_smarty_tpl->tpl_vars['css_class']->value;?>
">
				<h1 id="logo"><a href="index.html">Ngẫu Nhiên <span>for your life</span></a></h1>
				<nav id="nav">
					<ul>
						<li class="current"><a href="index.html">Welcome</a></li>
						<li class="submenu">
							<a href="">Lest's go</a>
							<ul>
								<li><a href="left-sidebar.html">Hiragana</a></li>
								<li><a href="right-sidebar.html">Katagana</a></li>
								<li><a href="no-sidebar.html">Kanji</a></li>
								<li><a href="contact.html">My</a></li>
								<li class="submenu">
									<a href="">And more...</a>
									<ul>
										<li><a href="#">Dolore Sed</a></li>
										<li><a href="#">Consequat</a></li>
										<li><a href="#">Lorem Magna</a></li>
										<li><a href="#">Sed Magna</a></li>
										<li><a href="#">Ipsum Nisl</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="#" class="button special">Sign Up</a></li>
					</ul>
				</nav>
			</header>
<?php }} ?>
