<?php include("01_head.php") ?>		

	<?php 
		$kid = empty($_GET['kid'])?"null":$_GET['kid'];
		$det = empty($_GET['det'])?"null":$_GET['det'];
		if ($kid == "null") {
			die("请选择要修改的记录");
		}else{
			include("04_conn.php");
			// 找到课程编号是kid的这行代码
			$sql = "select * from xuanxiu where 学号 = '{$kid}' and 课程编号='{$det}'";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0 ) {
				// 将查询的结果转换为下列数组
				$row = mysqli_fetch_assoc($result);
				$banjis="select*from kecheng where 课程编号 = '{$det}' ";
				$result2 = mysqli_query($conn,$banjis);
				if (mysqli_num_rows($result2) > 0) {
					$ree = mysqli_fetch_assoc($result2);
				}else{
					echo "没有数据";
				} 
			}else{
					echo "没有数据";
			}
			$sql1 = "SELECT DISTINCT 课程编号,课程名 FROM kecheng";
			$result1 = mysqli_query($conn, $sql1);
			// 关闭数据库
			mysqli_close($conn);
			}
			
	?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("02_leftnemu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩修改</p>
			<form class="sui-form form-horizontal sui-validate" action="chengji-save.php" method="post">
			  <div class="control-group">
			    <label for="xuehao" class="control-label">学号：</label>
			    <div class="controls">
			     <input type="hidden" value="<?php echo $row['学号']; ?>" name="aaa">
			     <input type="hidden" value="<?php echo $row['课程编号']; ?>" name="bbb"> 
			      <input type="hidden" value="update" name="action">

			      <input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row['学号']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kecm" class="control-label">课程名：</label>
			    <div class="controls">
			     <select id="bjNumber" name="kecm">
			     <option value=""><?php echo $ree['课程名']; ?></option>
					<?php
					if( mysqli_num_rows($result1) > 0 ){
						while ( $row1 = mysqli_fetch_assoc($result1) ) {
							if ($ree['课程名'] !== $row1['课程名']) {
								echo "<option value='{$row1['课程编号']}'>{$row1['课程名']}</option>";
							}
						}
					}else{
						echo "<option value=''>请先课程编号</option>";
					}
					 ?>     	
			     </select>
			    </div>
			  </div>


			  <div class="control-group">
    			<label for="chengji" class="control-label">成绩：</label>
   			   <div class="controls">
      				<input type="text" id="chengji" name="chengji" placeholder="姓名" data-rules="required|minlength=2|maxlength=6" value="<?php echo $row['成绩']; ?>">
   			   </div>
  			 </div>
  			 
  			 
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>			
<?php include("03_foot.php") ?>