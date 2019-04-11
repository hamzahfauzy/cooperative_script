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
		$examsession = ExamSession::where('group_1_id',$this->groupMember->group_id)->orwhere('group_2_id',$this->groupMember->group_id)->get();

		$this->examsession = [];
		foreach($examsession as $session)
		{
			if($session->status == 3)
				continue;

			$this->examsession = $session;
			break;
		}
	}

	function index()
	{
		if(!empty($this->examsession))
		{
			if($this->examsession->status == 1){
				$view = "student.pretest";
				$question = Question::find($this->examsession->pretest_question_id);
			}else{
				$view = "student.exam";
				$question = Question::find($this->examsession->exam_question_id);
			}

			$group = Session::user()->student()->groupMember()->group();
			$data['examsession'] = $this->examsession;
			$data['question'] = $question;
			$data['group'] = $group;

			return $this->view->render("student.exam")->with($data);
		}
		else
		{
			return $this->view->render("student.no-exam");
		}
	}

	function lists()
	{
		$examsessions = ExamSession::where('group_1_id',$this->groupMember->group_id)->orwhere('group_2_id',$this->groupMember->group_id)->get();
		$exam_sessions = [];
		foreach($examsessions as $session)
		{
			if($session->status == 3)
				$exam_sessions[] = $session;
		}
		$data["examsessions"] = $exam_sessions;
		return $this->view->render("student.exam-lists")->with($data);
	}

	function show($id)
	{
			$group = Session::user()->student()->groupMember()->group();
			$data['examsession'] = ExamSession::find($id);
			$data['group'] = $group;

			return $this->view->render("student.exam-show")->with($data);
	}

	function answer(Request $request)
	{
		$examanswer = new ExamAnswer;
		$examanswer->save([
			'exam_session_id'		=> $this->examsession->id,
			'NIS'					=> $this->student->NIS,
			'answer'				=> $request->answer,
			'answer_parent_id'		=> $request->student_as == 1 ? 0 : $request->answer_parent_id,
			'exam_type'				=> $request->exam_type,
			'student_as'			=> $request->student_as,
			'answer_grade'			=> 0,
		]);
		$this->redirect()->url("/student/exam");
	}

	function logout()
	{
		Session::destroy();
		$this->redirect()->url("/");
	}
}
