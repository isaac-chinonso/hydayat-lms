<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function tutorlogin()
    {
        return view('tutor.login');
    }

    public function studentlogin()
    {
        return view('student.login');
    }
}
