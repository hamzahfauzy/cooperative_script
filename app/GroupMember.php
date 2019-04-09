<?php
namespace app;
use vendor\zframework\Model;

class GroupMember extends Model
{
	static $table = "group_members";
	static $fields = ["id","group_id","NIS"];

	function student()
	{
		return $this->hasOne(Student::class, ["NIS"=>"NIS"]);
	}
}
