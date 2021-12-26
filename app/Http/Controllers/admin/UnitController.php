<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units =  Unit::all();
        return view('pages.admin.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.unit.create');
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
           'name' => 'required|string|max:20'
        ]);

        try{
            Unit::create($data);

            toast('Your added unit successfully', 'success');

            return redirect()->route('units.index');

        }catch(\Exception $exception){

            toast('Something error !', 'error');

            return redirect()->route('units.index');
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
    public function edit(Unit $unit)
    {
         return view('pages.admin.unit.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $data = $request->validate([
            'name' => 'required|string|max:20'
        ]);

        try{
            $unit->update($data);

            toast('Your edit unit successfully', 'success');

            return redirect()->route('units.index');

        }catch(\Exception $exception){

            toast('Something error !', 'error');

            return redirect()->route('units.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        try{
            $unit->delete();

            toast('Your delete unit successfully', 'success');

            return redirect()->route('units.index');

        }catch(\Exception $exception){
            toast('Something error !', 'error');

            return redirect()->route('units.index');
        }
    }
}
