<?php 
	include("01_head.php");
?>		
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("02_leftnemu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息查询</p>
			<form class="sui-form form-horizontal sui-validate" action="st-list.php" method="post" id="form1">
			  
			  <div class="control-group">
			    <label for="xuehao" class="control-label">学号:</label>
			    <div class="controls">
			      <input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="st_xm" class="control-label">姓名:</label>
			    <div class="controls">
			      <input type="hidden" value="chaxun" name="st_cx">
			      <input type="text" id="st_xm" name="st_xm" class="input-large input-fat" placeholder="输入姓名">
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
		  <?php include("03_foot.php") ; ?> 
		  

		
		