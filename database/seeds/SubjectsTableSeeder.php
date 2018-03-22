<?php

use Illuminate\Database\Seeder;
use SGA\Models\Subject;

class SubjectsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(Subject::class,50)->create();
	}
}