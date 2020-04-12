<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcController extends Controller
{
    public function tramite_nuevo () {
		
        // return view('courses.form', compact('course', 'btnText'));
        return view('ac.nuevo_tramite');
	}
}
