set names utf8;

drop table if exists information; create table information (
id int(8) auto_increment, primary key (id)
,subject varchar(250) NULL default NULL
,detail varchar(250) NULL default NULL
,del_at timestamp NULL default NULL
,in_dt datetime NULL default NULL
,up_dt datetime NULL default NULL
)
