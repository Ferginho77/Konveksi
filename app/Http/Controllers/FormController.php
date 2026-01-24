<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {

    $karyawans = Karyawan::all();
        return view('formkaryawan', compact('karyawans'));
    }
}
