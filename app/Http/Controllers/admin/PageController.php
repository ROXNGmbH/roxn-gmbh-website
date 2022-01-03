<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages.admin.website-pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.website-pages.create');
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
            'title_ar' => 'required|string',
            'title_de' => 'required|string',
            'description_ar' => 'required|string',
            'description_de' => 'required|string'
        ]);

        try {
            Page::create([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de']
                ],
                'title' => [
                    'ar' => $data['title_ar'],
                    'de' => $data['title_de']
                ],
                'description' => [
                    'ar' => $data['description_ar'],
                    'de' => $data['description_de']
                ],
                'status' => $request->status ? 1 : 0,
            ]);

            toast('You Add page successfully', 'success');

            return redirect()->route('pages.index');

        } catch (Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('pages.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('pages.admin.website-pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'name_ar' => 'required|string',
            'name_de' => 'required|string',
            'title_ar' => 'required|string',
            'title_de' => 'required|string',
            'description_ar' => 'required|string',
            'description_de' => 'required|string'
        ]);

        try {
            $page->update([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de']
                ],
                'title' => [
                    'ar' => $data['title_ar'],
                    'de' => $data['title_de']
                ],
                'description' => [
                    'ar' => $data['description_ar'],
                    'de' => $data['description_de']
                ],
                'status' => $request->status == "on" ? 1 : 0,
            ]);

            toast('You edit page successfully', 'success');

            return redirect()->route('pages.index');

        } catch (Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('pages.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        try {
            $page->delete();

            toast('You delete page successfully', 'success');

            return redirect()->route('pages.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('pages.index');
        }
    }
}
