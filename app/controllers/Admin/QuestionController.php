<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\Question;
use app\User;

class QuestionController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->question = new Question;
	}

	function index()
	{
		$questions = $this->question->get();
		$data["questions"] = $questions;
		return $this->view->render("admin.question.index")->with($data);
	}

	function create()
	{
		$data["link"] = "insert";
		return $this->view->render("admin.question.form")->with($data);
	}

	function edit($id)
	{
		$question = $this->question->find($id);
		$data["question"] = $question;
		$data["link"] = "update";
		return $this->view->render("admin.question.form")->with($data);
	}

	function insert(Request $request)
	{
		$question = new Question;
		$question->save([
			'title'=>$request->title,
			'descriptions'=>$request->descriptions
		]);
		$this->redirect()->url("/admin/question");
		return;
	}

	function update(Request $request)
	{
		$question = $this->question->where("id",$request->id)->first();
		$question->save([
			'title'			=> 	$request->title,
			'descriptions'	=>	$request->descriptions
		]);
		$this->redirect()->url("/admin/question");
		return;
	}

	function delete($id)
	{
		Question::delete($id);
		$this->redirect()->url("/admin/question");
		return;	
	}

	function logout()
	{
		Session::destroy();
		$this->redirect()->url("/");
	}
}
