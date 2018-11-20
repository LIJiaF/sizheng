<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\NewsModel;

class NewsController extends Controller
{
    
	public function index(){

		$data=NewsModel::orderBy('news_time','desc')->paginate(5);
		return view('admin.news.index',compact('data'));

	}

	public function create(){

		return view('admin.news.add');

	}

	public function store(){

		$input=Input::except('_token');
		$input['news_time']=time();
		$rules=[
			'news_title'=>'required | between:1,30',
			'news_content'=>'required'
		];
		$message=[
			'news_title.required'=>'新闻标题不能为空',
			'news_title.between'=>'新闻标题不能超过30个字',
			'news_content.required'=>'新闻内容不能为空'
		];
		$validator=Validator::make($input,$rules,$message);
		if($validator->passes()){

			$re=NewsModel::create($input);
			if($re){
				return redirect('admin/news');
			}else{
				return back()->with('errors','新闻发布失败，请稍后重试！');
			}

		}else{
			return back()->withErrors($validator);
		}

	}

	public function edit($news_id){

		$field=NewsModel::find($news_id);
		return view('admin.news.edit',compact('field'));

	}

	public function update($news_id){

		$input=Input::except('_token','_method');
		$input['news_time']=time();
		$re=NewsModel::where('news_id',$news_id)->update($input);
		if($re){
			return redirect('admin/news');
		}else{
			return back()->with('errors','新闻更新失败，请稍后重试！');
		}

	}

	public function destroy($news_id){

		$re=NewsModel::where('news_id',$news_id)->delete();
		if($re){
			$data=[
				'status'=>0,
				'msg'=>'文章删除成功！'
			];
		}else{
			$data=[
				'status'=>1,
				'msg'=>'文章删除失败，请稍后重试！'
			];
		}
		return $data;

	}

}
