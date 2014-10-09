create table pattern (
	id serial primary key,
	title character varying(200),
	description character varying(500),
	accountid integer,
	columnsize integer,
	votes integer default 0,
	likes integer default 0,
	create_date timestamp,
	update_date timestamp,
	tag character varying(500)
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

create table account (
	id serial primary key,
	uid character varying (100),
	pwd character varying(500),
	
);