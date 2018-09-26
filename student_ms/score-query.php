<?php 
	include("01_head.php");
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
			<p class="sui-text-xxlarge my-padd">成绩查询</p>
			<form class="sui-form form-horizontal sui-validate" action="score-list.php" method="post" id="form1">
			  <div class="control-group">
			    <label for="st_xm" class="control-label">姓名:</label>
			    <div class="controls">
			      <input type="hidden" value="chaxun" name="st_cx">
			      <input type="text" id="st_xm" name="st_xm" class="input-large input-fat" placeholder="输入姓名">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="xuehao" class="control-label">学号:</label>
			    <div class="controls">
			      <input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号">
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
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
	<?php include("03_foot.php") ?>

		
		