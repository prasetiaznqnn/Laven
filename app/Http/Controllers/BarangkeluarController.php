<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangkeluar = BarangKeluar::all();
        return view('barangkeluar', ['barangkeluar' => $barangkeluar]);
    }
}
