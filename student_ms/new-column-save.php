<?php
	$lid = empty($_GET["lid"]) ? "null": $_GET["lid"];
	include("04_conn.php");
	include("06_pstyle.php");
	if( $lid == "null"){
		$newcolumn= $_POST["newcolumn"];
		// 如果是录入页面提交，那么active提交的那么$action鞥与add
		$action= empty($_POST["action"])?"add":$_POST["action"];
		if ($action =="add"){
			$sbq="select * from new_column where name = '{$newcolumn}'";
			$re = mysqli_query($conn,$sbq);
			if (mysqli_num_rows($re) >0) {
				echo "<p class='pp'>栏目-{$newcolumn}已重复添加</p>";
				header("Refresh:1;url=new-column.php");
				die();
			}else{
				$sql = "insert into new_column(name) values('$newcolumn')";
				$ad="添加";
				$dz="new-column.php";
			}
			
		}else  if($action=="update"){
			$sbq="select * from new_column where name = '{$newcolumn}'";
			$re = mysqli_query($conn,$sbq);
			if (mysqli_num_rows($re) >0) {
				echo "<p class='pp'>栏目-{$newcolumn}已重复添加</p>";
				header("Refresh:1;url=new-column-list.php");
				die();
			}else{
				$kid = $_POST["kid"];
				$sql = "update new_column set name='{$newcolumn}' where id={$kid}";
				$ad="修改";
				$dz="new-column-list.php";
			}
			
		}else{
			die("请选择方法");
		}
	}else{
		$sql ="delete from new_column where id ='{$lid}' ";
		$ad="删除";
		$dz="new-column-list.php";
	}
    
	
	
// 插入数据

$result = mysqli_query($conn,$sql);
// 判断数据是否插入成功
if ($result) {
	echo "<p class='pp'>数据{$ad}成功</p>";
	header("Refresh:1;url={$dz}");
}else{
	echo "<p class='pp'>数据{$ad}失败</p></br>".mysqli_error($conn);
	header("Refresh:1;url={$dz}");
}

// 关闭数据库
include("07_s.php");
mysqli_close($conn);
?>
