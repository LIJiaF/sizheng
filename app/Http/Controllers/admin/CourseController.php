<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\CourseModel;

class CourseController extends Controller
{
    
	public function index(){

		$data=CourseModel::orderBy('cou_time','desc')->paginate(5);
		return view('admin.course.index',compact('data'));

	}

	public function create(){

		return view('admin.course.add');

	}

	public function store(){

		$input=Input::except('_token');
		$input['cou_time']=time();
		$rules=[
			'cou_title'=>'required | between:1,30',
			'cou_content'=>'required'
		];
		$message=[
			'cou_title.required'=>'文章标题不能为空',
			'cou_title.between'=>'文章标题不能超过30个字',
			'cou_content.required'=>'文章内容不能为空'
		];
		$validator=Validator::make($input,$rules,$message);
		if($validator->passes()){

			$re=CourseModel::create($input);
			if($re){
				return redirect('admin/course');
			}else{
				return back()->with('errors','文章发布失败，请稍后重试！');
			}

		}else{
			return back()->withErrors($validator);
		}

	}

	public function edit($cou_id){

		$field=CourseModel::find($cou_id);
		return view('admin.course.edit',compact('field'));

	}

	public function update($cou_id){

		$input=Input::except('_token','_method');
		$input['cou_time']=time();
		$re=CourseModel::where('cou_id',$cou_id)->update($input);
		if($re){
			return redirect('admin/course');
		}else{
			return back()->with('errors','文章更新失败，请稍后重试！');
		}

	}

	public function destroy($cou_id){

		$re=CourseModel::where('cou_id',$cou_id)->delete();
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
