<?php /* Smarty version Smarty-3.1.19, created on 2014-11-14 04:39:40
         compiled from "views/detail.php" */ ?>
<?php /*%%SmartyHeaderCode:1644160865543b8b6cde39a9-51599534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7c8d58e292b68e63ed3a746e18cee0382762e78' => 
    array (
      0 => 'views/detail.php',
      1 => 1415936374,
      2 => 'file',
    ),
    'bfb5bf6d529a1de2057e120d97a8626aa9ef7fad' => 
    array (
      0 => 'templates/main.tpl.php',
      1 => 1415340764,
      2 => 'file',
    ),
    'e2d031adfce007f3e30b419472f88e1be179c8aa' => 
    array (
      0 => './templates/sub_nav.tpl.php',
      1 => 1414553767,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1644160865543b8b6cde39a9-51599534',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543b8b6ce53db9_97347733',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543b8b6ce53db9_97347733')) {function content_543b8b6ce53db9_97347733($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('body_class'=>"index",'root'=>''), 0);?>

<body>
	<div id="cloud-container">
		<!-- Menu -->
		<?php echo $_smarty_tpl->getSubTemplate ("menu.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('css_class'=>"alt reveal",'nav_class'=>"alt reveal",'param'=>''), 0);?>

		
		<!-- Content -->
		<div class="main">
			
<div class="main">
		<div class="wrap">
			<div class="detail-main">
				<?php /*  Call merged included template "sub_nav.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("sub_nav.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1644160865543b8b6cde39a9-51599534');
content_5465797c137bb6_45920296($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "sub_nav.tpl.php" */?>
				<div class="content">
					<div class="quiz">
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
									<li><input type="text" value="input 1" /> <span>Column title 1</span></li>
									<li ><input type="text" value="input 2" /> <span>Column title 2</span></li>
									<li ><input type="text" value="input 3" /> <span>Column title 3</span></li>
									<li ><input type="text" value="input 4" /> <span>Column title 4</span></li>
									<li ><input type="text" value="input 5" /> <span>Column title 4</span></li>
									
								</ul>
							</div>
							<br>
							<input type="button" value="Prev" id="btnPrev" />
							<input type="button" value="Next" id="btnNext"/>
							<span class="record">0/0</span>
							<div class="setting">
								<div class="show">
									<span>Lọc:</span> <input type="text" name="filter" value="" />
									<input type="button" value="Ngẫu nhiên" id="btnFilter"/> <input type="button" value="Bình thường" id="btnOrdinarily"/> <input id="btnQuestion" type="button" value="?"><br>
								</div>
								<div class="show">
									<span>Cột hiển thị:</span>
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
									<span>Cột nhập:</span>
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
					<div class="all CSSTableGenerator">
						<table id="data" class="create">
						</table>
					</div>
					<div class="current CSSTableGenerator">
						<table id="crData" class="create">
						</table>
					</div>
				</div>
				<input type="button" value="Báo cáo xấu"><br><br>
			</div>
		</div>
	</div>
