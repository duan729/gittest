<?php 
$lid = empty($_GET['lid'])?"null":$_GET['lid'];
	if ($lid=="null") {
		die("请选择要修改的记录");
	}else{
		include("04_conn.php");
		// 找到班级的lid这行代码
		$sql="select * from new_column where id='{$lid}'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			$row = mysqli_fetch_assoc($result);
		}else{
			echo "没有数据";
		}
		mysqli_close($conn);
	}
 ?>
<?php include("01_head.php"); ?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("02_leftnemu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">栏目修改</p>
			<form class="sui-form form-horizontal sui-validate" action="new-column-save.php" method="post" id="form1">
			  <div class="control-group">
			    <label for="newcolumn" class="control-label">栏目录入：</label>
			    <div class="controls">
			      <input type="text" id="newcolumn" name="newcolumn" class="input-largea input-fat" placeholder="输入栏目" data-rules="required|minlength=2|maxlength=50"value='<?php echo  $row['name'] ; ?>'>
			       <input type="hidden" value="update" name="action">
			       <input type="hidden" value="<?php echo $row['id']; ?>" name="kid">
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