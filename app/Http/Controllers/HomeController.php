<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $dailyReports = DailyReport::where('user_id', $user->id)->get();
        $proposals = Proposal::where('user_id', $user->id)->get();
        return view('home', compact('user', 'dailyReports', 'proposals'));
    }
}
