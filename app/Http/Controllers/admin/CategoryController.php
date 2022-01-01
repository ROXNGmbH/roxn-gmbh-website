<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('media')->paginate(1, ['id', 'name', 'created_at']);

        return view('pages.admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'required|string',
            'name_de' => 'required|string',
            'status' => 'sometimes',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $category = Category::create([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de']
                ],
                'status' => $data['status'] == "on" ? 1 : 0,
            ]);

            if ($request->hasFile('image')) {
                $category->addMedia($data['image'])->toMediaCollection('category');
            }

            toast('Your category save successfully', 'success');

            return redirect()->route('categories.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');
            return redirect()->route('categories.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('pages.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name_ar' => 'required|string',
            'name_de' => 'required|string',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

             $category->update([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de']
                ],
                'status' => $request->status == "on" ? 1 : 0,
            ]);

            if ($request->hasFile('image')) {
                $category->clearMediaCollection('category');
                $category->addMedia($data['image'])->toMediaCollection('category');
            }

            toast('Your category update successfully', 'success');

            return redirect()->route('categories.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');
            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            toast('Your delete category successfully', 'success');

            return redirect()->route('categories.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('categories.index');
        }

    }
}
