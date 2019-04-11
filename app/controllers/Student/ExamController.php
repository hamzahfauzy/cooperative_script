<?php
namespace app\controllers\Student;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\User;
use app\ExamSession;
use app\Student;
use app\GroupMember;
use app\Question;
use app\ExamAnswer;

class ExamController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->student = Student::find(Session::user()->username);
		$this->groupMember = GroupMember::where('NIS',$this->student->NIS)->first();
		$this->examsession = ExamSession::where('group_1_id',$this->groupMember->group_id)->orwhere('group_2_id',$this->groupMember->group_id)->first();
	}

	function index()
	{
		if($this->examsession->status == 1){
			$question = Question::find($this->examsession->pretest_question_id);
		}else{
			$question = Question::find($this->examsession->exam_question_id);
		}

		$group = Session::user()->student()->groupMember()->group();
		$data['examsession'] = $this->examsession;
		$data['question'] = $question;
		$data['group'] = $group;
		return $this->view->render("student.exam")->with($data);
	}

	function answer(Request $request)
	{
		$examanswer = new ExamAnswer;
		$examanswer->save([
			'exam_session_id'		=> $this->examsession->id,
			'NIS'					=> $this->student->NIS,
			'answer'				=> $request->answer,
		]);
		$this->redirect()->url("/student");
	}

	function logout()
	{
		Session::destroy();
		$this->redirect()->url("/");
	}
}
