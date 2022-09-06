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
