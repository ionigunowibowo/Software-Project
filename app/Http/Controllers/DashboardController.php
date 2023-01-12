<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Parser\Php5;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        $data = array('title' => 'Dashboard');
        return view('dashboard.index', $data);
    }

    public function riwayat()
    {
        return view('dashboard.riwayat');
    }
}
