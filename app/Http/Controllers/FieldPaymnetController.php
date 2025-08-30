<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FieldPaymnetController extends Controller
{
    public function fieldPayment () {
        return view('pages/fieldPayment');
     }
}
