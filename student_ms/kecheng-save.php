<?php
	$kdi = empty($_GET["kid"]) ? "null": $_GET["kid"];
	include("04_conn.php");
	include("06_pstyle.php");
	if( $kdi == "null"){
		$kcName= $_POST["kcName"];
		$kcTime= $_POST["kcTime"];
		// 如果是录入页面提交，那么active提交的那么$action鞥与add
		$action= empty($_POST["action"])?"add":$_POST["action"];
		if ($action =="add"){
			$sbq="select * from kecheng where 课程名 = '{$kcName}'";
			$re = mysqli_query($conn,$sbq);
			if (mysqli_num_rows($re) >0) {
				echo "<p class='pp'>课程名-{$kcName}已重复添加</p>";
				header("Refresh:1;url=kecheng-input.php");
				die();
			}else{
				$sql = "insert into kecheng(课程名,时间)values('$kcName','$kcTime')";
				$ad="添加";
				$dz="kecheng-input.php";
			}
			
		}else  if($action=="update"){
			$sbq="select * from kecheng where 课程名 = '{$kcName}'";
			$re = mysqli_query($conn,$sbq);
			if (mysqli_num_rows($re) >0) {
				echo "<p class='pp'>课程名-{$kcName}已重复添加</p>";
				header("Refresh:1;url=05_list.php?update=1");
				die();
			}else{
				$kid = $_POST["kid"];
				$sql = "update kecheng set 课程名='{$kcName}',时间='{$kcTime}' where 课程编号 ={$kid}";
				$ad="修改";
				$dz="05_list.php?update=1";
			}
			
		}else{
			die("请选择方法");
		}
	}else{
		$sql ="delete from kecheng where 课程编号 ='{$kdi}' ";
		$ad="删除";
		$dz="05_list.php?update=1?";
	}	
// 插入数据
$result = mysqli_query($conn,$sql);
// 判断数据是否插入成功
if ($result) {
	echo "<p class='pp'>数据{$ad}成功</p>";
	header("Refresh:1;url={$dz}");
}else{
	echo "<p class='pp'>数据{$ad}失败</p></br>".mysqli_error($conn);
// 输出数据
// var_dump($resule);
}

// 关闭数据库
include("07_s.php");
mysqli_close($conn);
?>
