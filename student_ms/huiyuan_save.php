 <?php 
	$hid = empty($_GET["hid"]) ? "null": $_GET["hid"];
	include("06_pstyle.php");
	include("04_conn.php");
	if( $hid == "null"){
	    $yhname = empty($_POST['yhname']) ? "null":$_POST['yhname'];
	    $password = empty($_POST['password']) ? "null":$_POST['password'];
	    $question = empty($_POST['question']) ? "null":$_POST['question'];
		$answer= empty($_POST["answer"])?"add":$_POST["answer"];
		$kid = $_POST["kid"];
			$sql = "update user set name='{$yhname}',password='{$password}',question='{$question}',answer='{$answer}' where id = '{$kid}'";
			$ad="修改";
			$dz="huiyuan_list.php";
		
	}else{
		$sql ="delete from user where id ='{$hid}' ";
		$ad="删除";
		$dz="huiyuan_list.php";
		session_start();
		unset($_SESSION['usname']);
		header("Refresh:0;url=login.php"); 
	}
	
	$result = mysqli_query($conn,$sql);
	if ($result) {
		echo "<p class='pp'>数据{$ad}成功</p>";
		header("Refresh:1;url={$dz}");
	}else{
		echo "<p class='pp'>数据{$dz}失败</p>".mysqli_error($conn);
	}
	include("07_s.php");
	mysqli_close($conn);
 ?>