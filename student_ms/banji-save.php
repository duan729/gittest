 <?php 
	$kdi = empty($_GET["kid"]) ? "null": $_GET["kid"];
	include("06_pstyle.php");
	include("04_conn.php");
	if( $kdi == "null"){
		// strtolower($_POST["clsid"]);
		$bhName = empty($_POST['bhName']) ? "null":strtolower($_POST['bhName']);
	    $bzName = empty($_POST['bzName']) ? "null":$_POST['bzName'];
	    $jsName = empty($_POST['jsName']) ? "null":$_POST['jsName'];
	    $bzrName = empty($_POST['bzrName']) ? "null":$_POST['bzrName'];
	    $khName = empty($_POST['khName']) ? "null":$_POST['khName'];
		$action= empty($_POST["action"])?"add":$_POST["action"];
		if ($action =="add"){
			$sqc="select 班号,班长,教室,班主任,班级口号 from banji where 班号='{$bhName}' and 教室='{$jsName}'";
			$sqc1="select 班号,班长,教室,班主任,班级口号 from banji where 班号='{$bhName}'";
			$sqc2="select 班号,班长,教室,班主任,班级口号 from banji where 教室='{$jsName}'";
			$rec = mysqli_query($conn,$sqc);
			$rec1 = mysqli_query($conn,$sqc1);
			$rec2 = mysqli_query($conn,$sqc2);
			
			if (mysqli_num_rows($rec) > 0) {
				echo "<p class='pp'>{$bhName}和{$jsName}重复添加</p>";
				header("Refresh:1;url=banji-input.php");
				die();
			}else if(mysqli_num_rows($rec1) > 0){
				echo "<p class='pp'>班号-{$bhName}已经重复添加</p>";
				header("Refresh:1;url=banji-input.php");
				die();
			}else if(mysqli_num_rows($rec2) > 0){
				echo "<p class='pp'>教室-{$jsName}重复添加</p>";
				header("Refresh:1;url=banji-input.php");
				die();
			}else{
				$sql="insert into banji(班号,班长,教室,班主任,班级口号) value('$bhName','$bzName','$jsName','$bzrName','$khName')";
				$ad="添加";
				$dz="banji-input.php";
			}
			
		}else  if($action=="update"){
			$kid = $_POST["kid"];
			$sql = "update banji set 班长='{$bzName}',教室='{$jsName}',班主任='{$bzrName}',班级口号='{$khName}' where 班号 = '{$kid}'";
			$ad="修改";
			$dz="05_list.php?update=2";
		}else{
			die("请选择方法");
		}
	}else{
		$sql ="delete from banji where 班号 ='{$kdi}' ";
		$ad="删除";
		$dz="05_list.php?update=2";
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