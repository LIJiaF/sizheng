<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\NewsModel;
use App\Http\Model\TeacherModel;
use App\Http\Model\StudyModel;
use App\Http\Model\CourseModel;
use App\Http\Model\PracticeModel;

class IndexController extends Controller
{
    
	public function index(){

		$newsData=NewsModel::orderBy('news_time','desc')->take(8)->get();
		$stuData=StudyModel::orderBy('stu_time','desc')->take(3)->get();
		$couData=CourseModel::orderBy('cou_time','desc')->take(3)->get();
		$praData=PracticeModel::orderBy('pra_time','desc')->take(3)->get();

		return view('home.main',compact('newsData','stuData','couData','praData'));

	}

	public function news($id){

		$data=NewsModel::find($id);
		NewsModel::where('news_id',$id)->increment('news_view');
		return view('home.newsitem',compact('data'));

	}

	public function study($id){

		$data=StudyModel::find($id);
		StudyModel::where('stu_id',$id)->increment('stu_view');
		return view('home.stuitem',compact('data'));

	}

	public function course($id){

		$data=CourseModel::find($id);
		CourseModel::where('cou_id',$id)->increment('cou_view');
		return view('home.couitem',compact('data'));

	}

	public function practice($id){

		$data=PracticeModel::find($id);
		PracticeModel::where('pra_id',$id)->increment('pra_view');
		return view('home.praitem',compact('data'));

	}

	public function department(){

		$data=TeacherModel::orderBy('tea_view','desc')->take(2)->get();
		return view('home.department',compact('data'));

	}

	public function teacherTeam(){

		$data=TeacherModel::all();
		return view('home.teacherTeam',compact('data'));
		
	}

	public function teacherTeamList($id){

		$teaList=TeacherModel::find($id);
		TeacherModel::where('tea_id',$id)->increment('tea_view');
		return view('home.teacherTeamList',compact('teaList'));
		
	}

	public function studyList(){

		$stuData=StudyModel::orderBy('stu_time','desc')->paginate(20);
		$stuView=StudyModel::orderBy('stu_view','desc')->take(5)->get();
		$stuNew=StudyModel::orderBy('stu_time','desc')->take(5)->get();
		return view('home.study',compact('stuData','stuView','stuNew'));
		
	}

	public function practiceList(){

		$praData=PracticeModel::orderBy('pra_time','desc')->paginate(20);
		$praView=PracticeModel::orderBy('pra_view','desc')->take(5)->get();
		$praNew=PracticeModel::orderBy('pra_time','desc')->take(5)->get();
		return view('home.practice',compact('praData','praView','praNew'));
		
	}

	public function courseList(){

		$couData=CourseModel::orderBy('cou_time','desc')->paginate(20);
		$couView=CourseModel::orderBy('cou_view','desc')->take(5)->get();
		$couNew=CourseModel::orderBy('cou_time','desc')->take(5)->get();
		return view('home.course',compact('couData','couView','couNew'));
		
	}

}
