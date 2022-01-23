<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\SubSubCategory;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use function view;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_sub_categories  = SubSubCategory::with('subCategory')->paginate(10);

        return view('pages.admin.sub-sub-category.index',compact('sub_sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status',0)->get(['id','name']);


        return view('pages.admin.sub-sub-category.create',compact('categories'));
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
            'sub_category' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $sub_category = SubSubCategory::create([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de']
                ],
                'sub_category_id' => $data['sub_category'],
                'status' => $request->status  ? 1 : 0,
            ]);

            if ($request->hasFile('image')) {
                $sub_category->addMedia($data['image'])->toMediaCollection('subSubCategory');
            }

            toast('Your sub category save successfully', 'success');

            return redirect()->route('sub-sub-categories.index');

        } catch (\Exception $exception) {
            ray($exception->getMessage());
            toast('Something error !', 'error');
            return redirect()->route('sub-sub-categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubSubCategory $subSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSubCategory $subSubCategory)
    {
        $categories = Category::where('status',1)->get(['id','name']);
        $subCategories = SubCategory::where(['category_id'=>$subSubCategory->subCategory->category->id,'status'=>1])->get(['id','name']);

        return view('pages.admin.sub-sub-category.edit',compact('subSubCategory','categories','subCategories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSubCategory $subSubCategory)
    {
        $data = $request->validate([
            'name_ar' => 'required|string',
            'name_de' => 'required|string',
            'sub_category' => 'required',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $subSubCategory->update([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de']
                ],
                'sub_category_id' => $data['sub_category'],
                'status' => $request->status  ? 1 : 0,
            ]);

            if ($request->hasFile('image')) {
                $subSubCategory->clearMediaCollection('subSubCategory');
                $subSubCategory->addMedia($data['image'])->toMediaCollection('subSubCategory');
            }

            toast('Your sub sub category edited successfully', 'success');

            return redirect()->route('sub-sub-categories.index');

        } catch (\Exception $exception) {
            ray($exception->getMessage());
            toast('Something error !', 'error');
            return redirect()->route('sub-sub-categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubSubCategory $subSubCategory)
    {
        try {
            $subSubCategory->delete();

            toast('Your delete sub sub category successfully', 'success');

            return redirect()->route('sub-sub-categories.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('sub--sub-categories.index');
        }
    }
}
