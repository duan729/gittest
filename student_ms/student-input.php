<?php include("01_head.php") ;

include "04_conn.php";
$sql = "SELECT DISTINCT 班号 FROM banji";
$result = mysqli_query($conn, $sql);
mysqli_close($conn)
?>		
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("02_leftnemu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生录入</p>
			<form class="sui-form form-horizontal sui-validate" action="student-save.php" method="post">
			  <div class="control-group">
			    <label for="st_xuehao" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="st_xuehao" name="st_xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="st_banhao" class="control-label">班号：</label>
			    <div class="controls">
			     <!--  <input type="text" id="bjNumber" name="bjNumber" class="input-large input-fat"   placeholder="输入班号" data-rules="required"> -->
			     <select id="st_banhao" name="st_banhao">
					<?php
					if( mysqli_num_rows($result) > 0 ){
						while ( $row = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$row['班号']}'>{$row['班号']}</option>";
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
      				<input type="text" id="st_Name" name="st_Name" placeholder="姓名" data-rules="required|minlength=2|maxlength=6">
   			   </div>
  			 </div>
  			  <div class="control-group">
    			 <label for="st_gender" class="control-label">性别：</label>
    			 <div class="controls">
     				 <label data-toggle="radio" class="radio-pretty inline checked">
       				 	<input type="radio" checked="checked" name="st_gender" value="1" checked="checked"><span>男</span>
      				 </label>
     			 	<label data-toggle="radio" class="radio-pretty inline">
       				 	<input type="radio" name="st_gender" value="0"><span>女</span>
     			 	</label>
    			</div>
  			 </div>
  			 <div class="control-group">
			    <label for="st_date" class="control-label">出生日期：</label>
			    <div class="controls">
			      <input type="text" id="st_date" name="st_date" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入出生日期">
			    </div>
			 </div>	

  			  <div class="control-group">
    			<label for="st_sjh" class="control-label">手机号码：</label>
    			<div class="controls">
     				 <input type="text" id="st_sjh" placeholder="mobild" data-rules="required|mobile" name="st_sjh">
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
		<script>
			console.log(document.cookie);
			var  str = "3215456465";
			// str.split(";");
			console.log(str.split(";"));
		</script>
	<?php include("03_foot.php") ?>