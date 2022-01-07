<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DeliveryTime;
use App\Models\Admin\ManufacturingCompany;
use App\Models\Admin\ProductFlag;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\SellType;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Tax;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('pages.admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tax = Tax::get(['id','tax']);
        $delivery_times = DeliveryTime::get(['id','from','to','type']);
        $categories = Category::get(['id','name']);
        $sub_categories = SubCategory::get(['id','name']);
        $manafacturing_companies = ManufacturingCompany::get(['id','name']);
        $sell_types = SellType::get(['id','name']);
        $flags = ProductFlag::get(['id','name']);
        $unit = Unit::get(['id','name']);
        $countries = Country::get();
        $tags = Tag::get();
        return view('pages.admin.product.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('pages.admin.product.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_sub_category(Request $request){

        $sub_categories = SubCategory::where('category_id',$request->category_id)->get();

        return response()->json([
           'sub_categories' => $sub_categories
        ]);
    }
}
