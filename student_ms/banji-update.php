<?php 
include("01_head.php");
$kid = empty($_GET['kid'])?"null":$_GET['kid'];
	if ($kid=="null") {
		die("请选择要修改的记录");
	}else{
		include("04_conn.php");
		// 找到班级的kid这行代码
		$sql="select * from banji where 班号='{$kid}'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			$row = mysqli_fetch_assoc($result);
		}else{
			echo "没有数据";
		}
		mysqli_close($conn);
	}
 ?>
 <div class="sui-layout">
		  <div class="sidebar">
		  <!-- 左菜单 -->
			<?php include("02_leftnemu.php"); ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级信息录入</p>
			<form class="sui-form form-horizontal sui-validate" action="banji-save.php" method="post">
			  
			   
			  
			  <div class="control-group">
			    <label for="banzhang" class="control-label">班长：</label>
			    <div class="controls"> 
			    <input type="hidden" value="<?php echo $row['班号']; ?>" name="kid">
			   	 <input type="hidden" value="update" name="action">
			      <input type="text" id="banzhang" class="input-large input-fat"  placeholder="输入班长姓名" data-rules="required|minlength=2|maxlength=10" name="bzName" value="<?php echo $row['班长']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jiaoshi" class="control-label">教室：</label>
			    <div class="controls">
			      <input type="text" id="jiaoshi" class="input-large input-fat"  placeholder="输入教室" data-rules="required|minlength=2|maxlength=10" name="jsName" value="<?php echo $row['教室']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">班主任：</label>
			    <div class="controls">
			      <input type="text" id="banzhuren" class="input-large input-fat"  placeholder="输入班主任姓名" data-rules="required|minlength=2|maxlength=10" name="bzrName" value="<?php echo $row['班主任']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kh" class="control-label">班级口号：</label>
			    <div class="controls">
			      <input type="text" id="kh" class="input-large input-fat"  placeholder="输入班级口号" data-rules="required|minlength=2|maxlength=20" name="khName" value="<?php echo $row['班级口号']; ?>">
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