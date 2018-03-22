<?php
/**
 * Created by PhpStorm.
 * User: JOÃO
 * Date: 23/12/2017
 * Time: 21:53
 */

use Illuminate\Database\Seeder;
use SGA\Models\User;
use SGA\Models\UserProfile;

class UsersTableSeeder extends Seeder
{

	public function run()
	{
		factory(User::class)->create([
			'email' => 'batista@gmail.com',
			'enrolment' => 100000
		])->each(function(User $user){
			$profile = factory(UserProfile::class)->make();
			$user->profile()->create($profile->toArray());
			User::assingRole($user, User::ROLE_ADMIN);
			$user->save();
		});
		factory(User::class)->create([
			'email' => 'teacher@user.com',
			'enrolment' => 400000
		])->each(function(User $user){
			if(!$user->userable) {
				$profile = factory(UserProfile::class)->make();
				$user->profile()->create($profile->toArray());
				User::assingRole($user, User::ROLE_TEACHER);
				$user->save();
			}
		});
		factory(User::class)->create([
			'email' => 'student@user.com',
			'enrolment' => 700000
		])->each(function(User $user){
			if(!$user->userable) {
				$profile = factory(UserProfile::class)->make();
				$user->profile()->create($profile->toArray());
				User::assingRole($user, User::ROLE_STUDENT);
				$user->save();
			}
		});
		factory(User::class,20)->create()->each(function(User $user){
			if(!$user->userable) {
				$profile = factory(UserProfile::class)->make();
				$user->profile()->create($profile->toArray());
				User::assingRole($user, User::ROLE_TEACHER);
				User::assignEnrolment(new User(), User::ROLE_TEACHER);
				$user->save();
			}
		});
		factory(User::class,600)->create()->each(function(User $user){
			if(!$user->userable) {
				$profile = factory(UserProfile::class)->make();
				$user->profile()->create($profile->toArray());
				User::assingRole($user, User::ROLE_STUDENT);
				User::assignEnrolment(new User(), User::ROLE_STUDENT);
				$user->save();
			}
		});
	}
}