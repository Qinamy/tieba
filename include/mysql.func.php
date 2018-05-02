<?php
/*
	数据库操作
*/

// 获取多条数据
function getAll($sql,$conn){
	$query = mysqli_query($conn,$sql);
	$result = array();
	if ($query){
		while ($row = mysqli_fetch_assoc($query)){
			$result[] = $row;
		}
		return $result;
	}else{
		return array();
	}
}

// 获取一条数据
function getRow($sql,$conn){
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($query);
	return $row;
}


?>