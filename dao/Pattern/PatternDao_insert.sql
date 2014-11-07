insert into pattern (
		title,
		description,
		accountid,
		columnsize,
		create_date,
		tag,
		update_date,
		status
	) values (
		'#title#',
		'#description#',
		#accountid#,
		#columnsize#,
		current_timestamp,
		'#tag#',
		current_timestamp,
		1
	);