<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\PracticeModel;

class PracticeController extends Controller
{
    
	public function index(){

		$data=PracticeModel::orderBy('pra_time','desc')->paginate(5);
		return view('admin.practice.index',compact('data'));

	}

	public function create(){

		return view('admin.practice.add');

	}

	public function store(){

		$input=Input::except('_token');
		$input['pra_time']=time();
		$rules=[
			'pra_title'=>'required | between:1,30',
			'pra_content'=>'required'
		];
		$message=[
			'pra_title.required'=>'文章标题不能为空',
			'pra_title.between'=>'文章标题不能超过30个字',
			'pra_content.required'=>'文章内容不能为空'
		];
		$validator=Validator::make($input,$rules,$message);
		if($validator->passes()){

			$re=PracticeModel::create($input);
			if($re){
				return redirect('admin/practice');
			}else{
				return back()->with('errors','文章发布失败，请稍后重试！');
			}

		}else{
			return back()->withErrors($validator);
		}

	}

	public function edit($pra_id){

		$field=PracticeModel::find($pra_id);
		return view('admin.practice.edit',compact('field'));

	}

	public function update($pra_id){

		$input=Input::except('_token','_method');
		$input['pra_time']=time();
		$re=PracticeModel::where('pra_id',$pra_id)->update($input);
		if($re){
			return redirect('admin/practice');
		}else{
			return back()->with('errors','文章更新失败，请稍后重试！');
		}

	}

	public function destroy($pra_id){

		$re=PracticeModel::where('pra_id',$pra_id)->delete();
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
