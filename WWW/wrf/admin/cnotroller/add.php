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
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="add_handle.php" enctype="multipart/form-data">
            <div class="form-group">
                <div class="label">
                    <label>标题：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="title" data-validate="required:请输入标题" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>图片：</label>
                </div>
                <div class="field">
                    <input type="text" id="url1" name="imgSrc" class="input tips" style="width:25%;float:left;"  value="" style="cursor:pointer;"/>
                    <input type="file" name="fileField" class="button margin-left;" style="display:none;" id="fileField" size="28" />
                    <input type="button" class="button bg-blue margin-left" id="image1" value="+ 选取图片" onclick="getElementById('fileField').click()" >
                    <div class="tipss">图片尺寸：500*500</div>
                </div>
            </div>

<!--            <if condition="$iscid eq 1">-->
<!--                <div class="form-group">-->
<!--                    <div class="label">-->
<!--                        <label>分类标题：</label>-->
<!--                    </div>-->
<!--                    <div class="field">-->
<!--                        <select name="sortName" class="input w50">-->
<!--                            <option value="0">请选择分类</option>-->
<!--                            <option value="小程序">小程序</option>-->
<!--                            <option value="PHP">PHP</option>-->
<!--                            <option value="笔记">笔记</option>-->
<!--                            <option value="小分享">小分享</option>-->
<!--                            --><?php //foreach($data as $key => $val){?>
<!--                                <option value="--><?php //echo $val['id'];?><!--">--><?php //echo $val["sortName"]?><!--</option>-->
<!--                            --><?php //}?>
<!--                        </select>-->
<!--                        <div class="tips"></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </if>-->

            <div class="form-group">
                <div class="label">
                    <label>描述：</label>
                </div>
                <div class="field">
                    <textarea class="input" name="description" style=" height:90px;"></textarea>
                    <div class="tips"></div>
                </div>
            </div>
<!--            <div class="form-group">-->
<!--                <div class="label">-->
<!--                    <label>内容：</label>-->
<!--                </div>-->
<!--                <div class="field">-->
<!--                    <textarea name="content" class="input" style="height:450px; border:1px solid #ddd;"></textarea>-->
<!--                    <div class="tips"></div>-->
<!--                </div>-->
<!--            </div>-->

            <div class="form-group">
                <div class="label">
                    <label>编辑内容：</label>
                </div>
                <div id="ueditor" name="content" style="margin-left:180px;width:600px;height:500px"></div>
            </div>

            <div class="clear"></div>
            <div class="form-group">
                <div class="label">
                    <label>发布时间：</label>
                </div>
                <div class="field">
                    <script src="js/laydate.js"></script>
                    <input type="text" class="laydate-icon input w50" name="datetime" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value=""  data-validate="required:日期不能为空" style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>作者：</label>
                </div>
                <div class="field">
                    <input name="author" type="text" class="input w50"  />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>排序：</label>
                </div>
                <div class="field">
                    <input name="sortId" type="text" class="input w50"  />
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

<script src="ueditor/ueditor.config.js"></script>
<script src="ueditor/ueditor.all.js"></script>
<script>
    var ue = UE.getEditor('ueditor');
    var fileBtn = $("#fileField");
     fileBtn.on("change", function(){
            var index = $(this).val().lastIndexOf("\\");
            var sFileName = $(this).val().substr((index+1));
            $("#url1").val(sFileName);
         });
</script>
</body>
</html>