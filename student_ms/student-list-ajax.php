<?php include "01_head.php" ?>
    <div class="sui-layout">
      <div class="sidebar">
<?php include "02_leftnemu.php" ?>     
      </div>
      <div class="content">
      <p class="sui-text-xxlarge my-padd label-success">学生信息管理</p>
      <table class="sui-table table-bordered">
        <thead>
          <tr>
            <th>序号</th>
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>生日</th>
            <th>电话</th>   
            <th>操作</th>
          </tr>
        </thead>
        <tbody id="studentlist">

        </tbody>        

      </table>
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
  <div><span>共10页&nbsp;</span><span>
      到
      <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
      页</span></div>
</div>
      </div>
    </div>    
  </div>
</body>
</html>
<?php include "03_foot.php"; ?>
<script>
$(function(){
  $.ajax({
    url:"news-page.php",
    type:"POST",
    dataType:"json",
    data:{
      "action":"student"
    },
    beforeSend:function(XMLHttpRequest){
      $("#studentlist").html("<tr><td>正在查询，请稍后...</td></tr>");
    },
    success:function(data,textStatus){
      console.log( data );
      if( data.code == 200 ){
        //渲染分页条
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
    error: function(XMLHttpRequest,textStatus,errorThrown){
      //请求失败后调用此函数
      console.log( "失败原因：" + errorThrown );
    }
  });
});

function getPage(pageNum){
  $.ajax({
    url:"news-page.php",
    type:"POST",
    dataType:"json",
    data:{
      "action":"student",
      "pageNum":pageNum,
      "pageSize":6
    },
    success:function(data,textStatus){
      // console.log( data );
      if( data.code == 200 ){
        renderList(data.data);
      }
    } 
  })
}

function renderList(datalist){
  $("#studentlist").empty();
  for (var i = 0; i < datalist.length; i++) {
           $trs=$("<tr></tr>");
                    $a1=$("<td><a class='sui-btn btn-small btn-warning' href='student-update.php?kid="+datalist[i].id+"'>修改</a>   <a class='sui-btn btn-small btn-danger' href='student-save.php?kid="+datalist[i].id+"'>删除</a></td>");
                    for(var j in datalist[i]){
                          $tds=$("<td></td>");
                      if (j=="性别"){
                         if (datalist[i].性别==0) {
                              $tds.html("女");
                         }else{
                              $tds.html("男");
                         }
                      }else{
                        $tds.html(datalist[i][j]);

                      }
                      $trs.append($tds);
                      $trs.append($a1);
                    }
                    $("#studentlist").append($trs); 
                  } 
}
</script>