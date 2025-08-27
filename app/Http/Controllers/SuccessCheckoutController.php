<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuccessCheckoutController extends Controller
{
    public function viewCO () {
        return view("pages/successCheckout");
    }
}
