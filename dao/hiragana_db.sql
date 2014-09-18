create table pattern (
	id serial primary key,
	title character varying(200),
	description character varying(500),
	accountid integer,
	columnsize integer,
	votes integer default 0,
	status integer
);

create table pattern_column (
	id serial primary key,
	patternid integer,
	header character varying(100),
	priority integer
);

create table pattern_detail (
	id serial primary key,
	patternid integer,
	columnid integer,
	priority integer,
	value character varying(300)
);

select * from pattern_detail;
select * from pattern_column where pattern_id=1

select * from pattern_detail

where pattern_id=1
order by id