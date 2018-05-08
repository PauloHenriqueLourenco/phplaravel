<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class DataController extends Controller
{
    public function lista(){
		return DB::select('
        SELECT d.id, d.name, d.description, d.category, d.basePoints, d.startDate, d.endDate, d.isActive, d.alreadyAnswered, q.id, q.text, q.type, o.id, o.text, o.value
        FROM data d 
        INNER JOIN data_question dq ON d.id = dq.id_data
        INNER JOIN question q ON q.id = dq.id_question
        INNER JOIN question_option qo ON qo.id_question = q.id
        INNER JOIN option o ON o.id = qo.id_option
        ');
	}
}
