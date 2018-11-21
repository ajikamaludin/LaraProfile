<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('setting')->insert([
            'logo' => str_replace('public/','', $faker->image('public/storage/upload')),
            'name' => $faker->name,
            'address' => $faker->address,
            'phone' => $faker->e164PhoneNumber,
            'email' => $faker->email,
            'link' => json_encode(['link' => ['fb' => $faker->url,'ig' => $faker->url,'yt' => $faker->url]]),
        ]);
    }
}
