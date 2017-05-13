<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->delete();
        $faker =Faker::create();
        $contacts =[];
        foreach (range(1,20) as $index)
        {
            $contacts[] =[
                'g_id' =>rand(1,3),
                'name' => $faker->name,
                'company' => $faker->company,
                'email' => $faker->email,
                'phoneNumber' => $faker->phoneNumber,
                'created_at' =>new DateTime(),
                'updated_at' =>new DateTime(),


            ];
        }
        DB::table('contacts')->insert($contacts);
    }
}
