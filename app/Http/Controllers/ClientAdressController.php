<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use App\ClientAdress;
use App\AdressType;

class ClientAdressController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    
	
	public function create(){

		$types = AdressType::all();
		
		return view('moduler.clients.adresses.create', compact('types'));
	}

	public function store(Request $request){

		$request->validate([
    	'street' => 'required|max:80',
    	'extra' => 'max:80',
    	'code' => 'required|max:80',
    	'city' => 'required|max:80',
    	'country' => 'required|max:80',
		]);

		$type = 1;
		if ($request->type >= 1 and $request->type <= 4){
			$type = $request->type;
		}else{$type = 1;}


		$uuid = Uuid::uuid4();

		$user = Auth::user();

		$adress = new ClientAdress;

		$adress->uuid = $uuid;
		$adress->adresstype_id = $type;
		$adress->client_id = $user->client_id;
		$adress->client_uuid = $user->client_uuid;
		$adress->line_1 = $request->street;
		$adress->line_2 = $request->extra;
		$adress->code = $request->code;
		$adress->city = $request->city;
		$adress->country = $request->country;

		$adress->save();

		return redirect()->route('clients.index');


	}

	public function show(ClientAdress $adress){


		return view('moduler.clients.adresses.show', compact('adress'));
	}

	public function edit(ClientAdress $adress){

		$types = AdressType::all();


		return view('moduler.clients.adresses.edit', compact('adress', 'types'));
	}

	public function update(Request $request, ClientAdress $adress){

		$request->validate([
    	'street' => 'required|max:80',
    	'extra' => 'max:80',
    	'code' => 'required|max:80',
    	'city' => 'required|max:80',
    	'country' => 'required|max:80',
		]);

		$type = 1;
		if ($request->type >= 1 and $request->type <= 4){
			$type = $request->type;
		}else{$type = 1;}

		

		$updateadress = ClientAdress::find($adress->id);

		$updateadress->adresstype_id = $type;
		$updateadress->line_1 = $request->street;
		$updateadress->line_2 = $request->extra;
		$updateadress->code = $request->code;
		$updateadress->city = $request->city;
		$updateadress->country = $request->country;

		$updateadress->save();

		return redirect()->route('clients.index');

	}

}
