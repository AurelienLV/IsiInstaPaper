/*Script SQL 1/2 for PHPMyAdmin to create database*/
create database if not exists isiInstaPaper character set utf8 collate utf8_unicode_ci;
use isiInstaPaper;

/*PHPMyAdmin - Username: "admin". Password: "admin". */
grant all privileges on isiInstaPaper.* to 'admin'@'localhost' identified by 'admin';