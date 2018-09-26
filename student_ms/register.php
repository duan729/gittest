	<?php include("01_head1.php"); ?>
			<form class="sui-form form-horizontal sui-validate .sui-validate" id="f1">
				  <div class="control-group" style="padding-bottom: 0; margin-bottom: 0; ">
				    <label for="inputEmail " class="control-label .input-fat">邮箱：</label>
				    <div class="controls">
				      <input type="text" id="inputEmail" placeholder="请输入邮箱" class="input-fat input-large" name="email" data-rules="required|minlength=2|maxlength=30|email">
				    </div>
				  </div>
				  <div class="control-group" style="padding: 0; margin: 0; ">
				    <label for="inputEmail " class="control-label .input-fat"></label>
				    <div class="controls">
				      <span id="error0" style="color: red;  width: 200px; height: 20px; display: inline-block; line-height: 20px; text-align: right;"></span>
				    </div>
				  </div>
				  <div class="control-group">
				    <label for="userm " class="control-label .input-fat">用户名：</label>
				    <div class="controls">
				      <input type="text" id="userm" placeholder="请输入用户名" class="input-fat input-large" name="userm" data-rules="required|minlength=2|maxlength=6|required"  data-error-msg="昵称必须是2-6位" data-empty-msg="亲，昵称别忘记填了">
				    </div>
				  </div>

				  <div class="control-group">
				    <label for="password" class="control-label">密码：</label>
				    <div class="controls">
				      <input type="password" id="password" placeholder="请输入密码	" class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=2|maxlength=12|">
				    </div>
				  </div>

				  <div class="control-group">
				    <label for="word" class="control-label">重复密码：</label>
				    <div class="controls">
				      <input type="password" id="word" placeholder="请输入重复密码	" class="input-fat input-large" name="word"data-rules="required|minlength=2|maxlength=12|match=password">
				    </div>
				  </div>

				<div class="control-group">
				    <label for="yzm" class="control-label">验证码：</label>
				    <div class="controls">
				      <input type="input" id="yzm" placeholder="请输入重复密码	" class="input-fat input-large" data-rules="required|minlength=4|maxlength=4">
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
				    	 <button type="submit" class="sui-btn btn-primary" id="cha">立即注册</button>
				    </div>
				  </div>
				</form>
<?php include("02_foot1.php") ?>
<script>
$("#inputEmail").on("blur",function(){
	$.get("register-save.php",
	{"email":$("input[name=email]").val()},
	function(data){
		console.log(data.code);
		if (data.code==200){
			$("#error0").text("此邮件可以注册");
			$("input:gt(0)").attr("disabled",false);
		}else{
			$("#error0").text("此邮件已重复注册");
			$("input:gt(0)").attr("disabled",true);
			$("input:gt(0)").attr("disabled",true);
			$("input:lt(1)").focus();
		}
	},
	"json"
	);
});

$("#cha").on("click",function(){
	if($("#yzm").val().toUpperCase()==$("#code_btn").text().toUpperCase()){
		$.ajax({
			url:"register-save.php",
			type:"POST",
			data:$("#f1").serialize(),
			dataType:"json",
			success:function(data,textStatus){
				if (data.code=="200"){
					document.cookie = "email="+ $("#inputEmail").val()+";";
					document.cookie = "password="+ $("#password").val()+";";
					$(".nen").empty().css({"color":"black","fontSize":"26px","textAlign":"center","lineHeight":"650px"}).html("注册成功请稍后....");
					// 延迟跳转
					setTimeout(function(){
						window.location.href=("login.php");
					},350);
				}
	 
			},
			error:function(XMLHttpRequest,textStatus,errorThrown){
				console.log("失败原因："+errorThrown);
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
})







// var code_btn=document.getElementById('code_btn');
// 	getCodeFn();
// 	code_btn.onclick=getCodeFn;
// function getCodeFn(){
// 	var strArry=["0","1","2","3","4","5","6","7","8","9","a","b",'c','d','e','f','h','i','g','k','l','m','m','o','p','q','r','s','t','u','v','w','x','y','z',"A","B",'C','D','E','F','G','I','G','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
// 	var code_str="",num;
// 	for (var i = 0; i <4; i++) {
// 		num=parseInt(Math.random()*strArry.length);
// 		code_str+=strArry[num];
		
// 	}
// 	code_btn.value=code_str;

// }

	var cha=document.getElementById('cha');
	var yzm=document.getElementById('yzm');
	
	cha.onclick=function(){	
	var neirong=yzm.value.toUpperCase();	
		// var yzm_in=yzm.Value;
		
	}
	
	


</script>
</script>
