
use customform

create table `tbl_user` (
`user_id` integer not null auto_increment,
`account` varchar(16) not null,
`password` varchar(16) not null,
`email_address` varchar(255) default null,
primary key (`user_id`),
index (`account`)
) engine=InnoDB default charset=utf8;

create table `tbl_form` (
`form_id` integer not null auto_increment,
`user_id` integer not null,
`title` varchar(255) not null,
`input_msg` varchar(4000),
`complete_msg` varchar(4000),
`design_type` integer not null,
`start_date` datetime not null,
`end_date` datetime not null,
`create_date` datetime not null,
`update_date` datetime not null,
`status` integer not null,
`del_flg` boolean,
primary key (`form_id`),
index (`user_id`)
) engine=InnoDB default charset=utf8;

create table `tbl_question` (
`question_id` integer not null auto_increment,
`form_id` integer not null,
`title` varchar(255) not null,
`input_type` varchar(32) not null,
`disp_order` integer not null,
`require_flg` boolean default false,
`disp_limit_flg` boolean default false,
`limit_line_num` integer,
primary key (`question_id`),
index (`form_id`)
) engine=InnoDB default charset=utf8;

create table `tbl_parts` (
`parts_id` integer not null,
`question_id` integer not null,
`input_label` varchar(255),
`result_label` varchar(255),
`text_size` integer,
`row_size` integer,
`col_size` integer,
`default_check` boolean,
primary key (`parts_id`),
index (`question_id`)
) engine=InnoDB default charset=utf8;















