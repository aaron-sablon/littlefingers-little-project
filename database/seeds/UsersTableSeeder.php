<?php

use Illuminate\Database\Seeder;

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
    	$user = new App\User;
		$user->name = 'Admin';
		$user->password = Crypt::encrypt('123456');
		$user->email = 'superadmin@gmail.com';
		$user->save();
    }
}

