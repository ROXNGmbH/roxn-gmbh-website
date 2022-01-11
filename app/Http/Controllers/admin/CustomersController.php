<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\Conversions\ImageGenerators\Pdf;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::paginate();

        return view('pages.admin.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.customers.create');

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
           'name'=>'required',
           'title'=>'required',
           'converse'=>'required',
           'nickname'=>'required',
           'type'=>'required',
           'email'=>'required|unique:users',
           'mobile'=>'required',
           'password'=>'required',
           'password_confirm'=>'required|same:password',
           'status'=>'required',
           'address'=>'required',
           'zip_code'=>'required',
           'area'=>'required',
           'country'=>'required',
        ]);

        try {
            $user = User::create([
                'name'=> $request->name,
                'title'=>$request->title,
                'converse'=> $request->converse,
                'nickname'=> $request->nickname,
                'type'=> $request->type,
                'email'=> $request->email,
                'mobile'=> $request->mobile,
                'password' => Hash::make($request->password),
                'status' => $request->status,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'area' => $request->area,
                'country' => $request->country,
            ]);

            toast('Your customer save successfully', 'success');

            return redirect()->route('customers.index');
        }catch (\Exception $exception){
            toast('Something error !', 'error');
            return redirect()->route('customers.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $customer)
    {
        return view('pages.admin.customers.edit',compact('customer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $customer)
    {

        $data = $request->validate([
            'name'=>'required',
            'title'=>'required',
            'converse'=>'required',
            'nickname'=>'required',
            'type'=>'required',
            'email'=>'required|unique:users,email,' . $customer->id,
            'mobile'=>'required',
            'status'=>'required',
            'address'=>'required',
            'zip_code'=>'required',
            'area'=>'required',
            'country'=>'required',
        ]);

        try {
            $customer->update($data);

            toast('Your customer edit successfully', 'success');

            return redirect()->route('customers.index');

        }catch (\Exception $exception){
            toast('Something error !', 'error');

            return redirect()->route('customers.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
