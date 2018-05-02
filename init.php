<?php
header('Content-Type:text/html;charset=utf-8');
/*
php贴吧项目实战视频 _ php严程序 www.phpyan.com
下载地址：http://www.phpyan.com/home/attach
*/

/*
	项目初始化文件
	1: 加载数据库配置，并连接数据库
	2: 调试模式
	3: 加载函数库
	4: 开启魔术引号
*/

// 时区
date_default_timezone_set('PRC');

// 调式模式
define('DEBUG',true);
if (DEBUG){
	error_reporting(E_ALL);
}else{
	error_reporting(0);
}

// 加载配置
define('INC_PATH',dirname(__FILE__).'/include/');
require INC_PATH.'config.inc.php';
// 连接数据库
$conn = mysql_connect($conf['host'],$conf['user'],$conf['pwd']);
if (!$conn){
	echo '数据库连接失败'.mysql_error();
	die;
}
mysql_query('use '.$conf['name'],$conn);
mysql_query('set names utf8');


// 加载数据库函数
require INC_PATH.'mysql.func.php';

// 如果系统没有开启魔术引号,则我们需要手动转义
if (!get_magic_quotes_gpc()){
	array_walk_recursive($_POST,'_addslashes');
	array_walk_recursive($_GET,'_addslashes');
	array_walk_recursive($_COOKIE,'_addslashes');
}

function _addslashes(&$item,$key){
	$item = addslashes($item);
}

?>