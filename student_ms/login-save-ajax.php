<?php 
	session_start();
	include("03_conn.php");
		// 邮箱
		$email = empty($_REQUEST['email']) ? "null":$_REQUEST['email'];
	    // 密码
	    $password = empty($_REQUEST['password']) ? "null":$_REQUEST['password'];
	    // 首先据用户提交的邮件进行查询如果知道一条记录的话则邮件正确，否则邮箱不正确 
	    // $sql="select email,name,password,question,answer from user where email = '{$email}' and password='{$password}'";
	    $responseArr=array('code' => 200,'msg'=>"登录成功" );
	    $sql="select id,email,name,password,question,answer from user where email = '{$email}'";
	    // 如果邮箱正确的话，在判断用户提交的密码和上一步查询到密码是否相等相等则密码正确，否则密码不正确
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			$row = mysqli_fetch_assoc($result);
			// 查找数组里的密码是否和原来的一样
			if ($password==$row['password']) {
				$_SESSION['usemail'] = $row['email'];
				$_SESSION['usid'] = $row['id'];
				$_SESSION['usname'] = $row['name'];
			}else{
				// 密码对不上
				$responseArr['code'] =	20001;
				$responseArr['msg']  =	"密码错误";
			}
		}else{
			// 邮箱不存在
			$responseArr['code']=20004;
			$responseArr['msg']="邮件不存在";
		}
		// print_r($row);
		// print_r($responseArr);
		echo json_encode($responseArr);
	mysqli_close($conn);
 ?>