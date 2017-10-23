<?php

use Illuminate\Database\Seeder;

class AdressTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$types =['Postadress', 'Besöksadress', 'Leveransadress', 'Faktureringsadress'];

        foreach ($types as $type) {

        	$data = new App\AdressType;
        	
        	$data->name = $type;

        	$data->save();

        }

    }
}
