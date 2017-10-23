<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\User;
use App\Role;
use Ramsey\Uuid\Uuid;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$clientuuid = Uuid::uuid4();

    	$client = new Client;

    	$client->uuid = $clientuuid;
    	$client->name = 'EEC';
    	$client->orgnbr = '556554-3450';
    	$client->phone = '0431-18863';
    	$client->mobile = '0768-409037';
    	$client->email = 'info@eec.com';
    	$client->web = 'eec.com';
    	$client->postgiro = '4887866-6';
    	$client->bankgiro = '3450-2345';
    	$client->info = 'Detta är en kort text som testar databasen';

    	$client->save();

    	$clientid = $client->id;

        $adminrole = Role::where('name', 'Admin')->first();

        $useruuid = Uuid::uuid4();

        $user = new User;

        $user->uuid = $useruuid;
        $user->client_id = $clientid;
        $user->client_uuid = $clientuuid;
        $user->name = 'Peter';
        $user->email = 'sppaulsson@gmail.com';
        $user->password = bcrypt('qwerty');
        $user->superadmin = 1;

        $user->save();

        $user->roles()->attach($adminrole);




    }
}
