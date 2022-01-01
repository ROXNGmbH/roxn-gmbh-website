<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ManufacturingCompany;
use Illuminate\Http\Request;

class ManufacturingCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturing_companies = ManufacturingCompany::paginate(15, ['id', 'name', 'created_at']);

        return view('pages.admin.manufacturing-company.index',compact('manufacturing_companies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.manufacturing-company.create');
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
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $category = ManufacturingCompany::create([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de']
                ],
            ]);

            if ($request->hasFile('image')) {
                $category->addMedia($data['image'])->toMediaCollection('company');
            }

            toast('Your Create Manufacturing Company save successfully', 'success');

            return redirect()->route('manufacturing-companies.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');
            return redirect()->route('manufacturing-companies.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\ManufacturingCompany  $manufacturingCompany
     * @return \Illuminate\Http\Response
     */
    public function show(ManufacturingCompany $manufacturingCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\ManufacturingCompany  $manufacturingCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(ManufacturingCompany $manufacturingCompany)
    {

        return view('pages.admin.manufacturing-company.edit',compact('manufacturingCompany'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\ManufacturingCompany  $manufacturingCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManufacturingCompany $manufacturingCompany)
    {
        $data = $request->validate([
            'name_ar' => 'required|string',
            'name_de' => 'required|string',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $manufacturingCompany->update([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de']
                ],
            ]);

            if ($request->hasFile('image')) {
                $manufacturingCompany->clearMediaCollection('company');
                $manufacturingCompany->addMedia($data['image'])->toMediaCollection('company');
            }

            toast('Your manufacturing company update successfully', 'success');

            return redirect()->route('manufacturing-companies.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');
            return redirect()->route('manufacturing-companies.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\ManufacturingCompany  $manufacturingCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManufacturingCompany $manufacturingCompany)
    {
        try {
            $manufacturingCompany->delete();

            toast('You delete manufacturing Company successfully', 'success');

            return redirect()->route('manufacturing-companies.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('manufacturing-companies.index');
        }
    }
}
