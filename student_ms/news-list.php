<!-- 头部开始 -->
<?php include("01_head.php"); ?>
<?php
include("04_conn.php");
$tab = "news";
$ccc=6;
include("Tpage.php");
mysqli_close($conn);
?>
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
                                     <th>新闻标题</th>
                                     <th>时间</th>
                                      <th>操作</th>
                                   </tr>
                    <?php
                    foreach($array as $key=>$values){
                        echo "<tr>";
                        echo "<td>{$values["id"]}</td>";
                        echo "<td>{$values["标题"]}</td>";
                        echo "<td>{$values["发布时间"]}</td>";
                        echo "<td><a  class='sui-btn btn-warning' title=''href='new-update.php?hid={$values['id']}' >修改</a>&nbsp;&nbsp;
                                    <a class='sui-btn btn-small btn-danger' href='news-save.php?hid={$values['id']}'>删除</a>";
                        echo "</tr>";
                    }
                    ?>
        </table>
        <?php include("b1page.php"); ?>
      </div>
      
    </div>  

<!-- 底部 -->
<?php include("03_foot.php"); ?>
