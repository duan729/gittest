 <?php include("01_head.php"); ?>
<style>
	.st_head{
		display: none;
	}	
</style>
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("02_leftnemu.php"); ?>	
		  </div>
		  <div class="content">
				<div class="journalism">
					<ul id="ulss">
						
					</ul>
				</div>
				<div class="test sui-pagination pagination-large">
					  <ul>
						    <li class="prev disabled"><a href="#">«上一页</a></li>
						    <li class="active"><a href="#">1</a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li><a href="#">4</a></li>
						    <li><a href="#">5</a></li>
						    <li class="dotted"><span>...</span></li>
						    <li class="next"><a href="#">下一页»</a></li>
					  </ul>
	  				  <div><span>共10页&nbsp;</span><span>到
	      			  <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
	      				页</span></div>
				</div>
		  </div>
		</div>		
<?php include("03_foot.php") ?>
<script>
	$(function(){
		// 页面移入效果
		$(".st_head").animate({"top":"3px"},600,function(){
			$(".st_head").slideDown(200);
	});

	
	});
	$.ajax({
	      url:"news-page.php",
	      type:"POST",
	      data:{
	        "action":"news"
	      },
	      dataType:"json",
	      beforeSend:function(XMLHttpRequest){
	        // $("#studentlist").html("正在查询请稍后.......");
	      },
	      success:function(data,textStatus){
		       if (data.code==200) {
		       		$('.test').pagination({
				    pageSize:6,//每页显示条数
				    itemsCount:data.count,//获取记录总条数
				    styleClass: ['pagination-large'],
				    displayPage:5,
				    showCtrl: true,
				    onSelect: function (num) {
				    	console.log( num );
				        getPage(num);
				    }        
					});
					//渲染第一页数据
					renderList(data.data);
		       }
      	   }, 
	      error:function(XMLHttpRequest,textstatus,errorThrown){
	        console.log("失败原因".errorThrown);
	      }
    });

    function getPage(pageNum){
		$.ajax({
			url:"news-page.php",
			type:"POST",
			dataType:"json",
			data:{
				"action":"news",
				"pageNum":pageNum,
				"pageSize":6
			},
			success:function(data,textStatus){
				console.log( data );
				if( data.code == 200 ){
					renderList(data.data);
				}
			}	
		})
	}

    function renderList(datalist){
    	$("#ulss").empty();
		for (var i = 0; i < datalist.length; i++) {
			var $dat = $("<li><a href='beiwang.php?cha="+datalist[i].id+"'><h3>"+datalist[i].标题+"</h3><img src='"+datalist[i].图片+"'  /><h6>"+datalist[i].发布时间+"|"+datalist[i].columnid+"</h6><span>"+datalist[i].内容+"</span></a></li>");
		   	$("#ulss").append($dat);
		  }	
	}
</script>
