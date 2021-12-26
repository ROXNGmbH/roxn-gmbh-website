<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DeliveryTime;
use App\Models\Admin\ManufacturingCompany;
use Illuminate\Http\Request;

class DeliveryTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = DeliveryTime::all();

        return view('pages.admin.delivery-time.index',compact('times'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.delivery-time.create');
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
            'from' => 'required',
            'to' => 'required',
            'type' => 'required',
        ]);

        try {

           DeliveryTime::create($data);

            toast('Your Create delivery time save successfully', 'success');

            return redirect()->route('delivery-times.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');
            return redirect()->route('delivery-times.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryTime $deliveryTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryTime $deliveryTime)
    {
        return view('pages.admin.delivery-time.edit',compact('deliveryTime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryTime $deliveryTime)
    {
        $data = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'type' => 'required',
        ]);

        try {

            $deliveryTime->update($data);

            toast('Your edit delivery time save successfully', 'success');

            return redirect()->route('delivery-times.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');
            return redirect()->route('delivery-times.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryTime $deliveryTime)
    {
        try {
            $deliveryTime->delete();

            toast('You delete delivery time successfully', 'success');

            return redirect()->route('delivery-times.index');

        } catch (\Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('delivery-times.index');
        }
    }
}
