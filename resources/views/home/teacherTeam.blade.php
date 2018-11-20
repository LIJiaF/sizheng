@extends('layouts.home')
@section('content')

	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/teacherTeam.css')}}">

	<!-- 主体内容代码开始 -->

	<div class="content">

		<h1 class="present">师资队伍介绍</h1>

		<h2 class="cate"><i class="line" id="left"></i> 思想道德修养与法律基础 <i class="line" id="right"></i></h2>
		
		<!-- 老师列表开始 -->
		<div class="container">
			
			@foreach($data as $d)
				@if($d->tea_class==1)
				<div class="con_list">
					<a href="{{url('tea/'.$d->tea_id)}}" target="_blank"><img src="{{$d->tea_src}}" style="max-width:190px;max-height:190px;"></a>
					<div class="con_list_con">
						<h1 class="name">{{$d->tea_name}}</h1>
						<h2 class="dutie">{{$d->tea_job}}</h2>
						<hr>
						<p class="synop">
							{{$d->tea_description}}
						</p>
					</div>
				</div>
				@endif
			@endforeach

		</div>
		<!-- 老师列表结束 -->

		<h2 class="cate"><i class="line" id="left"></i> 毛泽东思想和中国特色社会主义理论体系概论 <i class="line" id="right"></i></h2>
		
		<!-- 老师列表开始 -->
		<div class="container">
			
			@foreach($data as $d)
				@if($d->tea_class==2)
				<div class="con_list">
					<a href="{{url('tea/'.$d->tea_id)}}" target="_blank"><img src="{{$d->tea_src}}" style="max-width:190px;max-height:190px;"></a>
					<div class="con_list_con">
						<h1 class="name">{{$d->tea_name}}</h1>
						<h2 class="dutie">{{$d->tea_job}}</h2>
						<hr>
						<p class="synop">
							{{$d->tea_description}}
						</p>
					</div>
				</div>
				@endif
			@endforeach

		</div>
		<!-- 老师列表结束 -->

		<h2 class="cate"><i class="line" id="left"></i> 形势与政策 <i class="line" id="right"></i></h2>
		
		<!-- 老师列表开始 -->
		<div class="container">

			@foreach($data as $d)
				@if($d->tea_class==3)
				<div class="con_list">
					<a href="{{url('tea/'.$d->tea_id)}}" target="_blank"><img src="{{$d->tea_src}}" style="max-width:190px;max-height:190px;"></a>
					<div class="con_list_con">
						<h1 class="name">{{$d->tea_name}}</h1>
						<h2 class="dutie">{{$d->tea_job}}</h2>
						<hr>
						<p class="synop">
							{{$d->tea_description}}
						</p>
					</div>
				</div>
				@endif
			@endforeach

		</div>
		<!-- 老师列表结束 -->

	</div>

	<!-- 主体内容代码结束 -->

@endsection