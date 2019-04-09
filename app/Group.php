<?php
namespace app;
use vendor\zframework\Model;

class Group extends Model
{
	static $table = "groups";
	static $fields = ["id","name"];

	function group_member()
	{
		return $this->hasMany(GroupMember::class, ["id"=>"group_id"]);
	}
}
