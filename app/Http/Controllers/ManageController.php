<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'client', 'useractive']);
    }

    public function index(){

    	$modules =[['Mitt företag', '/client'], ['Användare', '/users'], ['Test', '/kunder/test']];

    	return view('moduler.manage.index', compact('modules'));
    }
}
