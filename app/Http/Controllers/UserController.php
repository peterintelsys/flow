<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'client', 'useractive']);

    }

    public function index(){


      $loggedinuser = Auth::user();

      $loggedinuser->authRoles(['Admin', 'Övrigt']);

    	
    	
    	$users = User::where('client_uuid', $loggedinuser->client_uuid)->get();


    	return view('moduler.users.index', compact('users'));
    }

    public function create(){

      $loggedinuser = Auth::user();

      $loggedinuser->authRoles('Admin');

    	$roles = Role::where('type', 'Level')->get();

      $modules = Role::where('type', 'Moduler')->get();

    	return view('moduler.users.create', compact('roles', 'modules'));

    }

    public function store(Request $request){

    	$loggedinuser = Auth::user();

      $loggedinuser->authRoles('Admin');



      $roles = $request->newrole;

      $request->validate([
    	'name' => 'required|max:50',
    	'email' => 'required|email',
    	'password' => 'required|min:6',
    	'password_confirmation' => 'required|min:6|same:password',
		]);


		$passwordhash = Hash::make($request->password);

		$useruuid = Uuid::uuid4();

		$user = new User;

		$user->uuid = $useruuid;
		$user->client_id = $loggedinuser->client_id;
		$user->client_uuid = $loggedinuser->client_uuid;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = $passwordhash;

		$user->save();

    if(isset($roles)){

      foreach($roles as $role){

        $roledata = Role::where('name', $role)->first();

        $user->roles()->attach($roledata);

      } 

      }

    	return redirect()->route('users.index');

    }

    public function show(User $user){

      $loggedinuser = Auth::user();

      $loggedinuser->authRoles('Admin');

    	return view('moduler.users.show', compact('user'));
    }

    public function edit(User $user){

      $loggedinuser = Auth::user();

      $loggedinuser->authRoles('Admin');
   		
      $roles = Role::where('type', 'Level')->get();

      $modules = Role::where('type', 'Moduler')->get();


    	return view('moduler.users.edit', compact('user', 'roles', 'modules'));
    }

    public function update(Request $request, User $user){

      $loggedinuser = Auth::user();

      $loggedinuser->authRoles('Admin');
   		
      $request->validate([
    	'name' => 'required|max:50',
    	'email' => 'required|email',
    	'password' => 'required|min:6',
    	'password_confirmation' => 'required|min:6|same:password',
		]);


      $oldroles = $request->oldrole;

      $newroles = $request->newrole;

      
      $aktiv = 1;

      if($request->aktiv === Null){
        
        $aktiv = 0;
      }else{$aktiv = 1;}

      if($user->superadmin === 1){
          $aktiv = 1;
        }



   		$uuid = $user->uuid;
   		$clientid = $user->client_id;
   		$clientuuid = $user->client_uuid;


   		$user->uuid = $uuid;
		  $user->client_id = $clientid;
		  $user->client_uuid = $clientuuid;
   		$user->name = $request->name;
   		$user->email = $request->email;
   		$user->password = $request->password;
      $user->active = $aktiv;
   		
   		$user->save();


      if(isset($newroles)){

        $user->roles()->detach();

      foreach($newroles as $newrole){

        $newroledata = Role::where('name', $newrole)->first();

        $user->roles()->attach($newroledata);

      } 

      }

    	return redirect()->route('users.index');
        }
    }

