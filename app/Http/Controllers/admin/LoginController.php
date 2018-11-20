<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\UserModel;

require_once('resources/org/code/Code.class.php');

class LoginController extends Controller
{
    
	public function login(){

		if($input=Input::all()){

			$code=new \Code;
			$_code=$code->get();
			if( strtolower($input['code'])!=strtolower($_code) ){
				return back()->with('msg','验证码错误！');
			}

			$user=UserModel::first();
			if($input['username']!=$user->user || $input['password']!=Crypt::decrypt($user->pass)){
				return back()->with('msg','用户名或密码错误！');
			}

			session(['users'=>$user]);
			return redirect('admin/index');


		}else{
			session(['users'=>null]);
			return view('admin.login');
		}

	}

	public function code(){

		$code=new \Code;
		$_code=$code->make();

	}

	public function crypt(){

		$str='123456';
		echo Crypt::encrypt($str);
		echo '<p>';

	}

}
