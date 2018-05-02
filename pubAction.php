<?php
/*
php贴吧项目实战视频 _ php严程序 www.phpyan.com
下载地址：http://www.phpyan.com/home/attach
*/
/*
	添加新贴
*/

require './init.php';

// 拼接SQL文件
$sql = "insert into thread(user,title,cont,time) values ('".$_POST['user']."','".$_POST['title']."','".$_POST['cont']."','".time()."')";
$execute = mysql_query($sql,$conn);
if ($execute){
	$lastId = mysql_insert_id();
	if ($lastId){
		echo '<script>alert("发贴成功");location.href="reply.php?tid='.$lastId.'"</script>';
	}else{
		echo '<script>alert("发贴失败");location.href="/"</script>';
	}
}else{
	echo '发贴失败';
}
?>