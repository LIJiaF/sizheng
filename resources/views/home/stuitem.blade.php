@extends('layouts.home')
@section('content')
	
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/newslist.css')}}">

	<!-- 主体部分代码开始 -->

	<div class="content">
		
		<!-- 位置信息代码 -->
		<div class="position">
			
			您现在所处位置：<a href="{{url('/')}}">网站首页</a>&gt;&gt;<span id="position">教改科研</span>

		</div>

		<!-- 新闻文章代码 -->
		<div class="newslist">
			
			<h1 id="title">{{$data->stu_title}}</h1>

			<h2>浏览次数： <span id="source">{{$data->stu_view}}</span>	发布人:<span id="author">{{$data->stu_author}}</span>	日期：<span id="time">{{date('Y-m-d',$data->stu_time)}}</span></h2>
			
			{!!$data->stu_content!!}

		</div>

	</div>

	<!-- 主体部分代码结束 -->

@endsection