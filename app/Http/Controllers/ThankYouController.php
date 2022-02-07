<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThankYouController extends Controller
{
    /**
     * return thank you view after user finish paying
     */
    public function index()
    {
        return view('pages.thank-you');
    }
}
