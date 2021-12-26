<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tax = Tax::all();
        return view('pages.admin.tax.index', compact('tax'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.tax.create');
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
            'tax' => 'required'
        ]);

        try {
            Tax::create($data);

            toast('Your added tax successfully', 'success');

            return redirect()->route('tax.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('tax.index');
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
    public function edit(Tax $tax)
    {
        return view('pages.admin.tax.edit',compact('tax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        $data = $request->validate([
            'tax' => 'required'
        ]);

        try {
            $tax->update($data);

            toast('Your edit tax successfully', 'success');

            return redirect()->route('tax.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('tax.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        try {
            $tax->delete();

            toast('Your delete tax successfully', 'success');

            return redirect()->route('tax.index');
        } catch (\Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('tax.index');
        }
    }
}
