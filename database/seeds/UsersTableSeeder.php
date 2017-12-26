<?php
/**
 * Created by PhpStorm.
 * User: JOÃO
 * Date: 23/12/2017
 * Time: 21:53
 */

use Illuminate\Database\Seeder;
use SGA\Models\User;

class UsersTableSeeder extends Seeder
{

	public function run()
	{
		factory( User::class)->create([
			'email'=>'batista@gmail.com',
			'enrolment'=> 10000
		])->each(function (User $user){
			User::assingRole($user,User::ROLE_ADMIN);
			$user->save();
		});

		factory( User::class,10)->create([])
		    ->each(function (User $user){
			User::assingRole($user,User::ROLE_TEACHER);
			$user->save();
		});

		factory( User::class,10)->create([])
		  ->each(function (User $user){
			User::assingRole($user,User::ROLE_STUDENT);
			$user->save();
		});
	}
}