<script type="text/javascript" src="../js/random.js"></script>
<script type="text/javascript" src="../js/quiz.js"></script>
<script type="text/javascript" src="../js/objectivetest.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		// Parse json data
		var ptn = $.parseJSON('<?php echo $_smarty_tpl->tpl_vars['pattern']->value;?>
');

		// Create quiz
		var q = new Quiz(ptn)
		q.init();
		q.random('');

		// Button next
		$('#btnNext').off('click').on('click', function(){
			q.next(1, true);	
		});

		// Button previous
		$('#btnPrev').off('click').on('click', function(){
			q.next(-1, true);	
		});

		// Button filter (random data)
		$('#btnFilter').off('click').on('click', function(){
			var filter = $('input[name="filter"]').val();
			q.random(filter);

			// Display current data for tab
				
			var rows = q.getCurrentDataSet();
			var table = $('table[id="crData"]');
			table.html('');
			var emptyHeader = ['STT'];
			var tmpHeader = $.merge(emptyHeader, ptn.header);
			createRow(table, tmpHeader, -1, true, false);
			for (var i = 0; i < rows.length; i++) {
				createRow(table, rows[i], i +1 , true, false,true);
			}
		});

		// Button ordinarily
		$('#btnOrdinarily').off('click').on('click', function(){
			var filter = $('input[name="filter"]').val();
			q.ordinarily(filter);

			// Display current data for tab
				
			var rows = q.getCurrentDataSet();
			var table = $('table[id="crData"]');
			table.html('');
			var emptyHeader = ['STT'];
			var tmpHeader = $.merge(emptyHeader, ptn.header);
			createRow(table, tmpHeader, -1, true, false);
			for (var i = 0; i < rows.length; i++) {
				createRow(table, rows[i], i +1 , true, false,true);
			}
		});

		// Button question
		$('#btnQuestion').off('click').on('click', function(){
			alert('Chọn các phần tử muốn hiển thị.\n Ví dụ:\n\t1,2,3 --> chọn 1, 2, 3\n\t4-6 --> chọn từ 4 -> 6\n\tHoặc kết hợp cả 2: 1,2,3,4-6')
		});

		// Display text when click on column name
		$('.input ul').find('span').each(function(idx, el){
			$(el).on('click', function(){
				$(this).prev().val(q.getCurrentData(idx));
			});
			
		});
		
		// Create show all
		var rows = ptn.data;
		var table = $('table[id="data"]');
		table.html('');
		var emptyHeader = ['STT'];
		var tmpHeader = $.merge(emptyHeader, ptn.header);
		createRow(table, tmpHeader, -1, true, false);
		for (var i = 0; i < rows.length; i++) {
			createRow(table, rows[i], i + 1, true, false,true);
		}	
		
		// Change sub menu text
		var text = ['Quiz', 'Xem tất cả', 'Hiện tại'];
		var items = ['.quiz','.all','.current'];
		for(var i = 0; i< items.length; i++){
			$(items[i]).addClass('hide');
		}
		$(items[0]).removeClass('hide');
		
		$('.detail-nav ul li a').each(function(idx, el){
			if(idx < text.length){
				$(this).html(text[idx]);
			} else {
				$(this).parent().remove()
			}
			
			$(el).on('click', function(){
				if(idx < items.length){
					for(var i = 0; i< items.length; i++){
						$(items[i]).addClass('hide');
					}
					$(items[idx]).removeClass('hide');
				}
			});
		})
	});

	// Create facebook comment plugin
	var commentPlg = $('<div style="with:100%; overflow: hidden; display: block"><div class="fb-comments" data-href="http://localhost:8888/fb/login.php" data-numposts="5" data-colorscheme="light" data-width="100%" ></div></div>');
	var likePlg = $('<div style="with:100%; overflow: hidden; display: block"><div class="fb-like" data-href="http://localhost:8888" data-layout="standard" data-action="like" data-show-faces="true" data-share="true" data-width="100%"></div></div>');
	var href = location.origin + location.pathname;
	commentPlg.attr('data-href', href);
	likePlg.attr('data-href', href);
	$('.detail-main').append(likePlg);
	$('.detail-main').append(commentPlg);

	// Update view count after 15s
	setTimeout(function(){
		$.ajax({
  			type: 'POST',
  			url: '/api/view',
  			data: {'url': location.pathname, 'type': '0'}
  		}).done(function(data){
			
  		});
	}, 15*1000);

	$('input[type="text"]').on('focus', function(){
		this.select();
	});
</script>

		</div>
		
		<!-- footer -->
		<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('root'=>".."), 0);?>

	</div>
</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2014-11-14 04:39:40
         compiled from "./templates/sub_nav.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5465797c137bb6_45920296')) {function content_5465797c137bb6_45920296($_smarty_tpl) {?><div class="detail-nav">
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
