<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import model User

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function index()
    {
        $data = User::get(); // Mengambil semua data dari model User

        return view('index', compact('data'));
    }

    public function create()
    {
        return view('create');
    }
}
