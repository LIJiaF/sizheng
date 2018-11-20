@extends('layouts.home')
@section('content')
	
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/main.css')}}">
	<script type="text/javascript" src="{{asset('resources/views/home/js/main.js')}}"></script>

	<!-- 轮播图代码开始 -->
	<div class="loop center" id="loop">
		
		<ul>
			<li><img src="{{asset('resources/views/home/images/loop/1.jpg')}}"></li>
			<li><img src="{{asset('resources/views/home/images/loop/2.jpg')}}"></li>
			<li><img src="{{asset('resources/views/home/images/loop/3.jpg')}}"></li>
		</ul>

		<div id="btn">
			<span class="active">1</span>
			<span>2</span>
			<span>3</span>
		</div>

		<a href="javascript:;" id="prev" class="arrow">&lt;</a>
		<a href="javascript:;" id="next" class="arrow">&gt;</a>

	</div>
	<!-- 轮播图代码结束 -->

	<!-- 番职要闻代码开始 -->
	<div class="news center" id="news">
		
		<h1><a href="http://www.gzpyp.edu.cn/news/newsList.do?pageType=2&pageCol=1" class="fr" target="_blank">进入番职新闻网 &gt;</a>番职要闻</h1>

		<div class="newsImportant fl">
			<a href="http://www.gzpyp.edu.cn/news/newsDetail.do?news.numId=10252" target="_blank">
				<img src="{{asset('resources/views/home/images/news1.jpg')}}">
				<h2>我校与西门子公司共建“先进技术示范中心”</h2>
				<p>5月24日，我校与西门子有限公司共建“西门子先进技术示范中心（广东）”校企合作签字仪式在1311会议室举...</p>
			</a>
		</div>

		<ul class="newsList">
			@foreach($newsData as $n)
			<li><a href="{{url('news/'.$n->news_id)}}" target="_blank" title="{{$n->news_title}}">{{$n->news_title}}</a></li>
			@endforeach
		</ul>

	</div>
	<!-- 番职要闻代码结束 -->
	
	<!-- 主体部分代码开始 -->
	<div class="main center">
		
		<!-- 左边代码开始 -->
		<div class="mainLeft fl">
			
			<!-- 通知公告代码开始 -->
			<div class="public">
				
				<h1 id="tongzhi"><a href="{{url('study')}}" class="fr" target="_blank">更多</a>教改科研</h1>

				<ul class="publicList">
					@foreach($stuData as $s)
					<li>
						<a href="{{url('stu/'.$s->stu_id)}}" target="_blank" title="{{$s->stu_title}}">{{$s->stu_title}}</a>
					</li>
					@endforeach
				</ul>

			</div>
			<!-- 通知公告代码结束 -->

			<!-- 课程建设代码开始 -->
			<div class="public">
				
				<h1 id="kecheng"><a href="{{url('course')}}" class="fr" target="_blank">更多</a>课程建设</h1>

				<ul class="publicList">
					@foreach($couData as $c)
					<li>
						<a href="{{url('cou/'.$c->cou_id)}}" target="_blank" title="{{$c->cou_title}}">{{$c->cou_title}}</a>
					</li>
					@endforeach
				</ul>

			</div>
			<!-- 课程建设代码结束 -->

			<!-- 实践教学代码开始 -->
			<div class="public">
				
				<h1 id="shijian"><a href="{{url('practice')}}" class="fr" target="_blank">更多</a>实践教学</h1>

				<ul class="publicList">
					@foreach($praData as $p)
					<li>
						<a href="{{url('pra/'.$p->pra_id)}}" target="_blank" title="{{$p->pra_title}}">{{$p->pra_title}}</a>
					</li>
					@endforeach
				</ul>

			</div>
			<!-- 实践教学代码结束 -->

		</div>
		<!-- 左边代码结束 -->
		
		<!-- 右边代码开始 -->
		<div class="mainRight fr" id="banner">

			<!-- 人物风采代码开始 -->
			<div class="banner">
				
				<a href="{{url('teacherTeam')}}" class="bannerLeft" target="_blank"><img src="{{asset('resources/views/home/images/icon/banner1.jpg')}}"><span>老师风采</span></a>
				<a href="{{url('teacherTeam')}}" class="bannerRight" target="_blank"><img src="{{asset('resources/views/home/images/banner1.jpg')}}"></a>
				<p class="bannerHide">老师风采</p>

			</div>
			<!-- 人物风采代码开始 -->

			<!-- 学习园地代码开始 -->
			<div class="banner">
				
				<a href="{{url('study')}}" class="bannerLeft" target="_blank"><img src="{{asset('resources/views/home/images/icon/banner2.jpg')}}"><span>教改科研</span></a>
				<a href="{{url('study')}}" class="bannerRight" target="_blank"><img src="{{asset('resources/views/home/images/banner2.jpg')}}"></a>
				<p class="bannerHide">教改科研</p>

			</div>
			<!-- 学习园地代码开始 -->

			<!-- 学习平台代码开始 -->
			<div class="banner">
				
				<a href="{{url('course')}}" class="bannerLeft" target="_blank"><img src="{{asset('resources/views/home/images/icon/banner3.jpg')}}"><span>学习平台</span></a>
				<a href="{{url('course')}}" class="bannerRight" target="_blank"><img src="{{asset('resources/views/home/images/banner3.jpg')}}"></a>
				<p class="bannerHide">学习平台</p>

			</div>
			<!-- 学习平台代码开始 -->
		
		</div>
		<!-- 右边代码结束 -->

	</div>
	<!-- 主体部分代码结束 -->

	<!-- 支部生活代码开始 -->
	<div class="alink">

		<h1 class="fl">支<br/>部<br/>生<br/>活</h1>
		
		<ul class="fl" id="alink">
			<li>
				<img src="{{asset('resources/views/home/images/footer1.jpg')}}">
				<a href="">支部生活</a>
				<i></i>
			</li>
			<li>
				<img src="{{asset('resources/views/home/images/footer2.jpg')}}">
				<a href="">支部生活</a>
				<i></i>
			</li>
			<li>
				<img src="{{asset('resources/views/home/images/footer3.jpg')}}">
				<a href="">支部生活</a>
				<i></i>
			</li>
			<li>
				<img src="{{asset('resources/views/home/images/footer4.jpg')}}">
				<a href="">支部生活</a>
				<i></i>
			</li>
			<li>
				<img src="{{asset('resources/views/home/images/footer5.jpg')}}">
				<a href="">支部生活</a>
				<i></i>
			</li>
		</ul>

	</div>
	<!-- 支部生活代码结束 -->

@endsection