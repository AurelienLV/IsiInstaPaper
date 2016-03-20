drop table if exists link CASCADE;
drop table if exists repertory CASCADE;
drop table if exists person CASCADE;

create table person (
	id integer unsigned not null auto_increment,
	email varchar(255) not null unique,
	passwordHash varchar(20) not null,
	username varchar(20) unique,
	avatar varchar(500),
	primary key (id)
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table repertory (
	id integer unsigned not null auto_increment,
	name varchar(20) not null,
	forever boolean not null,
	bookmarklet boolean not null,
	avatar varchar(500),
	idperson integer unsigned not null,
	primary key (id),
	CONSTRAINT fk_repertory_id FOREIGN KEY (idperson) REFERENCES person(id)
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table link (
	id integer unsigned not null auto_increment,
	title varchar(100) not null,
	content varchar(500000) not null,
	creationdate datetime not null,
	url varchar(500) not null,
	video boolean not null,
	liked boolean not null,
	note varchar(1000),
	idrepertory integer unsigned not null,
	primary key (id),
	CONSTRAINT fk_link_id FOREIGN KEY (idrepertory) REFERENCES repertory(id)
) engine=innodb character set utf8 collate utf8_unicode_ci;