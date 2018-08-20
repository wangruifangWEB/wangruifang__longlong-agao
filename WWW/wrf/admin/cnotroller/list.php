<?php
//引入分页程序
require_once("../../paging.php");
//取出列表页3条数据，存于数组$data中
if($info&&mysqli_num_rows($info)){
    while($row=mysqli_fetch_assoc($info)){
        $data[]=$row;
    }
}else{
    $data=array();
}
//取最新添加的6条编号、标题信息，存于数组$data_title
if($info_title&&mysqli_num_rows($info_title)){
    while($row_title=mysqli_fetch_assoc($info_title)){
        $data_title[]=$row_title;
    }
}else{
    $data_title=array();
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
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="add.php"> 添加内容</a> </li>
        <li>搜索：</li>
        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="changesearch()">
                <?php
                //在$data不为空的情况下，通过foreach()将$data循环输出数来
                if(!empty($data)){
                    foreach($data as $value){
                        ?><option value="<?php echo $value['id'];?>"><?php echo $value["cate_name"]?></option>
                        <?php
                    }
                }
                ?>
            </select>
          </li>
        </if>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
          <th width="10%">排序</th>
          <th>图片</th>
          <th>名称</th>
          <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
          <?php
          //在$data不为空的情况下，通过foreach()将$data循环输出数来
          if(!empty($data)){
              foreach($data as $value){
                  ?><tr>
                      <td style="text-align:left; padding-left:20px;">
                          <input type="checkbox" name="id[]" value="" /><?php echo $value['id']; ?>
                      </td>
                      <td>
                          <input type="text" name="sortId" value="<?php echo $value['sortId']; ?>" style="width:50px; text-align:center; border:1px solid #ddd; padding:7px 0;">
                      </td>
                        <td width="10%"><img src="http://localhost/wrf/admin/cnotroller/<?php echo $value['imgSrc']; ?>" alt="" width="70" height="50" /></td>
                      <td><?php echo $value['title']; ?></td>
                      <td><?php echo date('Y-m-d H:i:s', $value['dateline']);?></td>
                      <td>
                          <div class="button-group">
                              <a class="button border-main" href="add_modify.php?id=<?php echo $value['id']; ?>">
                                  <span class="icon-edit"></span>
                                  修改
                              </a>
                              <a class="button border-red" href="add_del_handle.php?id=<?php echo $value['id']; ?>" onclick="return del(1,1,1)">
                                  <span class="icon-trash-o"></span>
                                  删除
                              </a>
                          </div>
                      </td>
                  </tr><?php
              }
          }
          //初始化首页、上一页、下一页、末页的值，通过<a>标签进行跳转到当前页面，传入$page的值
          $first=1;
          $prev=$page-1;
          $next=$page+1;
          $last=$pagenum;
          ?>
       <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="7" style="text-align:left;padding-left:20px;">
            <a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a>
            <a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;" class="button border-blue icon-edit" onclick="sorts()"> 排序</a>
<!--            移动到：-->
<!--            <select name="movecid" style="padding:5px 15px; border:1px solid #ddd;" onchange="changecate(this)"></select>-->
        </td>
      </tr>
      <tr>
        <td colspan="8">
            <div class="pagelist">
                <a href="list.php?page=<?php echo $prev ?>">上一页</a>
                <span class="page-number">第 <?php echo $page ?> 页 / 共 <?php echo $pagenum ?> 页</span>
                <a href="list.php?page=<?php echo $next ?>">下一页</a>
                <a href="list.php?page=<?php echo $last ?>">尾页</a>
            </div>
        </td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">changecate

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}

//全选
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

</script>
</body>
</html>