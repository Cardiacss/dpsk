<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IuranController extends Controller
{
    public function index()
    {
        // Menampilkan halaman iuran peserta admin
        return view('ADMIN.iuranpesertaadmin');
    }
}
