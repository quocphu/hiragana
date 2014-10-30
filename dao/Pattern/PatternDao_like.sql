UPDATE 
	pattern
SET
	title			= '#title#',
	description		= '#description#',
	accountid		= #accountid#,
	columnsize		= #columnsize#,
	views			= #views#,
	status			= #status#,
	update_date		= current_timestamp
WHERE id = #id#