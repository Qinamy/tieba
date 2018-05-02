<?php
/*
	数据库操作
*/

// 获取多条数据
function getAll($sql,$conn){
	$query = mysql_query($sql,$conn);
	$result = array();
	if ($query){
		while ($row = mysql_fetch_assoc($query)){
			$result[] = $row;
		}
		return $result;
	}else{
		return array();
	}
}

// 获取一条数据
function getRow($sql,$conn){
	$query = mysql_query($sql,$conn);
	$row = mysql_fetch_assoc($query);
	return $row;
}


?>