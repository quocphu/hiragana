insert into pattern (
		title,
		description,
		accountid,
		columnsize,
		create_date,
		tag,
		update_date
	) values (
		'#title#',
		'#description#',
		#accountid#,
		#columnsize#,
		'#tag#',
		current_timestamp,
		current_timestamp
	);