<?php
/*
php贴吧项目实战视频 _ php严程序 www.phpyan.com
下载地址：http://www.phpyan.com/home/attach
*/
// 引入初始化文件
require './init.php';
// 接收贴子ID
$id = isset($_GET['tid']) ? ($_GET['tid']+0) : 0;
// 根据贴子ID拼接一条查询语句
$sql = "select * from thread where id={$id}";
$row = getRow($sql,$conn);

// 获取回复
$rep_sql = "select * from reply where tid={$id}";
$result = getAll($rep_sql,$conn);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title> new document </title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <style type="text/css">
	*{margin:0; padding:0;}
	li{list-style:none;}
	body{font-size:12px; color:#666;}
	a{color:#1d53bf; font-size:14px;}
	h2{
		font-size:16px;
		color:#000;
	}
	#main {
		width:980px;
		margin: 0 auto;
	}
	#lside {
		width:700px;
		border:1px solid #ccc;
		margin-bottom:50px;
	}
	#lside h2{
		padding:10px 5px;
		border-bottom:2px solid #ccc;
	}
	.cont {
		font-size:14px;
	}
	.user {
		float:left;
		width:100px;
		height:100px;
		text-align:center;
		line-height:50px;
		background:#F7F7F7;
	}
	.text {
		float:left;
		padding:10px;
	}
	.clear{
		width:1px;
		height:1px;
		overflow:hidden;
		clear:both;
	}
	.rep {
		border-top: 1px dashed #D7D7D7;
	}
	.body {
		border-bottom: 2px solid #ccc;
	}
  </style>
 </head>

 <body>
  <div id="main">
	<img src="./images/reply_top.jpg" />
	<div id="lside">
		<h2><?php echo $row['title']; ?></h2>
		<div class="cont body">
			<div class="user"><?php echo $row['user']; ?></div>
			<div class="text"><?php echo $row['cont']; ?></div>
			<div class="clear"></div>
		</div>
		<?php foreach($result as $row){ ?>
		<div class="cont rep">
			<div class="user"><?php echo $row['user']; ?></div>
			<div class="text"><?php echo $row['rep_cont']; ?></div>
			<div class="clear"></div>
		</div>
		<?php }?>
		<div class="clear"></div>
		</div>
		<!--回贴-->
		<div id="form">
			<form method="post" action="replyAction.php">
				<table width="100%">
					<tr>
						<td>用户名</td>
						<td><input type="text" name="user" /></td>
					</tr>
					<tr>
						<td>回复内容</td>
						<td><textarea name="rep_cont" rows="4" cols="50"></textarea></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="hidden" name="tid" value="<?php echo $id;?>" />
							<input type="submit" value="回复贴子" />
						</td>
					</tr>
				</table>
			</form>
		</div><!--结束回贴-->
	</div>

  </div>
 </body>
</html>
