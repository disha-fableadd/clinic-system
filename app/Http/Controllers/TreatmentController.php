<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class TreatmentController extends Controller
{
    public function index()
    {
        return view('treatment.index'); 
    }
    public function create()
    {
        return view('treatment.create'); 
    }

//     public function create()
// {
//     $doctors = User::whereHas('role', function ($query) {
//         $query->where('name', 'doctor'); // Ensure 'doctor' is the exact role name
//     })->select('id', 'fullname')->get();

//     return view('treatment.create', compact('doctors'));
// }
}
