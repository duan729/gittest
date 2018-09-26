<?php include("01_head.php") ?>
<?php 
	include("04_conn.php");
	// 选择班级的表
	$update = empty($_GET['update'])? "null":$_GET['update'];
	$ccc=5;
	if($update==1){
		$tab = "kecheng";
		$scc = "<tr><th>课程编码</th><th>课程名</th><th>时间</th><th>操作</th></tr>";
		$head="课程";
		$up= "1";
	}else if($update==2){
		$tab = "banji";
		$scc = "<tr><th>班号</th><th>班长</th><th>教室</th><th>班主任</th><th>班级口号</th><th>操作</th></tr>";
		$head="班级";
		$up= "2";
	}else if($update==3){
		$tab = "student";
		$scc = "<tr><th>id</th><th>学号</th><th>班号</th><th>姓名</th><th>姓别</th><th>出生日期</th><th>电话</th><th>操作</th></tr>";
		$head="学生";
		$up= "3";
	}else if($update==4){
		$tab = "xuanxiu";
		$scc = "<tr><th>学号</th><th>课程名</th><th>成绩</th><th>操作</th></tr>";
		$head="成绩";
		$up= "4";
	}else{
		die("请选择要查看的内容");
	}
	include("Tpage.php");
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
				    foreach($array as $key=>$values){
				    	if ($update==1) {
				    		echo "<tr>";
				        	echo "<td>{$values["课程编号"]}</td>";
				        	echo "<td>{$values["课程名"]}</td>";
				        	echo "<td>{$values["时间"]}</td>";
				        	echo "<td><a class='sui-btn btn-small btn-warning' href='kecheng-update.php?kid={$values['课程编号']}'>修改</a>&nbsp;&nbsp;
							<a class='sui-btn btn-small btn-danger' href='kecheng-save.php?kid={$values['课程编号']}'>删除</a>";
				        	echo "</tr>";
						}else if ($update==2) {
							echo "<tr>";
				        	echo "<td>{$values["班号"]}</td>";
				        	echo "<td>{$values["班长"]}</td>";
				        	echo "<td>{$values["教室"]}</td>";
				        	echo "<td>{$values["班主任"]}</td>";
				        	echo "<td>{$values["班级口号"]}</td>";
				        	echo "<td><a class='sui-btn btn-small btn-warning' href='banji-update.php?kid={$values['班号']}'>修改</a>&nbsp;&nbsp;
							<a class='sui-btn btn-small btn-danger' href='banji-save.php?kid={$values['班号']}'>删除</a>";
				        	echo "</tr>";
						}else if ($update==3) {
							$xb = $values["性别"]==0?"女":"男";
							echo "<tr>";
				        	echo "<td>{$values["id"]}</td>";
				        	echo "<td>{$values["学号"]}</td>";
				        	echo "<td>{$values["教室"]}</td>";
				        	echo "<td>{$values["班号"]}</td>";
				        	echo "<td>{$values["姓名"]}</td>";
				        	echo "<td>{$xb}</td>";
				        	echo "<td>{$values["出生日期"]}</td>";
				        	echo "<td>{$values["电话"]}</td>";
				        	echo "<td><a class='sui-btn btn-small btn-warning' href='student-update.php?kid={$values['id']}'>修改</a>&nbsp;&nbsp;
							<a class='sui-btn btn-small btn-danger' href='student-save.php?kid={$values['id']}'>删除</a>";
				        	echo "</tr>";
						}else if ($update==4) {
							$sss="select 课程编号,课程名,时间 from kecheng where 课程编号= {$values['课程编号']} ";
							include("04_conn.php");
							$ree=mysqli_query($conn,$sss);
							if (mysqli_num_rows($ree) > 0 ) {
								$rww = mysqli_fetch_assoc($ree);
								echo "<tr>";
				        		echo "<td>{$values["学号"]}</td>";
				        		echo "<td>{$rww["课程名"]}</td>";
				        		echo "<td>{$values["成绩"]}</td>";
				        		echo "<td><a class='sui-btn btn-small btn-warning' href='chengji-update.php?kid={$values['学号']}&det={$values['课程编号']}' >修改</a>&nbsp;&nbsp;
								<a class='sui-btn btn-small btn-danger' href='chengji-save.php?kid={$values['学号']}&det={$values['课程编号']}'>删除</a>";
				        		echo "</tr>";
							mysqli_close($conn);	
						}else{
							echo "请输出内容";
						}
				        
				    }
				}
				?>
			</table>
			<?php include("Bpage.php"); ?>
		  </div>
		</div>		
	<?php 
	include("03_foot.php"); 
	?> 