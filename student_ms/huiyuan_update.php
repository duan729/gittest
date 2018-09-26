<?php 
include("01_head.php");
$hid = empty($_GET['hid'])?"null":$_GET['hid'];
	if ($hid=="null") {
		die("请选择要修改的记录");
	}else{
		include("04_conn.php");
		// 找到班级的hid这行代码
		$sql="select * from user where id='{$hid}'";
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
			<p class="sui-text-xxlarge my-padd">会员信息修改</p>
			<form class="sui-form form-horizontal sui-validate" action="huiyuan_save.php" method="post">
			  <div class="control-group">
			    <label for="yhname" class="control-label">用户名：</label>
			    <div class="controls"> 
			    <input type="hidden" value="<?php echo $row['id']; ?>" name="kid">
			   	 <input type="hidden" value="update" name="action">
			      <input type="text" id="yhname" class="input-large input-fat"  placeholder="输入用户名" data-rules="required|minlength=2|maxlength=10" name="yhname" value="<?php echo $row['name']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="password" class="control-label">密码：</label>
			    <div class="controls">
			      <input type="text" id="password" class="input-large input-fat"  placeholder="输入密码" data-rules="required|minlength=2|maxlength=10" name="password" value="<?php echo $row['password']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="question" class="control-label">密保问题：</label>
			    <div class="controls">
			      <input type="text" id="question" class="input-large input-fat"  placeholder="输入密保问题" data-rules="required|minlength=2|maxlength=10" name="question" value="<?php echo $row['question']; ?>">
			    </div>
			  </div>
			  
			  <div class="control-group">
			    <label for="answer" class="control-label">密保答案：</label>
			    <div class="controls">
			      <input type="text" id="answer" class="input-large input-fat"  placeholder="输入班主任姓名" data-rules="required|minlength=2|maxlength=10" name="answer" value="<?php echo $row['answer']; ?>">
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