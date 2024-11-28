<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;


class AdminController extends Controller
{
    public function index(){
        
        return view('admin', compact('movies'));
    }
}
