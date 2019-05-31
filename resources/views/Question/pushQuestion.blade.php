@extends('layout')
@section('title', 'test')
@section('content')

<div style="border-bottom:1px solid #B0C4DE;margin-bottom:5px;">
    	<div><p align="center"><b><font size="4" color="#48D1CC">图片识别上传问题：</font></b></p></div>
	<form action="{{url('question/PicQuestion')}}" enctype="multipart/form-data" method="post">
		@csrf
	<div class="checkbox" style="margin-left:43%;margin-top:3%;">
		请选择文本间距
		<label>
			<select name="size" id="size">

				@for( $i=1; $i<=20; $i++ )
					<option value="{{$i*5}}"
							@if( $i==12 )
							selected="selected"
							@endif

					>{{$i*5}}</option>
				@endfor


			</select>
		</label>
	</div>

	<div style="margin-left:41%;margin-top:2%;margin-bottom:3%;">
		上传图片：<input type="file" id="imageFile" name="file" />


</div>
		<div style="margin-left:45%;margin-top:2%;margin-bottom:3%;">
		<input type="submit" class="layui-btn" lay-submit lay-filter="formDemo" value="立即提交">
		</div>
	</form>
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
			<div style="margin-bottom:4%;"><p align="center"><b><font size="4" color="#48D1CC">手动输入问题：</font></b></p></div>
			<form class="layui-form" action="{{url('question/pushFormQuestion')}}" method="post">
				@csrf
	    	  <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label">手动输入:</label>
		    <div class="layui-input-block">
		      <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
		    </div>
 			</div>
	
	  <div class="layui-form-item">
    <div class="layui-input-block">
		<input type="submit" class="layui-btn" lay-submit lay-filter="formDemo" value="立即提交">

      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
	</form>

		</div>

  </div>

  @endsection