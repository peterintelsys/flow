<?php

use Illuminate\Database\Seeder;
use App\Role;
use Ramsey\Uuid\Uuid;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =['Admin', 'Chef', 'Anställd'];

        //$typerole = 'Level';

        $modules =['Kunder', 'Leverantörer', 'Ekonomi', 'Övrigt'];

        //$typemodule = 'Moduler';

        foreach ($roles as $role) {
        	
        	$uuid = Uuid::uuid4();

            $typerole = 'Level';

        	$data = new Role;

        	$data->uuid = $uuid;
        	$data->name = $role;
            $data->type = $typerole;

        	$data->save();

        }

        foreach ($modules as $module) {
            
            $uuid = Uuid::uuid4();

            $typemodule = 'Moduler';

            $data = new Role;

            $data->uuid = $uuid;
            $data->name = $module;
            $data->type = $typemodule;

            $data->save();

        }
    }
}
