<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function index()
    {
        return view('schedule.index'); 
    }
    public function create()
    {
        return view('schedule.create'); 
    }
}
