{extends file='templates/main.tpl.php'}
{block name=main}
<div class="main">
		<div class="wrap">
			<h1>Moi nhat</h1>
			<ul class="list-pattern">
				{foreach $searchResult as $p}
			    <li id="{$p->id}">
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
			{if $nextPage neq -1}
			<a id="nextPage" href="#" param="{$param}" page="{$nextPage}">More...</a>
			{/if}
		</div>
	</div>
	{literal}
	<script>
		$('#nextPage').off('click').on('click', function(e){
			e.preventDefault();
			search({'title':$(this).attr('param'), 'page':$(this).attr('page')});
		});
	
	</script>
	{/literal}
{/block}
