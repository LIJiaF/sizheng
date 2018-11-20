<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\StudyModel;

class StudyController extends Controller
{
    
	public function index(){

		$data=StudyModel::orderBy('stu_time','desc')->paginate(5);
		return view('admin.study.index',compact('data'));

	}

	public function create(){

		return view('admin.study.add');

	}

	public function store(){

		$input=Input::except('_token');
		$input['stu_time']=time();
		$rules=[
			'stu_title'=>'required | between:1,30',
			'stu_content'=>'required'
		];
		$message=[
			'stu_title.required'=>'文章标题不能为空',
			'stu_title.between'=>'文章标题不能超过30个字',
			'stu_content.required'=>'文章内容不能为空'
		];
		$validator=Validator::make($input,$rules,$message);
		if($validator->passes()){

			$re=StudyModel::create($input);
			if($re){
				return redirect('admin/study');
			}else{
				return back()->with('errors','文章发布失败，请稍后重试！');
			}

		}else{
			return back()->withErrors($validator);
		}

	}

	public function edit($stu_id){

		$field=StudyModel::find($stu_id);
		return view('admin.study.edit',compact('field'));

	}

	public function update($stu_id){

		$input=Input::except('_token','_method');
		$input['stu_time']=time();
		$re=StudyModel::where('stu_id',$stu_id)->update($input);
		if($re){
			return redirect('admin/study');
		}else{
			return back()->with('errors','文章更新失败，请稍后重试！');
		}

	}

	public function destroy($stu_id){

		$re=StudyModel::where('stu_id',$stu_id)->delete();
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
