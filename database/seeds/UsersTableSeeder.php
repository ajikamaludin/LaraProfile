<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = factory(App\User::class, 3)->create();
        DB::table('users')->insert([
            'picture' => str_replace('public/','', $faker->image($dir = 'public/storage/profile', $width = 160, $height = 160)),
            'name' => 'Administrator',
            'email' => 'admin@admin.adm',
            'password' => bcrypt('admin123'),
        ]);
    }
}
