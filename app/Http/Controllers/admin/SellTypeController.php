<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SellType;
use App\Models\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class
SellTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sell_types = SellType::all();
        return view('pages.admin.sell-type.index', compact('sell_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.admin.sell-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'required|string|max:55',
            'name_de' => 'required|string|max:55'
        ]);

        try {
            SellType::create([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de']
                ]
            ]);

            toast('Your added unit successfully', 'success');

            return redirect()->route('sell-types.index');

        } catch (Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('sell-type.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param SellType $sellType
     * @return Response
     */
    public function show(SellType $sellType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SellType $sellType
     * @return Response
     */
    public function edit(SellType $sellType)
    {
        return view('pages.admin.sell-type.edit', compact('sellType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param SellType $sellType
     * @return Response
     */
    public function update(Request $request, SellType $sellType)
    {
        $data = $request->validate([
            'name_ar' => 'required|string|max:55',
            'name_de' => 'required|string|max:55'
        ]);

        try {
            $sellType->update(['name' => [
                'ar' => $data['name_ar'],
                'de' => $data['name_de']
            ]]);

            toast('You edit sell type successfully', 'success');

            return redirect()->route('sell-types.index');

        } catch (Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('sell-type.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SellType $sellType
     * @return Response
     */
    public function destroy(SellType $sellType)
    {
        try {
            $sellType->delete();

            toast('You deleted sell type successfully', 'success');

            return redirect()->route('sell-types.index');

        } catch (Exception $exception) {
            toast('Something error !', 'error');

            return redirect()->route('sell-types.index');
        }
    }
}
