<?php 
// 连接数据库
$conn = mysqli_connect("localhost","root","");
// 判断是否连接成功
// if ($conn) {
// 	echo "<p class='pp'>连接成功</p>";

// }else{
// 	die ("<p class='pp'>连接失败!</p>".mysqli_connect_error());
// }

// 选择要操作的数据库
mysqli_select_db($conn,"student_dbs");

// 设置读取数据库的编码，不然显示汉字会乱码
mysqli_query($conn,"set names utf8");
// 执行sql语句
 ?>