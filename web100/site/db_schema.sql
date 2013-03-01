create table users(
	idx int auto_increment primary key,
	user_id varchar(32) unique not null,
	user_ps char(64) not null
);

insert into users values (null, 'admin', 'f0ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0f');
