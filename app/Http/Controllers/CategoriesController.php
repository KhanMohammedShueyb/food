<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

// class CategoriesController extends Controller
// {
//     public function store(Request $request)
//     {
//         $categories_model = Categories::create($request->toArray());
//         return response()->json([
//             'success' => $categories_model ? true : false,
//             'message' => $categories_model ? 'Questionare Successfully Created' : 'Error creating Questionare',
//             'data' => $categories_model
//         ], 200);
//     }
//     public function index(Request $request)
//     {
//         $query = Categories::get();
//         return response($query, 200);
//     }
//     public function destroy(Request $request, $id) {
//         $categories_model = Categories::findOrFail($id);
//         $categories_model->delete($request->all());
//         return response()->json([
//             'success' => $categories_model ? true : false,
//             'message' => $categories_model ? 'Questionare Successfully Deleted' : 'Error deleting Questionare'
//         ], 200);
//     }
//     public function update(Request $request, $id)
//     {
//         $categories_model = Categories::findOrFail($id);
//         $categories_model->update($request->all());
//         return response()->json([
//             'success' => $categories_model ? true : false,
//             'message' => $categories_model ? 'Questionare Successfully Updated' : 'Error updating Questionare',
//             'data' => $categories_model
//         ], 200);
//     }
// }
