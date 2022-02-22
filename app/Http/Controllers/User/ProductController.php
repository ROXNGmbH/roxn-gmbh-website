<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('pages.user.product');
    }

    public function filter_product(){
        return view('pages.user.filter_product');
    }
}
