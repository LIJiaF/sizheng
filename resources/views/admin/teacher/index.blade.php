@extends('layouts.admin')
@section('content')    
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 老师列表
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>快捷操作</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/teacher/create')}}"><i class="fa fa-plus"></i>添加老师</a>
                    <a href="{{url('admin/teacher')}}"><i class="fa fa-fw fa-list-ul"></i>老师列表</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">ID</th>
                        <th>教师名称</th>
                        <th>教师职称</th>
                        <th>教师简介</th>
                        <th>所属课程</th>
                        <th>操作</th>
                    </tr>

                    <?php $i=1; ?>
                    @foreach($data as $d)
                        <tr>
                            <td class="tc"><?php echo $i; ?></td>
                            <td>
                                <a href="#">{{$d->tea_name}}</a>
                            </td>
                            <td>{{$d->tea_job}}</td>
                            <td>{{$d->tea_description}}</td>
                            <td>
                                @if($d->tea_class==1)
                                    思想道德修养与法律基础
                                @elseif($d->tea_class==2)
                                    毛泽东思想和中国特色社会主义理论体系概论
                                @else
                                    形势与政策
                                @endif                                
                            </td>
                            <td>
                                <a href="{{url('admin/teacher/'.$d->tea_id.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="delTea({{$d->tea_id}})">删除</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach

                </table>
                
                <!-- 分页 -->
                <style type="text/css">
                    .page_list{
                        text-align: center;
                    }
                    .result_content ul li span {
                        font-size: 15px;
                        padding: 6px 12px;
                    }
                </style>
                <div class="page_list">
                    {{$data->links()}}
                </div>

            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <script type="text/javascript">

        function delTea(id){

            //提示框
            layer.confirm('您确定要删除这条教师信息吗？', {
              btn: ['确定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/teacher')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                    if(!data.status){
                        setTimeout(function(){
                            location.href=location.href;
                        },1000);                        
                        layer.msg(data.msg, {icon: 6});
                    }else{
                        layer.msg(data.msg, {icon: 5});
                    }
                });
            }, function(){

            }); 

        }

    </script>

@endsection