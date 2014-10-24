{include file="header.tpl.php" title="Trang chủ" body_class="index" root=".."}
{include file="menu.tpl.php" title="Trang chủ" css_class="alt reveal"  nav_class="alt reveal" param=""}
<div class="main">
		<div class="wrap">
			<div class="detail-main">
				{include file="sub_nav.tpl.php"}
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
							
						</ul>
					</div>
					<input type="button" value="Prev" id="btnPrev" /><input type="button" value="Next" id="btnNext"/>
					<div class="setting">
						<div>
							<span>Items show:</span> <input type="text" name="filter" value="1,2,3,5-9" />
							<input type="button" value="apply" id="btnFilter"/> <span>Explain for this regex</span> <br>
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
		var ptn = $.parseJSON('{$pattern}');
// 		console.log(ptn);
		var q = new Quiz(ptn)
		q.init();
		q.random('');

		$('#btnNext').off('click').on('click', function(){
			q.next(1);	
		});
		$('#btnPrev').off('click').on('click', function(){
			q.next(-1);	
		});
		$('#btnFilter').off('click').on('click', function(){
			var filter = $('input[name="filter"]').val();
			q.random(filter);	
		});
	});
</script>
{include file="footer.tpl.php"}
