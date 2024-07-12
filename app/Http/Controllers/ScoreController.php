<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use DB;

class ScoreController extends Controller
{
    public function index()
    {
        // $query = DB::table('scores')
        $query = Score::
         select('scores.*',DB::raw("CONCAT(users.first_name, ' ', users.last_name) as full_name"))
         ->leftjoin('users', 'scores.user_id', '=', 'users.id');
         $query = $query->get();
        return response($query, 200);
    }
    public function store(Request $request)
    {
        $request['patient_id']= substr(str_shuffle("0123456789AQWERTYUIOPASDFGHJKLZXCVBNM"),0, 6);
        $score_model = Score::create($request->toArray());
        return response()->json([
            'success' => $score_model ? true : false,
            'message' => $score_model ? 'Score Successfully Created' : 'Error creating Score',
            'data' => $score_model
        ], 200);
    }

    public function update(Request $request, $id)
    {
        //    $query=Score::where('id',$request->scoreId)
        $query_model = Score::find($id);
        $query_model->update($request->all());
           return response($query_model, 200);
    } 
}
