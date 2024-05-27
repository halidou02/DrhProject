<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrhDashboardController extends Controller
{
  public function index()
  {
    return view('content.dashboard.GrhDashboard');
  }
}
