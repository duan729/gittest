<?php 
	include("04_conn.php");
	$cha = empty($_GET["cha"])? "null":$_GET["cha"];
	$tab = "news";
	$ccc=1;
	include("Tpage.php");
	$acc = array();
	if ($cha=="null"){
		$acc= $array;
	}else{
		$rrr="select * from news where id = {$cha}";
		// echo $rrr;
		$res= mysqli_query($conn, $rrr);
		if ( mysqli_num_rows($res)>0 ) {
			while( $arr = mysqli_fetch_assoc($res) ){
				// 将每条记录转换成数组,放到$array[]数组中
				$acc[] = $arr;
			}
		}
	}
	mysqli_close($conn);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>北京网络职业学院</title>
	<style>
		body{
			background-color: #f2f2f2;
		}
		*{
			margin: 0;
			padding: 0;
		}
		.head{
			height: 480px;
			background-size: 100% 100%;
			margin: 0 auto;
			background-image: url(upload/111.png); 
		}
		.foot{
			height: 400px;
			background-size: 100% 100%;
			margin: 0 auto;
			background-image: url(upload/112.png); 
		}
		.conent{
			width: 1300px;
			/*background-color: pink;*/
			margin: 0 auto;
			position: relative;
			height: 1000px;
		}
		.conent .baioti{
			width: 216px;
    		height: 570px;
    		background-image: url(upload/6.png);
    		background-size: 100% 100%;
    		position: absolute;
    		right: 50px;
    		top: -2px;

		}
		.column {
    width: 920px;
    height: 880px;
    position: absolute;
    left: 50px;
    top: 75px;
    background-color: white;
    /*display: none;*/
    border-top: 3px solid #1867a5;}
    .oot{
    	margin: 0 auto;
    	width: 920px;
    	height: 50px;
    	line-height: 50px;
    	text-align: center;
    	position:absolute;
    	bottom: 20px;
    }
    .oot a{
    	color: black;
    	text-decoration: none;
    }
    .oot a:hover{
    	color: #1867a5;
    }
    .lanmu{
    	width: 201px; 
    	/*border: 1px solid black;*/
   	 	height: 40px;
   	 	text-align: center;
   	 	line-height: 40px;
    	position: relative;
    	left: 140px;
    	top: 41px;
    	font-size: 25px;
    	font-weight: 800;
    	color: #1867a5;
    }
    .column .wenben h4{
		color: #1867a5;
		font-weight: 600;
		padding:10px 0 0 50px;
    }
    .column .wenben h2{
		font-weight:550;
		padding:5px 0 0 30px;
		font-size: 21px;
    }
    .column .wenben img{
		width: 750px;
    height: 449px;
    position: absolute;
    left: 85px;
    top: 350px;
    }
    .column .wenben .neirong{
    	    position: absolute;
    	left: 85px;
    	margin-top: 20px;
    	width: 710px;
    	
    	height: 230px;
   	 /*background-color: red;*/
    	text-indent: 20px;
    	font-size: 18px;
    
    	color: 19px;
    padding: 5px 0 0 30px;
    }
	</style>
</head>
<body>
<!-- 页头	 -->
	<div class="head"></div>
	<div class="lanmu">
		<?php
                    foreach($acc as $key=>$values){
                    	$sss ="select * from new_column where id = {$values['columnid']}";
                    	include("04_conn.php");
                    	$ree=mysqli_query($conn,$sss);
							if (mysqli_num_rows($ree) > 0 ) {
								$rww = mysqli_fetch_assoc($ree); 
								echo $rww['name'];
							}
							mysqli_close($conn);
					}
                    ?>
	</div>
	<div class="conent">
		<div class="column">
         	<div class="wenben">
         	<?php  
         		foreach($acc as $key=>$values){
                        echo "<h2>{$values["标题"]}</h2>";
                        echo "<h4>{$values["发布时间"]}</h4>";
                        echo "<div class='neirong'>{$values["内容"]}</div>";
                        echo "<img src='{$values["图片"]}' alt=>";
                    }
               ?>
         	</div>
			<div class="oot">
			<?php include("b1page.php"); ?> 
			</div>	
		</div>
		<div class="baioti">
			
		</div>
	</div>	
<!-- 页脚 -->
	<div class="foot"></div>
</body>
</html>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
	