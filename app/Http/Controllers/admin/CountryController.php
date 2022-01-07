<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::get();
        return view('pages.admin.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.country.create');
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
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $country = Country::create($data);

            if ($request->hasFile('image')) {
                $country->addMedia($data['image'])->toMediaCollection('country');
            }

            toast('Your created country successfully', 'success');

            return redirect()->route('countries.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');
            return redirect()->route('countries.index');
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
    public function edit(Country $country)
    {
        return view('pages.admin.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $country->update($data);

            if ($request->hasFile('image')) {
                $country->clearMediaCollection('country');
                $country->addMedia($data['image'])->toMediaCollection('country');
            }

            toast('Your updated country successfully', 'success');

            return redirect()->route('countries.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');
            return redirect()->route('countries.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        try {
            $country->delete();

            toast('Your deleted country successfully', 'success');

            return redirect()->route('countries.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');
            return redirect()->route('countries.index');
        }
    }
}
