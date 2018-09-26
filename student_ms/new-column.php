		<?php include("01_head.php"); ?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("02_leftnemu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">栏目添加</p>
			<form class="sui-form form-horizontal sui-validate" action="new-column-save.php" method="post" id="form1">
			  <div class="control-group">
			    <label for="newcolumn" class="control-label">栏目录入：</label>
			    <div class="controls">
			      <input type="text" id="newcolumn" name="newcolumn" class="input-largea input-fat" placeholder="输入栏目" data-rules="required|minlength=2|maxlength=50" height=60px>
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