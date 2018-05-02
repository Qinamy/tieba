<?php
/*
php贴吧项目实战视频 _ php严程序 www.phpyan.com
下载地址：http://www.phpyan.com/home/attach
*/
// 初始化
require './init.php';

// 获取贴子列表
$sql = "select *,(select count(*) from reply where thread.id=reply.tid) as rep_cnt from thread order by time desc";
$result = getAll($sql,$conn);

foreach ($result as $key=>$row){
	// 拿当前时间和数据库记录时间比较
	$time = strtotime(date('Y-m-d'));
	$rs_time = strtotime(date('Y-m-d',$row['time']));
	if ($rs_time >= $time){
		$result[$key]['time'] = date('H:i',$row['time']);
	}else{
		$result[$key]['time'] = date('m-d',$row['time']);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title> new document </title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <style type="text/css">
	body,ul,li{margin:0; padding:0;}
	li{list-style:none;}
	body{font-size:12px; color:#666;}
	a{color:#1d53bf; font-size:14px;}
	#main {
		width:980px;
		margin: 0 auto;
	}
	#cont {
		overflow:auto;
	}
	#thread_list {
		width:710px;
		float:left;
		padding:10px;
		border:1px solid #d7d7d7;
		margin-top:5px;
	}
	#rside {
		width:240px;
		float:right;
	}
	.reply-bg {
		width:55px;
		height:23px;
		line-height:23px;
		text-align:center;
		color:#333;
		background:url('./images/reply.gif') no-repeat;
	}
	.clear{
		width:1px;
		height:1px;
		overflow:hidden;
		clear:both;
	}
	.reply-bg,.title,.user{
		float:left;
	}
	.title {
		width:450px;
		margin-left:10px;
		display:_inline;
	}
	.time {
		float:right;
	}
	#thread_list li {
		padding:10px 0;
	}
	#form {
		margin-top:50px;
	}

  </style>
 </head>

 <body>
	<div id="main">
		<div id="top">
			<img src="./images/top.jpg" />
		</div>
		<div id="cont">
			<div id="thread_list">
			<ul>
				<?php foreach($result as $row){ ?>
				<li>
					<div class="reply-bg"><?php echo $row['rep_cnt']; ?></div>
					<div class="title">
						<a href="reply.php?tid=<?php echo $row['id'];?>"><?php echo $row['title'];?></a><br /><br />
						<?php echo $row['cont'];?>
					</div>
					<div class="user"><?php echo $row['user'];?></div>
					<div class="time"><?php echo $row['time'];?></div>
					<div class="clear"></div>
				</li>
				<?php } ?>
			</ul>
			<div id="form">
				<form method="post" action="pubAction.php">
					<table width="100%">
						<tr>
							<td>用户名</td>
							<td><input type="text" name="user" /></td>
						</tr>
						<tr>
							<td>标题</td>
							<td><input type="text" name="title" /></td>
						</tr>
						<tr>
							<td>内容</td>
							<td><textarea name="cont" rows="4" cols="50"></textarea></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" name="" value="发布新贴" /></td>
						</tr>
					</table>
				</form>
			</div>
			</div>
			<div id="rside">
				<img src="./images/right.jpg" />
			</div>
		</div>
	</div>
 </body>
</html>
