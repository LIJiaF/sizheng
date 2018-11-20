@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 添加老师
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/teacher/create')}}"><i class="fa fa-plus"></i>添加老师</a>
                <a href="{{url('admin/teacher')}}"><i class="fa fa-recycle"></i>老师列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/teacher')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">所属课程：</th>
                        <td>
                            <select name="tea_class">
                                <option value="1">思想道德修养与法律基础</option>
                                <option value="2">毛泽东思想和中国特色社会主义理论体系概论</option>
                                <option value="3">形势与政策</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>教师名字：</th>
                        <td>
                            <input type="text" name="tea_name">         
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>教师职务：</th>
                        <td>
                            <input type="text" name="tea_job">
                        </td>
                    </tr>
                    <tr>
                        <th>教师头像：</th>
                        <td>
                            <input type="text" class="lg" name="tea_src" style="width:450px;">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadify({
                                        'buttonText' : '图片上传',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : '{{csrf_token()}}'
                                        },
                                        'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{url('admin/upload')}}",
                                        'onUploadSuccess':function(file,data,response){
                                            $('input[name=tea_src]').val(data);
                                            $('#tea_src_img').attr('src','/'+data);
                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadify{display:inline-block;}
                                .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                            </style>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <img src="" alt="" id="tea_src_img" style="max-width:200px;max-height:200px;">        
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>教师简介：</th>
                        <td>
                            <textarea name="tea_description" style="resize:none;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>详细描述：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/edit/kindeditor/kindeditor.js')}}"></script>
                            <script type="text/javascript">
                                KindEditor.ready(function(K) {
                                        window.editor = K.create('#editor_id');
                                });
                            </script>
                            <textarea name="tea_content" id="editor_id" style="width:930px;height:300px;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection