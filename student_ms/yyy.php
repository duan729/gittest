<?php
   function getrandstr(){
	$str='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
	$randStr = str_shuffle($str);//打乱字符串
	$rands= substr($randStr,0,4);//substr(string,start,length);返回字符串的一部分
	return $rands;
	}
	echo getrandstr();
?>