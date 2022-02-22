<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkoutView () {
        return view('pages.user.cart.checkout');
    }

}
