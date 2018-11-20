@extends('layouts.home')
@section('content')

	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/teacherTeamList.css')}}">

	<div class="container">

		<p class="local"><strong style="color:#333">您所在位置：</strong><a href="">师资队伍&gt;</a>{{$teaList->tea_job}}——{{$teaList->tea_name}}</p>

		<h1 class="title">{{$teaList->tea_job}}——{{$teaList->tea_name}}</h1>
		<p class="description"><span>发布人:佚名</span>	<span>日期：{{date('Y-m-d',$teaList->tea_time)}}</span><span>浏览次数：{{$teaList->tea_view}}</span></p>
		<div class="content">
			<img src="../{{$teaList->tea_src}}" style="max-width:850px">
			{!!$teaList->tea_content!!}
		</div>

	</div>

@endsection