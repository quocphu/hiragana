{extends file='templates/main.tpl.php'} {block name=main}

<div class="main">
	<div class="wrap">
		<ul class="tiles">
			<div class="col1 clearfix">
				<li class="tile tile-big tile-1 slideTextUp">
					<div>
						<p>Giới thiệu</p>
						
					</div>
					<div>
						<p>Khi học một ngôn ngữ mới thì từ vựng là quan trọng nhất. Nhưng học từ vựng trở nên khó khăn khi số lượng từ quá lớn.
						 ABC giúp bạn tạo ra những danh sách từ vựng, sau đó hiển thị một cách ngẫu nhiên, nhiệm vụ của bạn là nhập chính xác nghĩa của từ đó.
						 Việc này giúp bạn ghi nhớ từ vựng nhanh hơn.
						 </p>
					</div>
				</li>
				<li class="tile tile-small tile tile-2 slideTextRight">
					<div>
						<p class="icon-arrow-right">
						<ul class="list-pattern">
							<li class="border">
							<h3>
								<a>abc</a>
							</h3>
							<div class="detail">
								<div class="avatar">
									<img src="images/avatar.jpg" />
								</div>
								<ul>
									<li>author</li>
									<li>2014 - 09 - 10</li>
									<li>260 items</li>
									<li>160 likes - 20 views</li>
								</ul>
								<div class="clear"></div>
							</div>
						</li>
					</ul>
						</p>
						
						
					</div>
					<div>
						<p>Mới nhất.</p>
					</div>
				</li>
				<li class="tile tile-small last tile-10 slideTextUp">
					<div>
						<p>Ngẫu nhiên</p>
					</div>
					<div>
						<ul class="list-pattern">
						<li class="border">
							<h3>
								<a>abc</a>
							</h3>
							<div class="detail">
								<div class="avatar">
									<img src="images/avatar.jpg" />
								</div>
								<ul>
									<li>author</li>
									<li>2014 - 09 - 10</li>
									<li>260 items</li>
									<li>160 likes - 20 views</li>
								</ul>
								<div class="clear"></div>
							</div>
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
						<p>Việc sử dụng ABC rất dễ. Hãy bấm vào đây để chúng tôi giúp bạn!</p>
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
			searchNew(url, param);

// 			$(".list-pattern").delegate( "li", "click", function() {
// 				location.href = $(this).find('a').attr('href');
// 			});
		});
	</script>
{/block}
