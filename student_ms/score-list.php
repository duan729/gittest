<?php 
	include("01_head.php"); 

	include("04_conn.php");
	// 选择班级的表
	
		$st_xm=empty($_POST['st_xm'])? "st":$_POST['st_xm'];
		$xuehao=empty($_POST['xuehao'])? "xue":$_POST['xuehao'];
		$kecm=empty($_POST['kecm'])? "null":$_POST['kecm'];
			if ($xuehao=="xue") {
				$sql = "SELECT * FROM xuanxiu AS x LEFT JOIN kecheng AS k ON x.课程编号=k.课程编号 LEFT JOIN student as s ON x.学号=s.学号 WHERE s.姓名 = '{$st_xm}' AND k.课程编号 = '{$kecm}'";
			}else if($st_xm=="st"){
				$sql = "SELECT * FROM xuanxiu AS x LEFT JOIN kecheng AS k ON x.课程编号=k.课程编号 LEFT JOIN student as s ON x.学号=s.学号 WHERE x.学号 = '{$xuehao}' AND x.课程编号 = '{$kecm}'";
			}else{
				die("<p class='pp'>请选择操作方法</p>");
			}
		$scc = "<tr><th>学号</th><th>姓名</th><th>课程名</th><th>成绩</th></tr>";
		$head="成绩";
	
	$result=mysqli_query($conn,$sql);
	mysqli_close($conn);
 ?>
 <div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("02_leftnemu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd"><?php echo $head; ?>列表</p>
			<table class="sui-table table-primary">
				<?php 
				echo $scc;
					// 输出数据
				if (mysqli_num_rows($result) > 0 ) {
					while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>
								      <td>{$row['学号']}</td>
								      <td>{$row['姓名']}</td>
								      <td>{$row['课程名']}</td>
								      <td>{$row['成绩']}</td>
								   </tr>";
					
					} 	
				}else{
					echo "没有数据";
				}
				 ?>
				
			</table>
		  </div>
		</div>		
	<?php include("03_foot.php") ?>
	
 