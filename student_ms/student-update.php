<?php include("01_head.php") ?>		

	<?php 
		$kid = empty($_GET['kid'])?"null":$_GET['kid'];
		if ($kid == "null") {
			die("请选择要修改的记录");
		}else{
			include("04_conn.php");
			// 找到课程编号是kid的这行代码
			$sql ="select * from student where id = '{$kid}'";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0 ) {
				// 将查询的结果转换为下列数组
				$row = mysqli_fetch_assoc($result);
			}else{
					echo "没有数据";
			}
			$sql1 = "SELECT DISTINCT 班号 FROM banji";
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
			<p class="sui-text-xxlarge my-padd">学生修改</p>
			<form class="sui-form form-horizontal sui-validate" action="student-save.php" method="post">
			  <div class="control-group">
			    <label for="st_xuehao" class="control-label" >学号：</label>
			    <div class="controls">
			     <input type="hidden" value="<?php echo $row['id']; ?>" name="kid">
			   	 <input type="hidden" value="update" name="action">
			   	 
			      <input type="text" id="st_xuehao" name="st_xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row['学号']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="bjNumber" class="control-label" >班号：</label>
			    <div class="controls">
			     <!--  <input type="text" id="bjNumber" name="bjNumber" class="input-large input-fat"   placeholder="输入班号" data-rules="required"> -->
			     <select id="bjNumber" name="st_banhao">
			     	<option value="<?php echo $row['班号']; ?>"><?php echo $row['班号']; ?></option>
					<?php
					if( mysqli_num_rows($result1) > 0 ){
						while ( $row1 = mysqli_fetch_assoc($result1) ) {
							if ($row['班号'] !== $row1['班号']) {
								echo "<option value='{$row1['班号']}'>{$row1['班号']}</option>";
							}
						}
					}else{
						echo "<option value=''>请先添加班级信息</option>";
					}
					 ?>     	
			     </select>
			    </div>
			  </div>


			  <div class="control-group">
    			<label for="st_Name" class="control-label">姓名：</label>
   			   <div class="controls">
      				<input type="text" id="st_Name" name="st_Name" placeholder="姓名" data-rules="required|minlength=2|maxlength=6" value="<?php echo $row['姓名']; ?>">
   			   </div>
  			 </div>
  			  <div class="control-group">
    			 <label for="st_gender" class="control-label">性别：</label>
    			 <div class="controls">
     				 <label data-toggle="radio" class="radio-pretty inline <?php if($row['性别']=="1") { echo 'checked';} ?>">
       				 	<input type="radio" name="st_gender" value="1" <?php if($row['性别']=="1") { echo 'checked=checked';} ?>><span>男</span>
      				 </label>

     			 	<label data-toggle="radio" class="radio-pretty inline <?php if($row['性别']=="0") { echo 'checked';} ?>">
       				 	<input type="radio" name="st_gender" value="0" <?php if($row['性别']=="0") { echo 'checked=checked';} ?>><span>女</span>
     			 	</label>
    			</div>
  			 </div>
  			 <div class="control-group">
			    <label for="st_date" class="control-label">出生日期：</label>
			    <div class="controls">
			      <input type="text" id="st_date" name="st_date" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入出生日期" value="<?php echo $row['出生日期']; ?>">
			    </div>
			 </div>	

  			  <div class="control-group">
    			<label for="st_sjh" class="control-label">手机号码：</label>
    			<div class="controls">
     				 <input type="text" id="st_sjh" placeholder="mobild" data-rules="required|mobile" name="st_sjh" value="<?php echo $row['电话']; ?>">
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