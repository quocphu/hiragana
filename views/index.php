{extends file='templates/main.tpl.php'} {block name=main}

<div class="main">
	<div class="wrap">
		<ul class="tiles">
			<div class="col1 clearfix">
				<li class="tile tile-big tile-1 slideTextUp">
					<div>
						<p>Giới thiệu</p>
						
					</div>
					<div>Khi học một ngôn ngữ mới thì từ vựng là quan trọng nhất. Nhưng học từ vựng trở nên khó khăn khi số lượng từ quá lớn.
						 ABC giúp bạn tạo ra những danh sách từ vựng, sau đó hiển thị một cách ngẫu nhiên, nhiệm vụ của bạn là nhập chính xác nghĩa của từ đó.
						 Việc này giúp bạn ghi nhớ từ vựng nhanh hơn.
					</div>
				</li>
				<li class="tile tile-small tile tile-2 slideTextRight">
					<div style="overflow: scroll">
						<ul class="list-pattern" id="newPattern">
							<li class="border">
								<h3>
									<a>abc</a>
								</h3>
							</li>
						</ul>
					</div>
					<div>
						<p>Mới nhất.</p>
					</div>
				</li>
				<li class="tile tile-small last tile-10 slideTextUp">
					<div class=''>
						<p>Ngẫu nhiên</p>
					</div>
					<div>
						<ul class="list-pattern" id="randomPattern">
						<li class="border">
							<h3>
								<a>abc</a>
							</h3>
						</li>
					</ul>
					</div>
				</li>
			</div>

			<div class="col2 clearfix">
				<li class="tile tile-big tile-5">
					<div>
						<span>
							Hãy cùng ABC để việc học từ vựng trở nên dễ dàng và hiệu quả.
						</span>
						<img src="../images/learn-fun.jpg" alt = "Hoc vui ve">
					</div>
				</li>
				<li class="tile tile-big tile-6 slideTextLeft">
					<div>
						<p>
							Câu hỏi thường gặp.
						</p>
					</div>
					<div>
						Việc sử dụng ABC rất dễ. Hãy bấm vào đây để tim hieu!
					</div>
				</li>
			</div>
			<div class="col3 clearfix">
			<li class="tile tile-litle first tile-1">
					<div>weather1</div>
				</li>
				<li class="tile tile-litle tile-1">
					<div>Weather1</div>
				</li>
				<li class="tile tile-litle tile-1">
					<div>Weather1</div>
				</li>
				<li class="tile tile-litle tile-1">
					<div>Weather1</div>
				</li>
				<li class="tile tile-litle tile-1">
					<div>Weather1</div>
				</li>
				<li class="tile tile-litle tile-1">
					<div>Weather1</div>
				</li>
			</div>
		</ul>
		<div class="clear"></div>

	</div>
</div>
<script>
		
		$(document).ready(function() {
			var param = '{$param}';
			var url = '{$url}';
			searchNew(url, param, '#newPattern');
			searchNew(url, param, '#randomPattern');

// 			$(".list-pattern").delegate( "li", "click", function() {
// 				location.href = $(this).find('a').attr('href');
// 			});

			$('.tile-10 div:nth(0)').on('click', function(){
				$(this).addClass('move-up');
				$(this).next().addClass('move-up');
				var div2 = $(this).find('div:nth(1)');
			});
		});
	</script>
{/block}
