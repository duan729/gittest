<?php include("01_head.php") ?>		
<?php
include("04_conn.php");
// 更新数据
$sql = "select 课程编号,课程名,时间 from kecheng";
$result = mysqli_query($conn,$sql);
// 数据是否更新成功
// if ($result) {
// 	echo "更新成功</br>";
// }else{
// 	echo "更新失败</br>";
// }

// 关闭数据库
mysqli_close($conn);
?>

		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("02_leftnemu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程列表</p>
			<table class="sui-table table-primary"	>
				<tr>	
					<th>课程编码</th>
					<th>课程名</th>
					<th>时间</th>
					<th>操作</th>
				</tr>
				<?php 
					// 输出数据
				if (mysqli_num_rows($result) > 0 ) {
					while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>
  						 			 <td>{$row['课程编号']}</td>
   									 <td>{$row['课程名']}</td>
   						 			 <td>{$row['时间']}</td>
   					 	             <td>
										<a href='kecheng-update.php?kid={$row['课程编号']}'>修改</a>
										<a href='kecheng-save.php?kid={$row['课程编号']}'>删除</a>
   					 	             </td>
            						</tr>";
							}
				}else{
					echo "没有数据";
				}
				 ?>
				
			</table>
		  </div>
		</div>		
	<?php include("03_foot.php") ?>