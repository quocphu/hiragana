{extends file='templates/main.tpl.php'}
{block name=main}
<div class="main">
		<div class="wrap">
			<div class="detail-main">
				{include file="sub_nav.tpl.php"}
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
									<li><input type="text" value="input 1" /><span>Column title 1</span></li>
									<li ><input type="text" value="input 2" /><span>Column title 2</span></li>
									<li ><input type="text" value="input 3" /><span>Column title 3</span></li>
									<li ><input type="text" value="input 4" /><span>Column title 4</span></li>
									<li ><input type="text" value="input 5" /><span>Column title 4</span></li>
									
								</ul>
							</div>
							<input type="button" value="Prev" id="btnPrev" />
							<input type="button" value="Next" id="btnNext"/>
							<span class="record">0/0</span>
							<div class="setting">
								<div class="show">
									<span>Lọc:</span> <input type="text" name="filter" value="" />
									<input type="button" value="apply" id="btnFilter"/> <input id="btnQuestion" type="button" value="?"><br>
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
		var ptn = $.parseJSON('{$pattern}');

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

		// Button filter
		$('#btnFilter').off('click').on('click', function(){
			var filter = $('input[name="filter"]').val();
			q.random(filter);	
		});

		// Button question
		$('#btnQuestion').off('click').on('click', function(){
			alert('Chọn các phần tử muốn hiển thị.\n Ví dụ:\n \t\t1,2,3 --> chọn 1, 2, 3\n \t\t4-6 --> chọn từ 4 -> 6\n \t\tHoặc kết hợp cả 2: 1,2,3,4-6')
		});

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
			createRow(table, rows[i], i, true, false,true);
		}	
		
		// Change sub menu text
		var text = ['Quiz', 'Xem tất cả'];
		var items = ['.quiz','.all'];
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
  			{literal}data: {'url': location.pathname, 'type': '0'}{/literal}
  		}).done(function(data){
			
  		});
	}, 15*1000);

	$('input[type="text"]').on('focus', function(){
		this.select();
	});
</script>
{/block}