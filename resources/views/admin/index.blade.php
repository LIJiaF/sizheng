@extends('layouts.admin')
@section('content')
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">思政部后台管理</div>
			<ul>
				<li><a href="{{url('admin/info')}}" class="active" target="main">首页</a></li>
				<li><a href="#">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员：admin</li>
				<li><a href="{{url('admin/pass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/quit')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-newspaper-o"></i>番职要闻</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/news/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>新闻发布</a></li>
                    <li><a href="{{url('admin/news')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>新闻列表</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-book"></i>教育教学</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/study')}}" target="main"><i class="fa fa-fw fa-list-alt"></i>教改科研</a></li>
                    <li><a href="{{url('admin/course')}}" target="main"><i class="fa fa-fw fa-list-alt"></i>课程建设</a></li>
                    <li><a href="{{url('admin/practice')}}" target="main"><i class="fa fa-fw fa-list-alt"></i>实践教学</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-users"></i>师资队伍</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/teacher/create')}}" target="main"><i class="fa fa-fw fa-user-plus"></i>添加老师</a></li>
                    <li><a href="{{url('admin/teacher')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>老师列表</a></li>
                </ul>
            </li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe> 
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		版权所有 &copy; 李家富　　<a href="javascript:;">联系管理员</a>.
	</div>
	<!--底部 结束-->
@endsection