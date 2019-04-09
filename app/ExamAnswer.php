<?php
namespace app;
use vendor\zframework\Model;

class ExamAnswer extends Model
{
	static $table = "exam_answers";
	static $fields = ["id","exam_session_id","NIS","answer","student_as","answer_grade","created_at"];

	function student()
	{
		return $this->hasOne(Student::class,["NIS"=>"NIS"]);
	}

	function exam_session()
	{
		return $this->hasOne(ExamSession::class,["id"=>"exam_session_id"]);
	}

}
