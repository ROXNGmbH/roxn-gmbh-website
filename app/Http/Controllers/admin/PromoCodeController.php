<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\PromoCode;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = PromoCode::paginate(10);
        return view('pages.admin.promo-code.index',compact('codes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.promo-code.create');
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
            'code' => 'required|unique:promo_codes',
            'value_fixed' => 'sometimes|nullable',
            'value_percentage' => 'sometimes|nullable',
            'type' => 'required',
            'valid_price' => 'required',
            'use_number' => 'required',
            'from' => 'required',
            'to' => 'required',
            'status' => 'required'
        ]);

        try {
             PromoCode::create([
                'code' => $data['code'],
                'valid_price' => $data['valid_price'],
                'use_number' => $data['use_number'],
                'from' => $data['from'],
                'to' => $data['to'],
                'type' =>$data['type'],
                'percentage_value' => $data['value_percentage'],
                'fixed_value' => $data['value_fixed'],
                'status' => $data['status'] == "on" ? 1 : 0,
            ]);


            toast('Your promo code save successfully', 'success');

            return redirect()->route('promo-codes.index');

        } catch (\Exception $exception) {
            toast('Something error !', 'error');
            return redirect()->route('promo-codes.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function show(PromoCode $promoCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function edit(PromoCode $promoCode)
    {
        $code= $promoCode;
        return view('pages.admin.promo-code.edit',compact('code'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PromoCode $promoCode)
    {
        $data = $request->validate([
            'code' => 'required|unique:promo_codes,code,'.$promoCode->id,
            'value_fixed' => 'sometimes|nullable',
            'value_percentage' => 'sometimes|nullable',
            'type' => 'sometimes',
            'valid_price' => 'required',
            'use_number' => 'required',
            'from' => 'required',
            'to' => 'required',
            'status' => 'required'
        ]);

        try {
            $promoCode->update([
                'code' => $data['code'],
                'type' =>$data['type'],
                'valid_price' => $data['valid_price'],
                'use_number' => $data['use_number'],
                'from' => $data['from'],
                'to' => $data['to'],
                'percentage_value' => $data['value_percentage'],
                'fixed_value' => $data['value_fixed'],
                'status' => $data['status'] == "on" ? 1 : 0,
            ]);

            if ($promoCode->type == 'percentage')
            {
                $promoCode->fixed_value =null;
            }else{
                $promoCode->percentage_value = null;
            }
            $promoCode->save();


            toast('Your promo code edit successfully', 'success');

            return redirect()->route('promo-codes.index');

        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toast('Something error !', 'error');
            return redirect()->route('promo-codes.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromoCode $promoCode)
    {
        try {
            $promoCode->delete();

            toast('Your delete promo code successfully', 'success');

            return redirect()->route('promo-codes.index');

        } catch (\Exception $exception) {
            toast('Something error !', 'error');

            return redirect()->route('promo-codes.index');
        }
    }
}
