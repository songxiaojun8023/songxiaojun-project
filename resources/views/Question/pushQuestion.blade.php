@extends('layout')
@section('title', 'test')
@section('content')

<div style="border-bottom:1px solid #B0C4DE;margin-bottom:5px;">
    	<div><p align="center"><b><font size="4" color="#48D1CC">图片识别上传问题：</font></b></p></div>
      
  <div style="margin-left:35%;margin-top:2%;margin-bottom:3%;">
	  	<button type="button" class="layui-btn" id="test1" style="width:50%;">
	  <i class="layui-icon">&#xe67c;</i>上传图片
	</button>
</div>
</div>
<script>
layui.use('upload', function(){
  var upload = layui.upload;
   
  //执行实例
  var uploadInst = upload.render({
    elem: '#test1' //绑定元素
    ,url: '/upload/' //上传接口
    ,done: function(res){
      //上传完毕回调
    }
    ,error: function(){
      //请求异常回调
    }
  });
});
</script>

		<div style="margin-top:2%;">
			<div style="margin-bottom:4%;"><p align="center"><b><font size="4" color="#48D1CC">图片识别上传问题：</font></b></p></div>
			<form class="layui-form" action="">
	    	  <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label">手动输入:</label>
		    <div class="layui-input-block">
		      <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
		    </div>
 			</div>
	
	  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>


		</div>
		<script>
//Demo
			layui.use('form', function(){
			  var form = layui.form;
			  
			  //监听提交
			  form.on('submit(formDemo)', function(data){
			    layer.msg(JSON.stringify(data.field));
			    return false;
			  });
			});
	</script>
  </div>

  @endsection