<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\Group;
use app\Student;
use app\GroupMember;
use app\User;

class GroupController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->group = new Group;
	}

	function index()
	{
		$groups = $this->group->get();
		$data["groups"] = $groups;
		return $this->view->render("admin.group.index")->with($data);
	}

	function create()
	{
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		$data["error"] = $error;
		$data["link"] = "insert";
		return $this->view->render("admin.group.form")->with($data);
	}

	function createMember($id)
	{
		$group = $this->group->find($id);
		$students = Student::get();
		$data["group"] = $group;
		$data["students"] = $students;
		$groupMember = GroupMember::get();
		$members = [];
		foreach($groupMember as $member){
			$members[] = $member->NIS;
		}
		$data['members'] = $members;
		$data["link"] = "insert";
		return $this->view->render("admin.group.formMember")->with($data);
	}

	function edit($id)
	{
		$group = $this->group->find($id);
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		$data["error"] = $error;
		$data["group"] = $group;
		$data["link"] = "update";
		return $this->view->render("admin.group.form")->with($data);
	}

	function show($id)
	{
		$group = $this->group->find($id);
		$data['group'] = $group;
		return $this->view->render("admin.group.show")->with($data);
	}

	function insert(Request $request)
	{
		$group = new Group;
		$group->save(['name'=>$request->name]);
		$this->redirect()->url("/admin/group");
		return;
	}

	function insertMember(Request $request)
	{
		$group = Group::find($request->id);
		$groupMember = new GroupMember;
		$groupMember->save([
			'group_id'	=> $request->group_id,
			'NIS'		=> $request->NIS
		]);
		$this->redirect()->url("/admin/group/show/".$request->group_id);
		return;
	}

	function update(Request $request)
	{
		$group = $this->group->where("id",$request->id)->first();
		$group->save(['name'=>$request->name]);
		$this->redirect()->url("/admin/group");
		return;
	}

	function delete($id)
	{
		Group::delete($id);
		$this->redirect()->url("/admin/group");
		return;
	}
	
	function deleteMember($id,$NIS)
	{
		$member = GroupMember::where('group_id',$id)->where('NIS',$NIS)->first();
		GroupMember::delete($member->id);
		$this->redirect()->url("/admin/group/show/".$id);
		return;	
	}

	function logout()
	{
		Session::destroy();
		$this->redirect()->url("/");
	}
}
