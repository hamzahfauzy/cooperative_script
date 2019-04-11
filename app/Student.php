<?php
namespace app;
use vendor\zframework\Model;

class Student extends Model
{
	static $table = "students";
	static $fields = ["NIS","fullname","address"];

	function user()
	{
		return $this->hasOne(User::class,["NIS"=>"username"]);
	}

	function groupMember()
	{
		return $this->hasOne(GroupMember::class,["NIS"=>"NIS"]);
	}
}
