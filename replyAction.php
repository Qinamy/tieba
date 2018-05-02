<?php
/*
php贴吧项目实战视频 _ php严程序 www.phpyan.com
下载地址：http://www.phpyan.com/home/attach
*/
/*
	贴子回复
*/
require './init.php';

// 拼接SQL语句
$sql = "insert into reply (user,rep_cont,tid) values ('".$_POST['user']."','".$_POST['rep_cont']."','".$_POST['tid']."')";

// 发送SQL语句
$query = mysql_query($sql,$conn);

if ($query){
	$lastId = mysql_insert_id($conn);
	if ($lastId){
		echo '<script>alert("回复成功");location.href="./reply.php?tid='.$_POST['tid'].'"</script>';
	}else{
		echo '<script>alert("回复失败");location.href="./reply.php?tid='.$_POST['tid'].'"</script>';
	}
}

?>