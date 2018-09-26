<?php include("01_head.php");
include "04_conn.php";

$hid = empty($_GET['hid'])?"null":$_GET['hid'];
if ($hid=="null") {
		die("请选择要修改的记录");
	}else{
		include("04_conn.php");
		// 找到班级的hid这行代码
		// 找到所有的栏目
		$sql = "select *from  new_column";
		$result = mysqli_query($conn, $sql);
		// 找到id为hid的news的数据
		$sql3="select * from news where id='{$hid}'";
		$result3 = mysqli_query($conn,$sql3);
		if (mysqli_num_rows($result3)>0) {
			$roo = mysqli_fetch_assoc($result3);
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
			<p class="sui-text-xxlarge my-padd">新闻录入</p>
			 <img src="<?php echo $roo['图片']; ?>" alt="" style="width: 150px;height: 150px; float: right; margin-right: 300px;">
			<form class="sui-form form-horizontal sui-validate" action="news-save.php" method="post" id="form1" enctype="multipart/form-data">
			  
			  <div class="control-group">
			    <label for="biaoti" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" id="biaoti" name="biaoti" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=255"
			      value="<?php echo $roo['标题']; ?>">
			      <input type="hidden" value="update" name="action">
			      <input type="hidden" value="<?php echo $roo['id']; ?>" name="kid">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jianti" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" id="jianti" name="jianti" class="input-large input-fat" placeholder="输入肩题" data-rules="required|minlength=2|maxlength=255"
			      value="<?php echo $roo['肩题']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="zuozhe" class="control-label">作者：</label>
			    <div class="controls">
			      <input type="text" id="zuozhe" class="input-large input-fat"  value="<?php echo $_SESSION['usname'] ?>" disabled='disabled'>
			      <input type="hidden" value="<?php echo $_SESSION['usid']  ?>" name="zuozhe">
			    </div>
			  </div>

			  <div class="control-group">
			    <label for="column" class="control-label">栏目：</label>
			    <div class="controls">
			     <!--  <input type="text" id="bjNumber" name="bjNumber" class="input-large input-fat"   placeholder="输入班号" data-rules="required"> -->
			     <select id="column" name="column">
					<?php
					if( mysqli_num_rows($result) > 0 ){
						while ( $row = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$row['id']}'>{$row['name']}</option>";
						}
					}else{
						echo "<option value=''>请先添加班级信息</option>";
					}
					 ?>     	
			     </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="fb_date" class="control-label">发布时间：</label>
			    <div class="controls">
			      <input type="text" id="fb_date" name="fb_date" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入发布时间" value="<?php echo $roo['发布时间']; ?>">
			    </div>
			 </div>

			 <div class="control-group">
			    <label for="sName" class="control-label">图片：</label>
			    <div class="controls">
			      <input type="file" name="file">
			     
			    </div>
			  </div>


			 


			 <div class="control-group">
			    <label class="control-label v-top"><b style="color: #f00;">*</b> <span style="padding:0 24px 0 0;">内</span>容：</label>
			    <div class="controls">
			      <textarea style="height: 190px;" class="input-xxlarge" name="neirong"><?php echo $roo['内容']; ?></textarea>
			      <div class="sui-msg msg-error msg-clear help-block">
			        <div class="msg-con">该项为必填项</div>
			        <s class="msg-icon"></s>
			      </div>
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
	