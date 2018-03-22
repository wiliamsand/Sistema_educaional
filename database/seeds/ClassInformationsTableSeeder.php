<?php

use Illuminate\Database\Seeder;
use SGA\Models\ClassInformation;
use SGA\Models\Student;

class ClassInformationsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$students = \SGA\Models\Student::all();
		factory(\SGA\Models\ClassInformation::class,50)
			->create()
			->each(function (\SGA\Models\ClassInformation $model) use ($students){
				/** @var Illuminate\Support\Collection $studentsCol */
				$studentsCol = $students->random(10);
				$model->students()->attach($studentsCol->pluck('id'));
			});
	}
}