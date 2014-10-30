{extends file='templates/main.tpl.php'}
{block name=main}
<div class="main">
		<div class="wrap">
			{if $count <= 0}
			<h1>Không tìm thấy kết quả nào</h1>
			{else}
			
			<h1>Tìm thấy {$count} kết quả</h1>
			<ul class="list-pattern">
				{foreach $searchResult as $p}
			    <li id="{$p->id}" fbid="{$p->fbId}" class="border">
					<h3><a href="/detail/{$p->id}">{$p->title}</a></h3>
					<div class="detail">
						<div class="avatar">
							<img src="images/avatar.jpg" />
						</div>
						<ul>
							<li>{$p->authorName}</li>
							<li>{$p->createDate}</li>
							<li>{$p->itemCount|string_format:"%d"}</li>
							<li>{$p->views|string_format:"%d"} views</li>
						</ul>
						<div class="clear"></div>
					</div>
				</li>
			{/foreach}
			</ul>
			{/if}
			{if $nextPage neq -1}
			<a id="nextPage" href="#" param="{$param}" page="{$nextPage}">Xem thêm...</a>
			{/if}
			<input type="hidden" name="param" value="{$param}">
		</div>
	</div>
	{literal}
	<script>
		// More result
		$('#nextPage').off('click').on('click', function(e){
			e.preventDefault();
			search({'title':$(this).attr('param'), 'page':$(this).attr('page')});
		});

		// Load avatar (run only one when page load)
		$('.list-pattern>li').each(function(idx, el){
			getAvatar($(el).attr('fbid'), $(el).find('.avatar'));
		});

		// refill search parameter
		$('form[name="search"]').find('#title').val($('input[name="param"]').val());
	</script>
	{/literal}
{/block}
