<?php
/**
 * Created by PhpStorm.
 * User: JOÃO
 * Date: 24/12/2017
 * Time: 19:04
 */

namespace SGA\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	public function user(){
		return $this->morphOne(User::class,'userable');
	}
}