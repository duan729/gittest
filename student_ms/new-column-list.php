<?php 
  include("01_head.php");
  include("04_conn.php");
   $sql="select * from  new_column";
   $result =mysqli_query($conn, $sql);
   // 关闭数据库
   mysqli_close($conn);
 ?> 
<div class="sui-layout">
      <div class="sidebar">
      <!-- 左菜单 -->
      <?php include("02_leftnemu.php"); ?>  
      </div>
      <div class="content">
      <p class="sui-text-xxlarge my-padd">栏目管理</p>
      <table class="sui-table table-primary">
                                   <tr>  
                                     <th>栏目名称</th>
                                     <th>操作</th>
                                   </tr>
                                  <?php
                                  if(mysqli_num_rows($result)> 0 ){
                                     // 将查询的结果转换为下列数组
                                    while($row=mysqli_fetch_assoc($result)){
                                    echo "<tr>
                                      <td>{$row['name']}</td>
                                      <td>
                                             <a class='sui-btn btn-warning' title=''href='new-column-update.php?lid={$row['id']}' >修改</a> 
                                              &nbsp; 
                                              <a class='sui-btn btn-danger' title=''
                                             href='new-column-save.php?lid={$row['id']}'  >删除</a>
                                      </td>   
                                      </tr>";
                                    }
                                  }else{
                                    echo "没有记录";
                                  }
                               ?>
            </table>
      </div>
    </div>  
<!-- 底部 -->
<?php include("03_foot.php"); ?>