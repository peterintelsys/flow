<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;

class ClientController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'client', 'useractive']);
    }

    public function index(){

    	$user = Auth::user();
    	
    	$client = Client::where('id', $user->client_id)->first();


    	return view('moduler.clients.index', compact('client'));
    }

    public function edit(){

    	$user = Auth::user();

    	$client = Client::where('id', $user->client_id)->first();

    	return view('moduler.clients.edit', compact('client'));
    }

    public function update(Request $request){

    	$request->validate([
    	'name' => 'required|max:50',
    	'orgnbr' => 'max:50',
    	'phone' => 'max:50',
    	'mobile' => 'max:50',
    	'email' => 'nullable|email',
    	'web' => 'max:50',
    	'postgiro' => 'max:50',
    	'bankgiro' => 'max:50',
    	'info' => 'max:255',
		]);

    	$user = Auth::user();

    	$client = Client::where('id', $user->client_id)->first();

    	$client->name = $request->name;
    	$client->orgnbr = $request->orgnbr;
    	$client->phone = $request->phone;
    	$client->mobile = $request->mobile;
    	$client->email = $request->email;
    	$client->web = $request->web;
    	$client->postgiro = $request->postgiro;
    	$client->bankgiro = $request->bankgiro;
    	$client->info = $request->info;

    	$client->save();

    	return redirect()->route('clients.index');
    }
}
