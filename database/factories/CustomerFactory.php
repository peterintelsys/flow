<?php

use Faker\Generator as Faker;




$factory->define(App\Customer::class, function (Faker $faker) {

	$client = App\Client::find(1);
	
    return [
        'uuid' => $faker->uuid,
        'client_id' => $client->id,
        'client_uuid' => $client->uuid,
        'name' => $faker->company,
        'orgnbr' => $faker->ean8,
        'phone' => $faker->e164PhoneNumber,
        'mobile' => $faker->e164PhoneNumber,
        'web' => $faker->domainName,
        'email' => $faker->email,
        'bankgiro' => $faker->bankAccountNumber,
        'postgiro' => $faker->bankAccountNumber,
        'info' => $faker->text(100),
        'active' => 1,
    ];
});
