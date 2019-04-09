<?php
namespace app\controllers\Student;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\User;

class IndexController extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		return $this->view->render("student.dashboard");
	}

	function logout()
	{
		Session::destroy();
		$this->redirect()->url("/");
	}
}
