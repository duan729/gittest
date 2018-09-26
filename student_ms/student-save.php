<?php 
	include("06_pstyle.php");
	include("04_conn.php");
	$kdi = empty($_GET["kid"]) ? "null": $_GET["kid"];
	if( $kdi == "null"){
	    $st_xuehao = empty($_POST['st_xuehao']) ? "null":$_POST['st_xuehao'];
	    $st_banhao = empty($_POST['st_banhao']) ? "null":$_POST['st_banhao'];
	    $st_Name = empty($_POST['st_Name']) ? "null":$_POST['st_Name'];
	    $st_gender = empty($_POST['st_gender']) ? "0":$_POST['st_gender'];
		$st_date= empty($_POST["st_date"])?"add":$_POST["st_date"];
		$st_sjh= empty($_POST["st_sjh"])?"add":$_POST["st_sjh"];
		$action= empty($_POST["action"])?"add":$_POST["action"];
		if ($action =="add"){
			$s3="select * from student where 学号 = '{$st_xuehao}'";
			$r8 = mysqli_query($conn,$s3);
			if (mysqli_num_rows($r8) >0) {
				echo "<p class='pp'>学号:  {$st_xuehao}已经重复添加</p>";
				header("Refresh:1;url=student-input.php");
				die();
			}else{
				$sql="insert into student(学号,班号,姓名,性别,出生日期,电话) value('$st_xuehao','$st_banhao','$st_Name','$st_gender','$st_date','$st_sjh')";
				var_dump($sql);
				$ad="添加";
				$dz="student-input.php";
			}
			
		}else  if($action=="update"){
			$s3="select * from student where 学号 = '{$st_xuehao}'";
			$r8 = mysqli_query($conn,$s3);
			if (mysqli_num_rows($r8) >0) {
				echo "<p class='pp'>学号:  {$st_xuehao}已经重复添加</p>";
				header("Refresh:1;url=student-list-ajax.php");
				die();
			}else{
				$kid = $_POST["kid"];
				$sql = "update student set 学号='{$st_xuehao}',班号='{$st_banhao}',姓名='{$st_Name}',性别='{$st_gender}',出生日期='{$st_date}',电话='{$st_sjh}' where id = '{$kid}'";
				$ad="修改";
				$dz="student-list-ajax.php";
			}
			
		}else{
			die("请选择方法");
		}
	}else{
		$sql ="delete from student where id ='{$kdi}' ";
		$ad="删除";
		$dz="05_list.php?update=3";
	}
	
	// // echo $bhName;
	
	$result = mysqli_query($conn,$sql);
	if ($result) {
		echo "<p class='pp'>数据{$ad}成功</p>";
		header("Refresh:1;url={$dz}");
	}else{
		echo "<p class='pp'>数据{$ad}失败</p>".mysqli_error($conn);
	}
	include("07_s.php");
	mysqli_close($conn);
 ?>
