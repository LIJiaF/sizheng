<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\UserModel;

class IndexController extends Controller
{
    
	public function index(){

		return view('admin.index');

	}

	public function info(){

		return view('admin.info');

	}

	public function quit(){

		session(['users'=>null]);
		return redirect('admin/login');

	}

	public function pass(){

		if($input=Input::all()){

			$rules=[
				'password'=>'required | between:6,20 | confirmed'
			];
			$message=[
				'password.required'=>'新密码不能为空',
				'password.between'=>'新密码长度必须在6到20位之间',
				'password.confirmed'=>'新密码和确认密码不一致'
			];

			$validator=Validator::make($input,$rules,$message);

			if($validator->passes()){
				$user=UserModel::first();
				$_password=Crypt::decrypt($user->pass);
				if($input['password_o']==$_password){
					$user->pass=Crypt::encrypt($input['password']);
					$user->update();
					return back()->with('errors','密码修改成功！');
				}else{
					return back()->with('errors','原密码错误！');
				}
			}else{
				return back()->withErrors($validator);
			}

		}else{
			return view('admin.pass');
		}		

	}

	public function upload(){

		$file=Input::file('Filedata');
		// dd($file->getSize()); 获取文件大小
		if($file->isValid()){

			$realPath=$file->getRealPath(); //临时文件的绝对路径
			$entension=$file->getClientOriginalExtension(); //上传文件的后缀
			$newName=date('YmdHis').mt_rand(100,999).'.'.$entension;
			$path=$file->move(base_path().'/uploads',$newName);
			$filepath='uploads/'.$newName;
			return $filepath;

		}

	}

}
