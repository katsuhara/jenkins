set names utf8;

drop table if exists list; create table list (
id int(8) auto_increment, primary key (id)
,subject varchar(250)
,detail varchar(250)
,del_flg
,in_dt
,up_dt
)
