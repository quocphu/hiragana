<?php /* Smarty version Smarty-3.1.19, created on 2014-09-14 15:53:21
         compiled from ".\templates\index.php" */ ?>
<?php /*%%SmartyHeaderCode:609854155526864ba5-08115648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8f563064834cb86ddac3065a1dd322772426b37' => 
    array (
      0 => '.\\templates\\index.php',
      1 => 1410702797,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '609854155526864ba5-08115648',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5415552697dfe8_12848619',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5415552697dfe8_12848619')) {function content_5415552697dfe8_12848619($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Trang chủ",'body_class'=>"index"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("nav.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Trang chủ",'css_class'=>"alt reveal"), 0);?>

<!-- Banner -->		
			<section id="banner">
				
				<!--
					".inner" is set up as an inline-block so it automatically expands
					in both directions to fit whatever's inside it. This means it won't
					automatically wrap lines, so be sure to use line breaks where
					appropriate (<br />).
				-->
				<div class="inner">
					
					<header>
						<h2>Ngẫu</h2>
					</header>
					<p>This is <strong>uMai</strong>, a website
					<br />
					learning Japanese
					<br />
					for <a href="http://html5up.net">everyone</a>.</p>
					<footer>
						<ul class="buttons vertical">
							<li><a href="#main" class="button fit scrolly">Tell Me More</a></li>
						</ul>
					</footer>
				
				</div>
				
			</section>
		
		<!-- Main -->
			<article id="main">

				<header class="special container">
					<h2>As this is my <strong>twentieth</strong> freebie for HTML5 UP
					<br />
					I decided to give it a really creative name.</h2>
					<p>Turns out <strong>Twenty</strong> was the best I could come up with. Anyway, lame name aside,
					<br />
					it's minimally designed, fully responsive, built on HTML5/CSS3/<strong>skel</strong>,
					and, like all my stuff,
					<br />
					released for free under the <a href="http://html5up.net/license">Creative Commons Attribution 3.0</a> license. Have fun!</p>
				</header>

				<!-- One -->
				<section class="wrapper style4 container">
					
						<!-- Content -->
							<div class="content">
								<section>
									
									<div class="row">
										<div class="4u">
											<section class="box">
												<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
												<header>
													<h3>Ipsum feugiat et dolor</h3>
												</header>
												
											</section>
										</div>
										<div class="4u">
											<section class="box">
												<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
												<header>
													<h3>Sed etiam lorem nulla</h3>
												</header>
												
											</section>
										</div>
										<div class="4u">
											<section class="box">
												<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
												<header>
													<h3>Consequat et tempus</h3>
												</header>
												
											</section>
										</div>
									</div>
									<div class="row">
										<div class="4u">
											<section class="box">
												<a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
												<header>
													<h3>Blandit sed adipiscing</h3>
												</header>
												
											</section>
										</div>
										<div class="4u">
											<section class="box">
												<a href="#" class="image featured"><img src="images/pic06.jpg" alt="" /></a>
												<header>
													<h3>Etiam nisl consequat</h3>
												</header>
												
											</section>
										</div>
										<div class="4u">
											<section class="box">
												<a href="#" class="image featured"><img src="images/pic07.jpg" alt="" /></a>
												<header>
													<h3>Dolore nisl feugiat</h3>
												</header>
												
											</section>
										</div>
									</div>
								</section>
							</div>

					</section>
			</article>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
