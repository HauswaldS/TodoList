create database if not exists todolist character set utf8 collate utf8_unicode_ci;
use todolist;
grant all privileges on todolist.* to 'todolist_admin'@'localhost' identified by 'secret';