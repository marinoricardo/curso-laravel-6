<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        factory(User::class, 10)->create();
        // User::create([
        //     'name' => 'Marino Ricardo',
        //     'email' => 'marinoricardo814@gmail.com',
        //     'password' => bcrypt('1234567')
        // ]);
    }
}
