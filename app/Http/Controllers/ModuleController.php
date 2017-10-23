<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'client', 'useractive']);
    }

    public function index(){

    	$modules =[['Kunder', '/kunder'], ['Leverantörer', '/moduler'], ['Test', '/kunder/test'], ['Orders', '/moduler'], ['Övrigt', '/manage']];

    	return view('moduler.index', compact('modules'));
    }
}
