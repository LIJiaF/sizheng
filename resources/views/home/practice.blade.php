@extends('layouts.home')
@section('content')
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/teachering.css')}}">

	<div class="container">
		
		<!-- 左边栏开始 -->
		<div class="con-left">
			
			<!-- 教改科研板块开始 -->
			<h1 class="title">实践教学&nbsp;&nbsp;&nbsp;<small>信息列表</small></h1>
			@foreach($praData as $s)
			<p class="content">
				<a href="{{url('pra/'.$s->pra_id)}}" target="_blank">{{$s->pra_title}}</a>
				<span class="time">{{date('Y-m-d',$s->pra_time)}}</span>
			</p>
			@endforeach
			<div class="page">
				{{$praData->links()}}
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
					@foreach($praView as $v)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('pra/'.$s->pra_id)}}" target="_blank" title="{{$v->pra_title}}">{{$v->pra_title}}</a></li>
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
					@foreach($praNew as $s)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('pra/'.$s->pra_id)}}" target="_blank" title="{{$s->pra_title}}">{{$s->pra_title}}</a></li>
					<?php $i++; ?>
					@endforeach
				</ul>
			</div>
			<!-- 最新文章结束 -->

		</div>
		<!-- 右边栏结束 -->

	</div>

@endsection