<?php
return array(
	//'配置项'=>'配置值'
	//划分项目前后台模块
	'MODULE_ALLOW_LIST'      =>  array('Home','Admin'),
	//设置系统默认访问路径
	'DEFAULT_MODULE'        =>  'Home',  // 默认模块
	'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
	'DEFAULT_ACTION'        =>  'index', // 默认操作名称
	//设置URL调度模式(默认)
	//设置URL不区分链接大小写
	'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
	//设置模板替换标记
	'TMPL_PARSE_STRING'		=>    array(
		'__ADMIN__'=>'/Public/Admin'
	),

	//数据库配置
	'DB_TYPE'               =>  'mysql',     // 数据库类型
	'DB_HOST'               =>  '10.10.26.58', // 服务器地址
	'DB_NAME'               =>  'R9EQD8K5zM7mlcCH',        // 数据库名
	'DB_USER'               =>  'uXjVdgKqtSYkA9JN',      // 用户名
	'DB_PWD'                =>  'pMw9XFOqK6DAWy8Su',     // 密码
	'DB_PORT'               =>  '3306',      // 端口
	'DB_PREFIX'             =>  'ac_',    	 // 数据库表前缀
	
);