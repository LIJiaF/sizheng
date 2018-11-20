<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\TeacherModel;

class TeacherController extends Controller
{
    
	public function index(){

		$data=TeacherModel::orderBy('tea_time','desc')->paginate(5);
		return view('admin.teacher.index',compact('data'));

	}

	public function create(){

		return view('admin.teacher.add');

	}

	public function store(){

		$input=Input::except('_token');
		$input['tea_time']=time();
		$rules=[
			'tea_name'=>'required',
			'tea_job'=>'required',
			'tea_description'=>'required',
			'tea_content'=>'required'
		];
		$message=[
			'tea_name.required'=>'教师名字不能为空',
			'tea_job.required'=>'教师职务不能为空',
			'tea_description.required'=>'教师简介不能为空',
			'tea_content.required'=>'教师详细描述不能为空'
		];
		$validator=Validator::make($input,$rules,$message);
		if($validator->passes()){

			$re=TeacherModel::create($input);
			if($re){
				return redirect('admin/teacher');
			}else{
				return back()->with('errors','老师添加失败，请稍后重试！');
			}

		}else{
			return back()->withErrors($validator);
		}

	}

	public function edit($tea_id){

		$field=TeacherModel::find($tea_id);
		return view('admin.teacher.edit',compact('field'));

	}

	public function update($tea_id){

		$input=Input::except('_token','_method');
		$input['tea_time']=time();
		$re=TeacherModel::where('tea_id',$tea_id)->update($input);
		if($re){
			return redirect('admin/teacher');
		}else{
			return back()->with('errors','老师信息更新失败，请稍后重试！');
		}

	}

	public function destroy($tea_id){

		$file=TeacherModel::find($tea_id)->tea_src;
		$re=TeacherModel::where('tea_id',$tea_id)->delete();
		if($re){
			unlink(base_path().'/'.$file);
			$data=[
				'status'=>0,
				'msg'=>'教师信息删除成功！'
			];
		}else{
			$data=[
				'status'=>1,
				'msg'=>'教师信息删除失败，请稍后重试！'
			];
		}
		return $data;

	}

}
