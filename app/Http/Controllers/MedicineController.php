<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
class MedicineController extends Controller
{
    public function index()
    {
        return view('medicine.index'); 
    }
    public function create()
    {
        // $categories = Categories::all();
        return view('medicine.create'); 
    }

}
