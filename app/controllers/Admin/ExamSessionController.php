<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\Student;
use app\User;
use app\ExamSession;
use app\Question;
use app\Group;

class ExamSessionController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->examsession = new ExamSession;
	}

	function index()
	{
		$examsessions = $this->examsession->get();
		$data["examsessions"] = $examsessions;
		return $this->view->render("admin.examsession.index")->with($data);
	}

	function show($id)
	{
		$examsession = $this->examsession->find($id);
		$data["examsession"] = $examsession;
		return $this->view->render("admin.examsession.show")->with($data);
	}

	function create()
	{
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		$questions = Question::get();
		$students = Student::get();
		$groups = Group::get();
		$examsessions = ExamSession::get();
		$group_1 = [];
		$group_2 = [];
		// foreach( $examsessions as $examsession ){
		// 	$group_1[] = $examsession->group_1_id;
		// 	$group_2[] = $examsession->group_2_id;
		// };
		$data["error"] = $error;
		$data["questions"] = $questions;
		$data["group_1"] = $group_1;
		$data["group_2"] = $group_2;
		$data["students"] = $students;
		$data["groups"] = $groups;
		$data["link"] = "insert";
		return $this->view->render("admin.examsession.form")->with($data);
	}

	function edit($id)
	{
		$examsession = $this->examsession->find($id);
		$questions = Question::get();
		$students = Student::get();
		$groups = Group::get();
		$data["examsession"] = $examsession;
		$data["questions"] = $questions;
		$data["students"] = $students;
		$data["groups"] = $groups;
		$data["link"] = "update";
		return $this->view->render("admin.examsession.form")->with($data);
	}

	function insert(Request $request)
	{

		if($request->group_1_id == $request->group_2_id)
		{
			$this->redirect()->url("/admin/examsession/create");
			return;
		}
		$examsession = new ExamSession;
		$examsession->save([
			'name'					=>	$request->name,
			'pretest_question_id'	=>	$request->pretest_question_id,
			'exam_question_id'		=>	$request->exam_question_id,
			'group_1_id'			=>	$request->group_1_id,
			'group_2_id'			=>	$request->group_2_id,
			'status'				=>	1
		]);
		$this->redirect()->url("/admin/examsession");
		return;
	}

	function update(Request $request)
	{
		if($request->group_1_id == $request->group_2_id)
		{
			$this->redirect()->url("/admin/examsession/update");
			return;
		}
		$examsession = ExamSession::find($request->id);
		$examsession->save([
			'name'					=>	$request->name,
			'pretest_question_id'	=>	$request->pretest_question_id,
			'exam_question_id'		=>	$request->exam_question_id,
			'group_1_id'			=>	$request->group_1_id,
			'group_2_id'			=>	$request->group_2_id,
		]);
		$this->redirect()->url("/admin/examsession");
		return;
	}

	function delete($id)
	{
		ExamSession::delete($id);
		$this->redirect()->url("/admin/examsession");
		return;	
	}

	function finish($id)
	{
		$examsession = ExamSession::find($id);
		$examsession->save([
			'status' =>	$examsession->status+1
		]);
		$this->redirect()->url("/admin/examsession/show/".$id);
		return;
	}

	function logout()
	{
		Session::destroy();
		$this->redirect()->url("/");
	}
}
