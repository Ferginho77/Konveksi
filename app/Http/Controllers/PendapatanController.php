<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;

class PendapatanController extends Controller
{
    public function index(){

        $pendapatan = Pendapatan::with('karyawan')->get();

        return view('pendapatan', compact('pendapatan'));
    }
}
