<?php 
	include("06_pstyle.php");
	$kdi = empty($_GET["kid"]) ? "null": $_GET["kid"];
	$det = empty($_GET["det"]) ? "null": $_GET["det"];
	include("04_conn.php");
	if( $kdi == "null"){
	    $xuehao = empty($_POST['xuehao']) ? "null":$_POST['xuehao'];
	    $kecm = empty($_POST['kecm']) ? "null":$_POST['kecm'];
	    $chengji = empty($_POST['chengji']) ? "null":$_POST['chengji'];
		$action= empty($_POST["action"])?"add":$_POST["action"];
		if ($action =="add"){
			$sql3="select * from xuanxiu where 学号 = '{$xuehao}' and 课程编号='{$kecm}' ";
			$result8 = mysqli_query($conn,$sql3);
			if (mysqli_num_rows($result8) >=1) {
				echo "<p class='pp'>学号{$xuehao}的成绩已经重复添加</p>";
				header("Refresh:1;url=chengji-input.php");
				die();
			}else{
				$sql="insert into xuanxiu(学号,课程编号,成绩) values('$xuehao','$kecm','$chengji')";
				$ad="添加";
				$dz="chengji-input.php";
			}
			
		}else  if($action=="update"){
			$sql3="select * from xuanxiu where 学号 = '{$xuehao}' and 课程编号='{$kecm}' ";
			$result8 = mysqli_query($conn,$sql3);
			if (mysqli_num_rows($result8) >=1) {
				echo "<p class='pp'>学号{$xuehao}的成绩已经重复添加</p>";
				header("Refresh:1;url=05_list.php?update=4");
				die();
			}else{
				$aaa = $_POST["aaa"];
				$bbb = $_POST["bbb"];
				$sql = "update xuanxiu set 学号='{$xuehao}',课程编号='{$kecm}',成绩='{$chengji}' where 学号 = '{$aaa}' and 课程编号 = '{$bbb}'";
				$ad="修改";
				$dz="05_list.php?update=4";
			}
			
		}else{
			die("请选择方法");
		}
	}else{
		$sql ="delete from xuanxiu where 学号 ='{$kdi}' and 课程编号 = '{$det}' ";
		$ad="删除";
		$dz="05_list.php?update=4";
	}
	
	// // echo $bhName;
	
	$result = mysqli_query($conn,$sql);
	if ($result) {
		echo "<p class='pp'>数据{$ad}成功</p>";
		header("Refresh:1;url={$dz}");
	}else{
		echo "<p class='pp'>数据{$ad}成功</p>".mysqli_error($conn);
	}
	include("07_s.php");
	mysqli_close($conn);
 ?>
