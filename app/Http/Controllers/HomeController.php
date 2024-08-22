<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //if the user is not logged in then redirect the user to the user login page
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return string
     */
    public function index()
    {
//        $locale = app()->getLocale();
//        return view('user.welcome', compact('locale'));
        $locale = app()->getLocale();
        return route('user.welcome', ['locale' => $locale]);
    }

}
