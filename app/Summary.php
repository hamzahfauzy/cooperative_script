<?php
namespace app;
use vendor\zframework\Model;

class Summary extends Model
{
	static $table = "summaries";
	static $fields = ["id","exam_session_id","question_id","summary_for","descriptions","created_at"];

	function exam_session()
	{
		return $this->hasOne(ExamSession::class,["id"=>"exam_session_id"]);
	}

}
