<div>
		总计：<?php echo $allNum; ?>条记录
		<a href="?pageNum=1<?php echo "&update={$up}"; ?>">首页</a>
		<a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1);echo "&update={$up}";?>">上一页</a>
		<?php
			for($i = 1 ; $i <= $endPage ; $i++){
				// 给pageNum传入值
				echo "<a href=?pageNum={$i}&update={$up}>{$i}</a>&nbsp";
				}
		?>			    
		<a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1);echo "&update={$up}";?>">下一页</a>
		<a href="?pageNum=<?php echo $endPage;echo "&update={$up}";?>">尾页</a>
</div>
	