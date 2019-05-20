<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function start()
    {
        $students = Student::all();
        return view('tests.start', compact('students'));
    }
}
