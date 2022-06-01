<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeExpenseSummary extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::where('user_id', Auth::user()->id)->latest()->paginate();
        $totalIncomes = Income::where('user_id', Auth::user()->id)->sum('income_amount');
        $totalExpense = Expense::where('user_id', Auth::user()->id)->sum('income_amount');
        // dd($incomes, $totalIncomes);
        // $totalIncomes = Income::where('user_id', Auth::user()->id)->sum('income_amount');
        return view('dashboard.income_expense_summary.index', compact('incomes','totalIncomes','totalExpense'));
    }

}
