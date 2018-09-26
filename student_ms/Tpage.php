<?php 
$allNum = allNews($tab); //总记录数 allnews()底下封装了一个函数

$pageSize = $ccc; //约定每页显示几条信息 固定显示的数值

$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];//默认从1开始


$endPage = ceil($allNum/$pageSize); //总页数
//ceil 向上舍入为最接近的整数：
$array = news($tab,$pageNum,$pageSize); //根据页码得到分页记录

//显示总记录数的函数
function allNews($aaa)
{	
	global $conn;
	 //在里面声明为全局变量
	$sql2 = "select count(*) as allnum from ".$aaa; //可以显示出总页数
	// 用count来统计有多少条页数 
	$r = mysqli_query($conn, $sql2);
	// 统计到的话定义添加到一个对象里面
	$obj = mysqli_fetch_assoc($r);
	// 返回obj的变量因为用as所以统计以后就用一个备注返回
	return $obj["allnum"];
}



//分页的函数
function news($bbb,$pageNum = 1, $pageSize){
	// 函数体内定义的global变量,函数体内可以使用,在函数体外定义的global变量不能在函数体内使用
	global $conn;
	// 定义了一个空的数组保存信息
    $array = array();
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from ".$bbb." limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($conn, $rs);
    while ($obj = mysqli_fetch_assoc($r)) {
        $array[] = $obj;
        //var_dump($array);
    }
    return $array;
}
?>