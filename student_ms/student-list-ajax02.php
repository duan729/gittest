<!-- 头部开始 -->
<?php include("01_head.php"); ?>
<div class="sui-layout">
      <div class="sidebar">
      <!-- 左菜单 -->
      <?php include("02_leftnemu.php"); ?>  
      </div>
      <div class="content">
      <p class="sui-text-xxlarge my-padd">会员管理</p>
      <table class="sui-table table-primary">
            <tr>
             <th>id</th>
             <th>学号</th>
             <th>班号</th>
             <th>姓名</th>
             <th>姓别</th>
             <th>出生日期</th>
             <th>电话</th>
             <th>操作</th>
            </tr>
            <tbody id="studentlist">
              
            </tbody>                   
        </table>
      </div>
    </div>  
<!-- 底部 -->
<?php include("03_foot.php"); ?>
<!-- <script type="text/html" id="template1">
  {{each arr val idx}}
    <tr>
      <td>{{val.id}}</td>
      <td>{{val.学号}}</td>
      <td>{{val.班号}}</td>
      <td>{{val.姓名}}</td>
      <td>{{val.性别}}</td>
      <td>{{val.出生日期}}</td>
      <td>{{val.电话}}</td>
    </tr>
  {{/each}}
</script> -->
<script>
  // $(function(){
  //   $.ajax({
  //     url:"student-list-save.php",
  //     type:"POST",
  //     data:{
  //       "action":"student"
  //     },
  //     dataType:"json",
  //     beforeSend:function(XMLHttpRequest){
  //       $("#studentlist").html("正在查询请稍后.......");
  //     },
  //     success:function(data,textStatus){
  //       if (data.code="200") {
  //         // var arr = data.data
  //         var htm= template('template1',{"arr":data.data});
  //         $("#studentlist").html(htm);
  //       }
  //     },
  //     error:function(XMLHttpRequest,textstatus,errorThrown){
  //       console.log("失败原因".errorThrown)
  //     }
  //   })
  //   return false;
  // })




  $(function(){
    $.ajax({
      url:"student-list-save.php",
      type:"POST",
      data:{
        "action":"student"
      },
      dataType:"json",
      beforeSend:function(XMLHttpRequest){
        $("#studentlist").html("正在查询请稍后.......");
      },
      success:function(data,textStatus){
        // console.log(data);
        if (data.code="200") {
            $("#studentlist").empty();
              for (var i = 0; i < data.data.length; i++) {
                    $trs=$("<tr></tr>");
                    $a1=$("<td><a class='sui-btn btn-small btn-warning' href='student-update.php?kid="+data.data[i].id+"'>修改</a>   <a class='sui-btn btn-small btn-danger' href='student-save.php?kid="+data.data[i].id+"'>删除</a></td>");
                    for(var j in data.data[i]){
                          $tds=$("<td></td>");
                      if (j=="性别"){
                         if (data.data[i].性别==0) {
                              $tds.html("女");
                         }else{
                              $tds.html("男");
                         }
                      }else{
                        $tds.html(data.data[i][j]);

                      }
                      $trs.append($tds);
                      $trs.append($a1);
                    }
                    $("#studentlist").append($trs);
              } 
        }
      },
      error:function(XMLHttpRequest,textstatus,errorThrown){
        console.log("失败原因".errorThrown)
      }
    })
    return false;
  })
</script>


