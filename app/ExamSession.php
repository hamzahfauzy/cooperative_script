<?php
namespace app;
use vendor\zframework\Model;

class ExamSession extends Model
{
	static $table = "exam_sessions";
	static $fields = ["id","name","pretest_question_id","exam_question_id","group_1_id","group_2_id","status","created_at","updated_at"];

	function pretest_question()
	{
		return $this->hasOne(Question::class,["id"=>"pretest_question_id"]);
	}

	function exam_question()
	{
		return $this->hasOne(Question::class,["id"=>"exam_question_id"]);
	}

	function group_1()
	{
		return $this->hasOne(Group::class,["id"=>"group_1_id"]);
	}

	function group_2()
	{
		return $this->hasOne(Group::class,["id"=>"group_2_id"]);
	}

	function summary()
	{
		return $this->hasOne(Summary::class,["exam_session_id"=>"id"]);
	}

	function exam_answers()
	{
		return $this->hasMany(ExamAnswer::class,["exam_session_id"=>"id"]);
	}

}
