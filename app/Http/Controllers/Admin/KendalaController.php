<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendalaController extends Controller
{
    public function index()
    {
        return view('admin.laporan-kendala');
    }
}
