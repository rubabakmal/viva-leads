<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services');
    }

    public function show()
    {
        return view('admin.services.index');
    }
}
