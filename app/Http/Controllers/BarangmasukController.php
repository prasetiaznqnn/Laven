<?php

namespace App\Http\Controllers;

use App\Models\Barangmasuk;
use Illuminate\Http\Request;




class BarangmasukController extends Controller
{
    public function index()
    {
        $barangmasuk = Barangmasuk::all();
        return view("/barangmasuk", ['barangmasuk' => $barangmasuk]);
    }
}
