<?php
namespace app\controllers;
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
		return $this->view->render("index");
	}

	function login()
	{
		$error = isset($_GET['error']) ? $_GET['error'] : '';
		$data["error"] = $error;
		return $this->view->render("login")->with($data);
	}

	function doLogin(Request $request)
	{
		$user = User::where("username",$request->username)->where("password",md5($request->password))->first();
		if(!empty($user))
		{
			Session::set("id",$user->id);
			$this->redirect()->url($user->level == 1 ? "/admin" : "/student");
			return;
		}
		else
		{
			$this->redirect()->url("/?error=invalid");
		}
	}

	function logout()
	{
		Session::destroy();
		$this->redirect()->url("/");
	}
}
