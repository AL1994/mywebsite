<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<base href="<?php echo site_url();?>">
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/respond.min.js"></script>
<script type="text/javascript" src="js/PIE_IE678.js"></script>
<![endif]-->

<link type="text/css" rel="stylesheet" href="assets/admin/kindeditor/themes/default/default.css" />
<link type="text/css" rel="stylesheet" href="assets/admin/kindeditor/plugins/code/prettify.css" />

<!--[if IE 7]>
<link href="font/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<title>编辑文章</title>
</head>
<body>

<div class="pd-20">
<table class="table table-border table-bordered table-hover table-bg">
 <form name="example" action="admin/article/do_edit_article?id=<?php echo $article[0]->article_id;?>" method="post" enctype="multipart/form-data">
  <tbody>
    <tr>
      <th class="text-r" width="100">分类：</th>
      <td>
      	
        <select name="category_id" id="category_id"  class="select" style="width: 150px;">
        <?php
      		foreach($category as $v){
      			
      	?>
          <option value="<?php echo $v->category_id;?>"><?php echo $v->category_name;?></option>
          <?php
        	}
        ?>
        </select>
        
      </td>
    </tr>

    <tr>
      <th class="">标题：</th><td><input type="text" name="title" id="website-description" placeholder="" value="<?php echo $article[0]->title;?>" style="width:150px" class="input-text"></td>
    </tr>
    
    <tr>
      <th class="text-r">Tag：</th><td><input type="text" name="tag" id="website-static" placeholder="" value="<?php echo $article[0]->tag_names; ?>" style="width:500px" class="input-text"></td>
    </tr>


   <tr>
      <th class="text-r">图片：</th><td><input type="file" name="userfile" id="website-thumbnail"  value="" style="width:500px" ></td>
    </tr>
    
    <tr>
      <th class="text-r"></th><td><textarea name="content" id="editor_id" cols="110px" rows="20px"><?php echo $article[0]->content;?></textarea></td>
    </tr>
    <tr>
    
      <th class="text-r"></th><td><button name="system-base-save" id="system-base-save" class="btn btn-success radius" type="submit"><i class="icon-ok"></i> 确定</button></td>
    </tr>
  </tbody>
  </form>
</table>
<!-- <div>富文本编辑器添加位置</div>
<textarea name="content" id="editor_id" cols="300px" rows="100px"></textarea> -->

</div>
<script type="text/javascript" src="assets/admin/js/jquery.min.js"></script>

<script type="text/javascript" charset="utf-8" src="assets/admin/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="assets/admin/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" charset="utf-8" src="assets/admin/kindeditor/plugins/code/prettify.js"></script>


<script>
  // var editor;
  KindEditor.ready(function(K){
    window.editor = K.create('textarea[name="content"]', {
        items : [
'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
'flash', 'media','insertVideo', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
'anchor', 'link', 'unlink', '|', 'about'
],
        cssPath : 'kindeditor/plugins/code/prettify.css',
        uploadJson : 'kindeditor/php/upload_json.php',
        fileManagerJson : 'kindeditor/php/file_manager_json.php',
        allowFileManager : true,
        afterCreate : function() {
          var self = this;
          K.ctrl(document, 13, function() {
            self.sync();
            K('form[name=example]')[0].submit();
          });
          K.ctrl(self.edit.doc, 13, function() {
            self.sync();
            K('form[name=example]')[0].submit();
          });
        },
        afterBlur: function(){this.sync();}
      });
       prettyPrint();
  });

  var options = {
    filterMode: true
  }

  // var editor = K.create('textarea[name="content"]',options);

</script>
	
</body>
</html>