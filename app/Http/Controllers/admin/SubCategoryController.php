<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = SubCategory::with('category')->paginate(10);

        return view('pages.admin.sub-category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.admin.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'required|string',
            'name_de' => 'required|string',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $sub_category = SubCategory::create([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de']
                ],
                'category_id' => $data['category_id'],
                'status' => $request->status == "on" ? 1 : 0,
            ]);

            if ($request->hasFile('image')) {
                $sub_category->addMedia($data['image'])->toMediaCollection('subCategory');
            }

            toast('Your sub category save successfully', 'success');

            return redirect()->route('sub-categories.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');
            return redirect()->route('sub-categories.index');
        }
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
    public function edit(SubCategory $sub_category)
    {
        $categories = Category::all();

        return view('pages.admin.sub-category.edit', compact('sub_category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SubCategory $sub_category)
    {
        $data = $request->validate([
            'name_ar' => 'required|string',
            'name_de' => 'required|string',
            'category_id' => 'required',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $sub_category->update([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de']
                ],
                'category_id' => $data['category_id'],
                'status' => $request->status == "on" ? 1 : 0,
            ]);

            if ($request->hasFile('image')) {
                $sub_category->clearMediaCollection('subCategory');
                $sub_category->addMedia($data['image'])->toMediaCollection('subCategory');
            }

            toast('Your sub category updated successfully', 'success');

            return redirect()->route('sub-categories.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');
            return redirect()->route('sub-categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {
        try {
            $sub_category->delete();

            toast('Your delete sub category successfully', 'success');

            return redirect()->route('sub-categories.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('sub-categories.index');
        }
    }
}
