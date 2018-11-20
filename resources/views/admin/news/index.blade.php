@extends('layouts.admin')
@section('content')    
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 新闻列表
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
                    <a href="{{url('admin/news/create')}}"><i class="fa fa-plus"></i>新闻发布</a>
                    <a href="{{url('admin/news')}}"><i class="fa fa-fw fa-list-ul"></i>新闻列表</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">ID</th>
                        <th>标题</th>
                        <th>点击</th>
                        <th>发布人</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>

                    <?php $i=1; ?>
                    @foreach($data as $d)
                        <tr>
                            <td class="tc"><?php echo $i; ?></td>
                            <td>
                                <a href="#">{{$d->news_title}}</a>
                            </td>
                            <td>{{$d->news_view}}</td>
                            <td>{{$d->news_author}}</td>
                            <td>{{date('Y-m-d',$d->news_time)}}</td>
                            <td>
                                <a href="{{url('admin/news/'.$d->news_id.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="delNews({{$d->news_id}})">删除</a>
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

        function delNews(id){

            //提示框
            layer.confirm('您确定要删除这篇新闻吗？', {
              btn: ['确定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/news')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
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