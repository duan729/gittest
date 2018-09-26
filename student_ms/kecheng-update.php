<?php include("01_head.php"); ?>		
	<?php 
		$kid = empty($_GET['kid'])?"null":$_GET['kid'];
		if ($kid == "null") {
			die("请选择要修改的记录");
		}else{
			include("04_conn.php");
			// 找到课程编号是kid的这行代码
			$sql ="select * from kecheng where 课程编号 =".$kid;
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0 ) {
				// 将查询的结果转换为下列数组
				$row = mysqli_fetch_assoc($result);
			}else{
					echo "没有数据";
			}
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
			<p class="sui-text-xxlarge my-padd">课程修改</p>
			<form class="sui-form form-horizontal sui-validate" action="kecheng-save.php" method="post" id="form1">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程名：</label>

			    <div class="controls">  
			    <!-- 曾加一个隐藏的div，用来区分新增数据还是修改数据 -->
			      <input type="hidden" value="update" name="action">

			      <input type="hidden" value="<?php echo $row['课程编号']; ?>" name="kid">

			      <input type="text" value="<?php echo $row['课程名']; ?>" id="kcName" name="kcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程时间：</label>
			    <div class="controls">
			      <input type="text" id="kcTime" name="kcTime" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入课程时间" value="<?php echo $row['时间']; ?>">
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
<?php include("03_foot.php"); ?>