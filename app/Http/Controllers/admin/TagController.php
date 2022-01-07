<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::get();

        return view('pages.admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.tag.create');
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
             'name_de' => 'required|string'
        ]);

        try{
            Tag::create([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de'],
                ]
            ]);

            toast('Your added tag successfully', 'success');

            return redirect()->route('tags.index');

        }catch(\Exception $exception){

            toast('Something error !', 'error');

            return redirect()->route('tags.index');
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
    public function edit(Tag $tag)
    {
        return view('pages.admin.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name_ar' => 'required|string',
            'name_de' => 'required|string'
        ]);

        try{
            $tag->update([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de'],
                ]
            ]);

            toast('Your updated tag successfully', 'success');

            return redirect()->route('tags.index');

        }catch(\Exception $exception){

            toast('Something error !', 'error');

            return redirect()->route('tags.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        try{
            $tag->delete();

            toast('Your deleted tag successfully', 'success');

            return redirect()->route('tags.index');

        }catch(\Exception $exception){

            toast('Something error !', 'error');

            return redirect()->route('tags.index');
        }
    }
}
