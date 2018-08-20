<?php
//连接数据库
require_once("../../connect.php");
$sql="select * from article order by id desc";
//执行查询语句
$query=mysqli_query($conn,$sql);
//判断查询语句是否查询到结果，查到则使用mysqli_fetch_assoc()将其逐行取出，放入数组$data中，没查到则直接赋值空数组给$data
if($query&&mysqli_num_rows($query)){
    while($row=mysqli_fetch_assoc($query)){
        $data[]=$row;
    }
}else{
    $data=array();
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='#add'">
        <span class="icon-plus-square-o"></span> 添加分类
    </button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">一级分类</th>
      <th width="10%">排序</th>
      <th width="10%">操作</th>
    </tr>
    <?php
    //在$data不为空的情况下，通过foreach()将$data循环输出数来
    if(!empty($data)){
        foreach($data as $value){
            ?><tr>
            <td><?php echo $value['id'];?></td>
            <td><?php echo $value['sortName'];?></td>
            <td><?php echo $value['sortId'];?></td>
            <td>
                <div class="button-group">
                    <a class="button border-main" href="cate_modify.php?id=<?php echo $value['id']; ?>">
                        <span class="icon-edit"></span> 修改
                    </a>
                    <a class="button border-red" href="cate_del_handle.php?id=<?php echo $value['id']; ?>"" onclick="return del(1,2)">
                        <span class="icon-trash-o"></span> 删除
                    </a>
                </div>
            </td>
            </tr>
            <?php
        }
    }
    ?>
  </table>
</div>
<script type="text/javascript">
function del(id,mid){
	if(confirm("您确定要删除吗?")){			
		
	}
}
</script>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="cate_add_handle.php">
<!--      <div class="form-group">-->
<!--        <div class="label">-->
<!--          <label>上级分类：</label>-->
<!--        </div>-->
<!--        <div class="field">-->
<!--          <select name="pid" class="input w50">-->
<!--              --><?php
//              //在$data不为空的情况下，通过foreach()将$data循环输出数来
//              if(!empty($data)){
//                  foreach($data as $value){
//                      ?><!--<option value="--><?php //echo $value['id'];?><!--">--><?php //echo $value["cate_name"]?><!--</option>-->
<!--                     --><?php
//                  }
//              }
//              ?>
<!--          </select>-->
<!--          <div class="tips">不选择上级分类默认为一级分类</div>-->
<!--        </div>-->
<!--      </div>-->
      <div class="form-group">
        <div class="label">
          <label>分类名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="cate_name" />
          <div class="tips"></div>
        </div>
      </div>
<!--      <div class="form-group">-->
<!--        <div class="label">-->
<!--          <label>批量添加：</label>-->
<!--        </div>-->
<!--        <div class="field">-->
<!--          <textarea type="text" class="input w50" name="tits" style="height:150px;" placeholder="多个分类标题请转行"></textarea>-->
<!--          <div class="tips">多个分类标题请转行</div>-->
<!--        </div>-->
<!--      </div>-->
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="sort" value="0"  data-validate="number:排序必须为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>