<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\Student;
use app\User;

class StudentController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->student = new Student;
	}

	function index()
	{
		$students = $this->student->get();

		$data["students"] = $students;
		return $this->view->render("admin.student.index")->with($data);
	}

	function create()
	{
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		$data["error"] = $error;
		$data["link"] = "insert";
		return $this->view->render("admin.student.form")->with($data);
	}

	function edit($NIS)
	{
		$student = $this->student->find($NIS);
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		$data["error"] = $error;
		$data["student"] = $student;
		$data["link"] = "update";
		return $this->view->render("admin.student.form")->with($data);
	}

	function insert(Request $request)
	{
		$student = $this->student->where("NIS",$request->NIS)->first();
		if(!empty($student))
		{
			$this->redirect()->url("/admin/student/create?error=exists");
			return;
		}
		$student = new Student;
		$param = (array) $request;

		if($student->save($param))
		{
			$user = new User;
			$user->username = $request->NIS;
			$user->password = md5($request->NIS);
			$user->level = 2;
			$user->save();
			$this->redirect()->url("/admin/student");
		}
		return;
	}

	function update(Request $request)
	{
		$student = $this->student->where("NIS",$request->NIS)->first();
		$param = (array) $request;

		if($student->save($param))
		{
			$this->redirect()->url("/admin/student");
		}
		return;
	}

	function delete(Student $NIS)
	{
		Student::delete($NIS->NIS);
		$user = User::where("username",$NIS->NIS)->first();
		User::delete($user->id);
		$this->redirect()->url("/admin/student");
		return;	
	}

	function logout()
	{
		Session::destroy();
		$this->redirect()->url("/");
	}
}
