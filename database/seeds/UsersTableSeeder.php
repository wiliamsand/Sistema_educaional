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
			'enrolment' =>100000
		])->each(function (User $user){
			User::assingRole($user,User::ROLE_ADMIN);
			$user->save();
		});

		factory( User::class)->create([
			'enroment'=> User::assignEnrolment(new User(),User::ROLE_TEACHER)
		])->each(function (User $user){
			User::assingRole($user,User::ROLE_TEACHER);
			$user->save();
		});

		factory( User::class)->create([
			'enroment'=> User::assignEnrolment(new User(),User::ROLE_STUDENT)
		])->each(function (User $user){
			User::assingRole($user,User::ROLE_STUDENT  );
			$user->save();
		});
	}
}