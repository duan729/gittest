 <?php
 	include ("04_conn.php");
			$sct = $_GET['sct']
			echo $sct;
			$sql ="select * from student where 学号 = {$sct}";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0 ){
			// 将查询的结果转换为下列数组
				$row = mysqli_fetch_assoc($result);
			}else{
			echo "没有数据";
			}
			// 关闭数据库
			mysqli_close($conn);

?>