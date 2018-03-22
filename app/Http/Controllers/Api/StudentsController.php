<?php

namespace SGA\Http\Controllers\Api;

use Illuminate\Http\Request;
use SGA\Http\Controllers\Controller;
use SGA\Models\Student;

class StudentsController extends Controller
{
    public function index(){
    	return Student::all();
    }
}
