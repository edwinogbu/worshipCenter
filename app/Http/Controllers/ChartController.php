<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function barChart()
    {

        $users = User::select(DB::raw(" COUNT(*) as count "))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $incomes = Income::select(DB::raw(" COUNT(*) as count "))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        $months = User::select(DB::raw(" Month(created_at) as month "))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0,);

        foreach ($months as $index => $month) {
            // $datas[$month] = $users[$index];
            $datas[$month] = $incomes[$index];
        }

        // dd($datas);
        return view('dashboard.chart_user_summary.summary', compact('datas'));
    }
}
