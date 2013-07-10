set names utf8;

drop table if exists list; create table list (
id int(8) auto_increment, primary key (id)
,subject varchar(250) NULL default NULL
,detail varchar(250) NULL default NULL
,del_flg TINYINT(1) default '0'
,in_dt datetime NULL default NULL
,up_dt datetime NULL default NULL
)
