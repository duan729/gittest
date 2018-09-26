	<?php include("01_head1.php"); ?>
			<form class="sui-form form-horizontal sui-validate" id="form1">
				  <div class="control-group">
				    <label for="inputEmail " class="control-label .input-fat">邮箱：</label>
				    <div class="controls">
				      <input type="text" id="inputEmail" placeholder="请输入邮箱" class="input-fat input-large" name="email" data-rules="required|minlength=2|maxlength=30">
				    </div>
				  </div>
				<div class="control-group">
				    <label for="yzm" class="control-label">验证码：</label>
				    <div class="controls">
				      <input type="input" id="yzm" placeholder="请输入重复密码	" class="input-fat input-large" name="yzm" data-rules="required|minlength=0|maxlength=4">
				    </div>
				  </div>
				  <div class="control-group" style="margin: 0; padding: 0;">
				    <div class="controls">
				      <div id="code_btn" style="display: inline-block;"></div><div id="code_b"></div>
				    </div>
				  </div>
				 <div class="control-group">
			    <label for="question" class="control-label">密码提示问题：</label>
			    <div class="controls">
			     <select id="question" name="question">
						<option value="你的小学在哪上学">你的小学在哪上学</option>
						<option value="你的最好朋友的姓名">你的最好朋友的姓名</option>
						<option value="你最有纪念意义的日期">你最有纪念意义的日期</option>
			     </select>
			    </div>
			  </div>
				<div class="control-group">
				    <label for="answer " class="control-label .input-fat">密码答案：</label>
				    <div class="controls">
				      <input type="text" id="answer" placeholder="请输入密码答案" class="input-fat input-large" name="answer" data-rules="required|minlength=2|maxlength=15">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label"></label>
				    <div class="controls">
				      <button type="submit" class="sui-btn btn-primary" id="cha">提交</button>
				    </div>
				  </div>
				</form>
				<p class="pp"></p>
<?php include("02_foot1.php") ?>
<script>
	$("#cha").bind("click",function(){
		if($("#yzm").val().toUpperCase()==$("#code_btn").text().toUpperCase()){
		$.ajax({
		url:"forget-save.php",
		type:"POST",
		data:$("#form1").serialize(),
		dataType:"json",
		success:function(data,textStatus){
			console.log(data);
			if (data.code==200){
				$(".pp").html("登录成功").slideDown(200).animate({"color":"black"},300,function(){
					$(".nen").stop().animate({"height":"0px","top":"-597px","opcity":"0"},600,function(){
						window.location.href=("index1.php");
					});	
				});
			}
			if (data.code==20003) {
				$(".pp").html(data.msg).slideDown(300);
			}
			if (data.code==20001) {
				$(".pp").html(data.msg).slideDown(300);
			}
			if (data.code==20004) {
				$(".pp").html(data.msg).slideDown(300);
			}
			yyy();
			$(".pp").slideUp(500);
			// console.log("success-textStatus:"+textStatus);
			// 请求成功后调用此函数
		},
		error:function(XMLHttpRequest,textstatus,errorThrown){
			// 请求失败后调用此函数
			console.log("失败原因："+errorThrown)

		}
	});
	

}else if($("#yzm").val()==""){
	$("#code_b").text("请输入验证码");
	yyy();
	$("#yzm").val("").focus();
}else{
	$("#code_b").text("验证有误");
	yyy();
	$("#yzm").val("").focus();
}
return false;
});
</script>