<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDashboarController extends Controller
{

        public function index()
    {
        // This will load resources/views/ClientDashboard/index.blade.php
        return view('welcome');
    }

}
