<?php 
	session_start();
	include("03_conn.php");
		// 邮箱
		$email = empty($_REQUEST['email']) ? "null":$_REQUEST['email'];
	    // 密码提示
	    $question = empty($_REQUEST['question']) ? "null":$_REQUEST['question'];
	    // 答案
	    $answer = empty($_REQUEST['answer']) ? "null":$_REQUEST['answer'];
	    // 选择有没有邮件名称一样的
	    $responseArr=array('code' => 200,'msg'=>"登录成功" );
	    $sql="select * from user where email = '{$email}'";
	     // and question='{$question}' and answer='{$answer}'
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
			if ($question==$row['question']) {
				if ($answer==$row['answer']) {
					$_SESSION['usemail'] = $row['email'];
					$_SESSION['usid'] = $row['id'];
					$_SESSION['usname'] = $row['name'];
				}else{
					$responseArr['code']=20001;
					$responseArr['msg']="答案不正确";
				}
			}else{
				$responseArr['code']=20003;
				$responseArr['msg']="提示文本不存在";
			}
			// var_dump($row);
		}else{
			// 邮箱不存在
			$responseArr['code']=20004;
			$responseArr['msg']="邮件不存在";
		}
		echo json_encode($responseArr);
	mysqli_close($conn);
?>