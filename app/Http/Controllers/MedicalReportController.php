<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalReportController extends Controller
{
    public function index()
    {
        return view('report.index'); 
    }
    public function create()
    {
        return view('report.create'); 
    }
}
