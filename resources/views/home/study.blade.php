@extends('layouts.home')
@section('content')
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/teachering.css')}}">

	<div class="container">
		
		<!-- 左边栏开始 -->
		<div class="con-left">
			
			<!-- 教改科研板块开始 -->
			<h1 class="title">教改科研&nbsp;&nbsp;&nbsp;<small>信息列表</small></h1>
			@foreach($stuData as $s)
			<p class="content">
				<a href="{{url('stu/'.$s->stu_id)}}" target="_blank" title="$s->stu_title">{{$s->stu_title}}</a>
				<span class="time">{{date('Y-m-d',$s->stu_time)}}</span>
			</p>
			@endforeach
			<div class="page">
				{{$stuData->links()}}
			</div>
			<!-- 教改科研板块结束 -->

		</div>
		<!-- 左边栏结束 -->

		<!-- 右边栏开始 -->
		<div class="con-right">
			
			<!-- 点击排行开始 -->
			<div class="view">
				<h1 class="view-title">点击排行</h1>
				<ul>
					<?php $i=1; ?>
					@foreach($stuView as $v)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('stu/'.$s->stu_id)}}" target="_blank" title="{{$v->stu_title}}">{{$v->stu_title}}</a></li>
					<?php $i++; ?>
					@endforeach
				</ul>
			</div>
			<!-- 点击排行结束 -->

			<!-- 最新文章开始 -->
			<div class="view">
				<h1 class="view-title" style="background:#f99;">最新文章</h1>
				<ul>
					<?php $i=1; ?>
					@foreach($stuNew as $s)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('stu/'.$s->stu_id)}}" target="_blank" title="{{$s->stu_title}}">{{$s->stu_title}}</a></li>
					<?php $i++; ?>
					@endforeach
				</ul>
			</div>
			<!-- 最新文章结束 -->

		</div>
		<!-- 右边栏结束 -->

	</div>

@endsection