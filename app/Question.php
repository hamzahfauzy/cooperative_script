<?php
namespace app;
use vendor\zframework\Model;

class Question extends Model
{
	static $table = "questions";
	static $fields = ["id","title","descriptions","created_at"];

}
