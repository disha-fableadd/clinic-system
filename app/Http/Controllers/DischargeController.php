<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DischargeController extends Controller
{
    public function index()
    {
        return view('discharge.index'); 
    }
    public function create()
    {
        return view('discharge.create'); 
    }

}
