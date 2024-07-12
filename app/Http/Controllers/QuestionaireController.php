<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionare;

class QuestionaireController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request)
    {
        $questionare_model = Questionare::create($request->toArray());
        return response()->json([
            'success' => $questionare_model ? true : false,
            'message' => $questionare_model ? 'Questionare Successfully Created' : 'Error creating Questionare',
            'data' => $questionare_model
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $questionare_model = Questionare::findOrFail($id);
        $questionare_model->update($request->all());
        return response()->json([
            'success' => $questionare_model ? true : false,
            'message' => $questionare_model ? 'Questionare Successfully Updated' : 'Error updating Questionare',
            'data' => $questionare_model
        ], 200);
    }

    public function index(Request $request)
    {
            $query = Questionare::join('categories', 'questionaires.category_id', '=', 'categories.id')
            ->get(['questionaires.*', 'categories.name']);
             
        // $query = Questionare::get();
        return response($query, 200);
    }
    public function show($validQuestion)
    {
            $query = Questionare::join('categories', 'questionaires.category_id', '=', 'categories.id')
            ->where('is_show',$validQuestion)
            ->orderby('categories.name','asc')
             ->get(['questionaires.*', 'categories.name']);
        return response($query, 200);
    }

    public function destroy(Request $request, $id) {
        $questionare_model = Questionare::findOrFail($id);
        $questionare_model->delete($request->all());
        return response()->json([
            'success' => $questionare_model ? true : false,
            'message' => $questionare_model ? 'Questionare Successfully Deleted' : 'Error deleting Questionare'
        ], 200);
    }
}
