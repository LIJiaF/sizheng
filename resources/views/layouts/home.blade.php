<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>思政部官网</title>
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/icon.css')}}">
	<script type="text/javascript" src="{{asset('resources/views/home/js/script.js')}}"></script>
</head>
<body>
	
	<!-- header代码开始 -->
	<div class="header">
		
		<!-- top代码 -->
		<div class="top center">
			
			<ul class="topList fl">
				<li><a href="http://www.gzpyp.edu.cn/" target="_blank">学校官网</a></li>
				<li><a href="http://ie.gzpyp.edu.cn/plus/list.php?tid=80" target="_blank">信息工程学院</a></li>
				<li><a href="http://61.144.43.233/zb/" target="_blank">珠宝学院</a></li>
				<li><a href="http://121.33.253.220/cjx/" target="_blank">财经学院</a></li>
				<li><a href="http://61.144.43.233/gexi/lyx/" target="_blank">人文社科学院</a></li>
				<li><a href="http://art.gzpyp.edu.cn/" target="_blank">艺术学院</a></li>
			</ul>

			<ul class="topList fr">
				<li><a href="http://210.38.113.23:82/" target="_blank">建筑工程学院</a></li>
				<li><a href="http://61.144.43.233/gexi/jdx/" target="_blank">机电学院</a></li>
				<li><a href="http://61.144.43.233/gexi/wyx/news/" target="_blank">外语外贸学院</a></li>
				<li><a href="http://121.33.253.220/hh/" target="_blank">华好学院</a></li>
				<li><a href="http://121.33.253.220/library/" target="_blank">图书馆</a></li>
				<li><a href="{{url('admin/login')}}" target="_blank">后台管理</a></li>
			</ul>

		</div>

	</div>
	<!-- header代码结束 -->

	<!-- logo、导航栏代码开始 -->
	<div id="navBox">

		<div class="nav" id="nav">
			
			<!-- 导航栏 -->
			<ul class="navList fr">
				<li><span class="icon icon-home"></span><a href="{{url('/')}}" target="_blank">首页</a></li>
				<li><span class="icon icon-file-text"></span><a href="{{url('department')}}" target="_blank">部门介绍</a></li>
				<li><span class="icon icon-users"></span><a href="{{url('teacherTeam')}}" target="_blank">师资队伍</a></li>
				<li><span class="icon icon-books"></span><a href="{{url('study')}}" target="_blank">教改科研</a></li>
				<li><span class="icon icon-command"></span><a href="{{url('practice')}}" target="_blank">实践教学</a></li>
				<li><span class="icon icon-mail2"></span><a href="{{url('course')}}" target="_blank">课程建设</a></li>
			</ul>
			
			<!-- logo图片 -->
			<img src="{{asset('resources/views/home/images/mainLogo.png')}}" id="navImg">

		</div>

		<!-- 导航栏隐藏框 -->
		<div class="navHide" id="navHide">

			<ul>
				<li><span class="iconH icon-home"></span><a href="{{url('/')}}" target="_blank">首页</a></li>
				<li><span class="iconH icon-file-text"></span><a href="{{url('department')}}" target="_blank">部门介绍</a></li>
				<li><span class="iconH icon-users"></span><a href="{{url('teacherTeam')}}" target="_blank">师资队伍</a></li>
				<li><span class="iconH icon-books"></span><a href="{{url('study')}}" target="_blank">教改科研</a></li>
				<li><span class="iconH icon-command"></span><a href="{{url('practice')}}" target="_blank">实践教学</a></li>
				<li><span class="iconH icon-mail2"></span><a href="{{url('course')}}" target="_blank">课程建设</a></li>
			</ul>

		</div>

	</div>
	<!-- logo、导航栏代码结束 -->

	@yield('content')

	<!-- footer代码开始 -->
	<div class="footer">
		
		<p>学院地址：广东省广州市番禺区沙湾青山湖 邮政编码：511483 办公室：2215</p>
		<p>版权所有&copy; 李家富 <a href="javascript::">联系管理员</a></p>

	</div>
	<!-- footer代码结束 -->

</body>
</html>