<?php include("01_head.php") ;

include ("04_conn.php");
$sql = "SELECT DISTINCT 课程编号,课程名 FROM kecheng";
// $sql1 = "SELECT DISTINCT  FROM kecheng";
$result = mysqli_query($conn, $sql);
mysqli_close($conn)
?>		
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("02_leftnemu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩录入</p>
			<form class="sui-form form-horizontal sui-validate" action="chengji-save.php" method="post">
			  <div class="control-group">
			    <label for="xuehao" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kecm" class="control-label">课程名：</label>
			    <div class="controls">
			     <!--  <input type="text" id="bjNumber" name="bjNumber" class="input-large input-fat"   placeholder="输入班号" data-rules="required"> -->
			     <select id="bjNumber" name="kecm">
					<?php
					if( mysqli_num_rows($result) > 0 ){
						while ( $row = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$row['课程编号']}'>{$row['课程名']}</option>";
						}
					}else{
						echo "<option value=''>请先添加课程信息</option>";
					}
					 ?>     	
			     </select>
			    </div>
			  </div>


			  <div class="control-group">
    			<label for="chengji" class="control-label">成绩：</label>
   			   <div class="controls">
      				<input type="text" id="chengji" name="chengji" placeholder="请输入成绩" data-rules="required|minlength=2|maxlength=6">
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