<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedinuser = Auth::user();

        $text = 'Välkommen'.' '. $loggedinuser->name;

        if(!$loggedinuser->active){
            $text = 'Hej'. ' '. $loggedinuser->name. '! ' .'Ditt konto har upphört, kontakta din närmaste chef.';
        }

        return view('home', compact('text'));
    }
}
