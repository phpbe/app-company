CREATE TABLE `company_contact_message` (
    `id` varchar(36) NOT NULL DEFAULT 'uuid()' COMMENT 'UUID',
    `name` varchar(60) NOT NULL DEFAULT '' COMMENT '名称',
    `email` varchar(60) NOT NULL DEFAULT '' COMMENT '邮箱',
    `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号',
    `content` varchar(500) NOT NULL COMMENT '内容',
    `page_url` varchar(300) NOT NULL DEFAULT '' COMMENT '页面网址',
    `page_title` varchar(300) NOT NULL DEFAULT '' COMMENT '页面标题',
    `ip` varchar(15) NOT NULL DEFAULT '' COMMENT 'IP',
    `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户留言';

ALTER TABLE `company_contact_message`
ADD PRIMARY KEY (`id`),
ADD KEY `create_time` (`create_time`);


CREATE TABLE `company_team` (
`id` varchar(36) NOT NULL DEFAULT 'uuid()' COMMENT 'UUID',
`avatar` varchar(120) NOT NULL DEFAULT '' COMMENT '头像',
`name` varchar(60) NOT NULL DEFAULT '' COMMENT '名称',
`job` varchar(60) NOT NULL DEFAULT '' COMMENT '职位',
`summary` varchar(500) NOT NULL DEFAULT '' COMMENT '摘要',
`description` text NOT NULL COMMENT '描述',
`im_wechat` varchar(120) NOT NULL DEFAULT '' COMMENT '微信',
`im_weibo` varchar(120) NOT NULL DEFAULT '' COMMENT '微博',
`im_qq` varchar(20) NOT NULL DEFAULT '' COMMENT 'QQ',
`im_facebook` varchar(120) NOT NULL DEFAULT '' COMMENT 'Facebook',
`im_twitter` varchar(120) NOT NULL DEFAULT '' COMMENT 'Twitter',
`im_instagram` varchar(120) NOT NULL DEFAULT '' COMMENT 'Instagram',
`phone` varchar(30) NOT NULL DEFAULT '' COMMENT '电话',
`mobile` varchar(30) NOT NULL DEFAULT '' COMMENT '手机',
`email` varchar(120) NOT NULL DEFAULT '' COMMENT '邮箱',
`website` varchar(120) NOT NULL DEFAULT '' COMMENT '个人网站',
`is_enable` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否启用',
`is_delete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除',
`create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
`update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='团队';


ALTER TABLE `company_team`
ADD PRIMARY KEY (`id`);

