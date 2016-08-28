create table t_user (
    user_id integer not null primary key auto_increment,
    user_name varchar(50) not null,
    user_email varchar(150) not null,
    user_password varchar(88) not null,
    user_salt varchar(23) not null,
    user_role varchar(50) not null
)engine=innodb character set utf8 collate utf8_unicode_ci;

create table t_folder (
    folder_id integer not null primary key auto_increment,
    folder_title varchar(100) not null,
    user_id integer not null,
    constraint fk_folder_user foreign key(user_id) references t_user(user_id)
)engine=innodb character set utf8 collate utf8_unicode_ci;

create table t_task (
    task_id integer not null primary key auto_increment,
    task_content text not null,
    folder_id integer not null,
    constraint fk_task_folder foreign key(folder_id) references t_folder(folder_id)
)engine=innodb character set utf8 collate utf8_unicode_ci;