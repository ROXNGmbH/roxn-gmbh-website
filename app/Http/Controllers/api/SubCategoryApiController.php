<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * get all sub category by category id
     *
     * @return \Illuminate\Http\Response
     */
    public function getSubCategoryByCategory($category_id) :object
    {
        $sub_categories = SubCategory::where(['category_id'=>$category_id,'status'=>1])->get(['id','name']);

        return response()->json([
            'sub_categories' => $sub_categories
        ]);
    }

}
