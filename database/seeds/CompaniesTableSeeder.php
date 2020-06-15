<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;     // this library is used to create fake data

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('companies')->truncate();
        // $companies = [];
        // $faker = Faker::create();       // instantiate a faker
        // foreach(range(1,10) as $index){
        //     $companies[] = [
        //         'name' => $faker->company,
        //         'address' => $faker->address,
        //         'website' => $faker->domainName,
        //         'email' => $faker->email,
        //         'created_at' => now(),
        //         'updated_at' => now()

        //     ];
        // }
        // DB::table('companies')->insert($companies);
        factory(Company::class,10)->create();
    }
}
