select 
	dt.id,
	dt.title,
	dt.views,
	dt.columnSize,
	DATE_FORMAT(dt.create_date, '%d-%m-%Y') as createDate,
	dt.accountid as authorId,
	ac.fbname as authorName,
	(select count(*)/dt.columnSize from pattern_detail where patternid = dt.id) as itemCount
from
	(
		select
			id,
			title,
			views,
			columnSize,
			create_Date,
			accountid
		from pattern
		where title like '%#title#%'
		or tag like '%#title#%'
		order by #orderby#  #order# limit #limit# offset #offset#
	) dt
inner join account ac
on dt.accountid = ac.id