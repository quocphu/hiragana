{include file="header.tpl.php" title="Trang chủ" body_class="index" root=".."}
{include file="menu.tpl.php" title="Trang chủ" css_class="alt reveal"  nav_class="alt reveal"}
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

						</ul>
					</div>
					<div class="input">
						<ul>
							<li><input type="text" value="input 1" /><span>Column title 1</span></li>
							<li><input type="text" value="input 2" /><span>Column title 2</span></li>
							<li><input type="text" value="input 3" /><span>Column title 3</span></li>
							<li><input type="text" value="input 4" /><span>Column title 4</span></li>
							<li><input type="button" value="Prev" /><input
								type="button" value="Next" /></li>
						</ul>
					</div>
					<div class="setting">
						<div>
							<span>Items show:</span> <input type="text" value="1,2,3,5-9" />
							<input type="button" value="apply" /> <span>Explain for
								this regex</span> <br>
						</div>
						<div class="show">
							<span>Column show:</span>
							<ul class="show">
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
							</ul>
						</div>

						<div class="clear"></div>
						<div class="show">
							<span>Input show:</span>
							<ul>
								<li class="selected">Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
								<li>Column 1</li>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
{include file="footer.tpl.php"}
