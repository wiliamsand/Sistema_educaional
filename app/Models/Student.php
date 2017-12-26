<?php

namespace SGA\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public function userable(){
		return $this->morphOne(User::class,'userable');
	}
}
