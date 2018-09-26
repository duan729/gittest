	<?php include("01_head1.php"); ?>
		<form class="sui-form form-horizontal sui-validate"  id="form1">

				  <div class="control-group">
				    <label for="inputEmail " class="control-label .input-fat">邮箱：</label>
				    <div class="controls">
				      <input type="text" id="inputEmail" placeholder="请输入邮箱" class="input-fat input-large" name="email" data-rules="required|minlength=2|maxlength=30">
				    </div>
				  </div>
				

				  <div class="control-group">
				    <label for="password" class="control-label">密码：</label>
				    <div class="controls">
				      <input type="password" id="password" placeholder="请输入密码	" class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=6|maxlength=15">
				    </div>
				  </div>

				  
				<div class="control-group">
				    <label for="yzm" class="control-label">验证码：</label>
				    <div class="controls">
				      <input type="input" id="yzm" placeholder="请输入验证码" class="input-fat input-large" name="yzm" data-rules="required|minlength=4|maxlength=4">
				    </div>
				    
				  </div>
				 <div class="control-group" style="margin: 0; padding: 0;">
				    <div class="controls">
				      <div id="code_btn" style="display: inline-block;"></div><div id="code_b"></div>
				    </div>
				  </div>

				  <div class="control-group">
				    <label class="control-label"></label>
				    <div class="controls">
				      <button type="submit" class="sui-btn btn-primary" id="cha" style="width: 200px; height: 30px; font-size:20px; letter-spacing:5px; color: #000;">登录</button>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label"></label>
				    <div class="controls">
				      <a href="forget.php">忘记密码</a>
				    </div>
				  </div>
				</form>
				<p class="pp"></p>
<?php include("02_foot1.php") ?>
<script>
function getCookie(name){
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg)){
	return unescape(arr[2]);
	}else{
	return null;}
}
// 判断cook是否存在
var c_start = document.cookie.indexOf("email=");
 if(c_start == -1){
  	
 }else{
  $("#inputEmail").val(getCookie("email"));
  $("#password").val(getCookie("password"));
 }

$("button[type=submit]").bind("click",function(){
// 使用$.Ajax()提交数据
if($("#yzm").val().toUpperCase()==$("#code_btn").text().toUpperCase()){
	$.ajax({
		url:"login-save-ajax.php",
		type:"POST",
		data:$("#form1").serialize(),
		dataType:"json",
		// beforeSend:function(XMLHttpRequest){
		// 	//提交前的函数，一般在此编写检测代码或者loading
		// 	// this.type 要提交的类型
		// 	console.log("beforeSend-XMLHttpRequest:"+XMLHttpRequest);
		// },
		// complete:function(XMLHttpRequest,textStatus){
		// 	//请求完成后调用此函数(请求成功或失败都调用)
		// 	// 第二个参数是状态
		// },
		success:function(data,textStatus){
			console.log(data);
			if (data.code==200){
				$(".pp").html("登录成功").fadeToggle(300).animate({"color":"black"},300,function(){
					$(".nen").stop().animate({"height":"0px","top":"-597px","opcity":"0"},600,function(){
						window.location.href=("index1.php");
					});	
				});
			}
			if (data.code==20001) {
				$(".pp").html("密码错误").fadeToggle(300);
			}
			if (data.code==20004) {
				$(".pp").html("邮箱填写错误").fadeToggle(300);
			}
			// $(".pp").slideUp(500);
			$(".pp").fadeToggle(300);
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
