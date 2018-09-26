<?php 
	include("03_conn.php");
		// 邮箱
		$email = empty($_REQUEST['email']) ? "null":strtolower($_REQUEST['email']);
		// 用户名
	    $userm = empty($_REQUEST['userm']) ? "null":$_REQUEST['userm'];
	    // 密码
	    $password = empty($_REQUEST['password']) ? "null":$_REQUEST['password'];
	    // 密码提示
	    $question = empty($_REQUEST['question']) ? "null":$_REQUEST['question'];
	    // 答案
	    $answer = empty($_REQUEST['answer']) ? "null":$_REQUEST['answer'];
	    $responseArr=array('code' => 200,'msg'=>"注册成功" );
		if ($password=="null" && $answer=="null" && $userm=="null") {
			 // 选择有没有邮件名称一样的
		    $sql="select email,name,password,question,answer from user where email = '{$email}'";
			$rcc = mysqli_query($conn,$sql);
			if (mysqli_num_rows($rcc) >=1) {
				$responseArr['code']= 20002;
				$responseArr['msg']= "邮件已重复";
			}else{

			}
		}else{
			$sql="insert into user(email,name,password,question,answer) value('$email','$userm','$password','$question','$answer')";
			$result = mysqli_query($conn,$sql);
			if ($result) {

			}else{
				$responseArr['code']= 201;
				$responseArr['msg']= "操作不成功";
			}
		}
	echo json_encode($responseArr);
	mysqli_close($conn);
 ?>