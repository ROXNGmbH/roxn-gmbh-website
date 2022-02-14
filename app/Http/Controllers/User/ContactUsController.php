<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('pages.user.contact_us');
    }

    public function store(Request $request)
    {
        return $request->all();
    }

}
