<?php include("01_head.php") ?>
<?php 
	include("04_conn.php");
		$st_cx = empty($_POST['st_cx'])? "null":$_POST['st_cx']; 
		if ($st_cx=="null") {
			$sql = "select id,学号,班号,姓名,性别,出生日期,电话 from student";
		}else{
			$xuehao = empty($_POST['xuehao'])? "xue":$_POST['xuehao'];
			$st_xm = empty($_POST['st_xm'])? "st":$_POST['st_xm'];
			if ($xuehao=="xue") {
				$sql = "select * from student where 姓名='{$st_xm}'";
			}else if($st_xm=="st"){
				$sql = "select * from student where 学号='{$xuehao}'";
			}else{
				$sql ="select * from student where 学号='{$xuehao}' and 姓名='{$st_xm}'";
			}
			
		}
		$scc = "<tr><th>id</th><th>学号</th><th>班号</th><th>姓名</th><th>姓别</th><th>出生日期</th><th>电话</th><th>操作</th></tr>";
		$head="学生";

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
							$xb = $row["性别"]==0?"女":"男";
							echo "<tr>
  						 			 <td>{$row['id']}</td>
   									 <td>{$row['学号']}</td>
   						 			 <td>{$row['班号']}</td>
   						 			 <td>{$row['姓名']}</td>
   						 			 <td>{$xb}</td>
   						 			 <td>{$row['出生日期']}</td>
   						 			 <td>{$row['电话']}</td>
   					 	             <td>
										<a class='sui-btn btn-small btn-warning' href='student-update.php?kid={$row['id']}'>修改</a>
										<a class='sui-btn btn-small btn-danger' href='student-save.php?kid={$row['id']}'>删除</a>
   					 	             </td>
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
	
 