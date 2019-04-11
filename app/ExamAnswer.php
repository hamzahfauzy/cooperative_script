<?php
namespace app;
use vendor\zframework\Model;

class ExamAnswer extends Model
{
	static $table = "exam_answers";
	static $fields = ["id","exam_session_id","answer_parent_id","NIS","answer","student_as","exam_type","answer_grade","created_at"];

	function student()
	{
		return $this->hasOne(Student::class,["NIS"=>"NIS"]);
	}

	function exam_session()
	{
		return $this->hasOne(ExamSession::class,["id"=>"exam_session_id"]);
	}

	function replied()
	{
		return $this->hasOne(ExamAnswer::class,["answer_parent_id"=>"id"]);
	}

	function parent_answer()
	{
		return $this->hasOne(ExamAnswer::class,["id"=>"answer_parent_id"]);	
	}

}
