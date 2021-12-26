<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductFlag;
use App\Models\SellType;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductFlagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_flags = ProductFlag::all();
        return view('pages.admin.product-flag.index',compact('product_flags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.product-flag.create');
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
            'name_ar' => 'required|string|max:55',
            'name_de' => 'required|string|max:55'
        ]);

        try{
            ProductFlag::create(['name' => [
                'ar' => $data['name_ar'],
                'de' => $data['name_de']
            ]]);

            toast('Your added product flag successfully', 'success');

            return redirect()->route('product-flags.index');

        }catch(\Exception $exception){

            toast('Something error !', 'error');

            return redirect()->route('product-flags.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\ProductFlag  $productFlag
     * @return \Illuminate\Http\Response
     */
    public function show(ProductFlag $productFlag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\ProductFlag  $productFlag
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductFlag $productFlag)
    {
        return view('pages.admin.product-flag.edit',compact('productFlag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\ProductFlag  $productFlag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductFlag $productFlag)
    {
        $data = $request->validate([
            'name_ar' => 'required|string|max:55',
            'name_de' => 'required|string|max:55'
        ]);

        try{
            $productFlag->update(['name' => [
                'ar' => $data['name_ar'],
                'de' => $data['name_de']]
            ]);

            toast('You edit product flag successfully', 'success');

            return redirect()->route('product-flags.index');

        }catch(\Exception $exception){

            toast('Something error !', 'error');

            return redirect()->route('product-flags.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\ProductFlag  $productFlag
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductFlag $productFlag)
    {
        try {
            $productFlag->delete();

            toast('Your delete product flag successfully', 'success');

            return redirect()->route('product-flags.index');
        } catch (\Exception $exception) {

            toast('Something error !', 'error');

            return redirect()->route('tax.index');
        }
    }

}
