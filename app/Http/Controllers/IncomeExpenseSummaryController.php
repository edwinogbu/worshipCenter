<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IncomeExpenseSummaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data['incomes'] = Income::where('user_id', Auth::User()->id)->whereYear('income_date', Carbon::now()->year)->whereMonth('income_date', Carbon::now()->month)->sum('income_amount');
        $data['expenses'] = Expense::where('user_id', Auth::User()->id)->whereYear('expense_date', Carbon::now()->year)->whereMonth('expense_date', Carbon::now()->month)->sum('expense_amount');
        $data['balance'] = $data['incomes'] - $data['expenses'];

        return view('dashboard.income_expense_summary.index', $data);
    }


    public function summary()
    {
        $incomes = Income::where('user_id', Auth::User()->id)->get()->toArray();
        $expenses = Expense::where('user_id', Auth::User()->id)->get()->toArray();
        foreach ($incomes as $key => $value) {
            $incomes[$key]['type'] = 'income';
        }

        foreach ($expenses as $key => $value) {
            $expenses[$key]['type'] = 'expense';
            // dd(expenses[$key]['type']);
        }

        $data['results'] = array_merge($incomes, $expenses);
        $data['total_income'] = Income::where('user_id', Auth::User()->id)->sum('income_amount');
        $data['total_expense'] = Expense::where('user_id', Auth::User()->id)->sum('expense_amount');
        $data['balance'] = $data['total_income'] - $data['total_expense'];

        $group_monthly_incomes = DB::select(DB::raw("select year(income_date) as year,
            date_format(income_date, '%M') as month, SUM(income_amount) as incomeTotal FROM `incomes` GROUP BY year(income_date),
            date_format(income_date,'%M') order by income_date"));


        $group_monthly_expenses = DB::select(DB::raw("select year(expense_date) as year,
            date_format(expense_date, '%M') as month, SUM(expense_amount) as expenseTotal FROM `expenses` GROUP BY year(expense_date),
            date_format(expense_date,'%M') order by expense_date"));

         $yearly_group_incomes = DB::select(DB::raw("select year(income_date) as year,
            SUM(income_amount) as yearlyIncomeTotal FROM `incomes` GROUP BY year(income_date) "));


        $yearly_group_expenses = DB::select(DB::raw("select year(expense_date) as year,
            SUM(expense_amount) as yearlyExpenseTotal FROM `expenses` GROUP BY year(expense_date) "));

        $report = [];

        if ($group_monthly_incomes) {
            foreach ($group_monthly_incomes as $monthly_income) {
                $report[strtolower($monthly_income->month)] = ["incomeAmount"=> $monthly_income->incomeTotal, "expenseAmount"=> 0];
                $report['year'] =  $monthly_income->year;
            }
        }
        if($group_monthly_expenses){
            foreach ($group_monthly_expenses as $monthly_expense) {
                if( isset($report[strtolower($monthly_expense->month)]) ){
                    $report[strtolower($monthly_expense->month)]['expenseAmount'] = $monthly_expense->expenseTotal;
                }else{
                    $report[strtolower($monthly_expense->month)] = ["incomeAmount"=>0, "expenseAmount"=> $monthly_expense->expenseTotal];
                }
                $report['year'] =  $monthly_income->year;
            }
        }

        // YEARLY FILTER

        $yearly_report = [];
        if ($yearly_group_incomes) {
            foreach ($yearly_group_incomes as $yearly_income) {
                $yearly_report[strtolower($yearly_income->year)] = ["YearlyIncomeAmount"=> $yearly_income->yearlyIncomeTotal, "YearlyExpenseAmount"=> 0];
                $yearly_report['year'] =  $yearly_income->year;
            }
        }
// dd($yearly_income->yearlyIncomeTotal,  $yearly_income->year);
        // if($yearly_group_expenses){
        //     foreach ($group_monthly_expenses as $yearly_expense) {
        //         if( isset($yearly_report[strtolower($yearly_expense->year)]) ){
        //             $yearly_report[strtolower($yearly_expense->year)]['expenseAmount'] = $yearly_expense->yearlyExpenseTotal;
        //         }else{
        //             $yearly_report[strtolower($yearly_expense->year)] = ["incomeAmount"=>0, "expenseAmount"=> $yearly_expense->yearlyExpenseTotal];
        //         }
        //         $yearly_report['year'] =  $yearly_expense->year;
        //     }
        // }

        // dd($yearly_income->yearlyExpenseTotal,  $yearly_expense->year);


        $months = ["january","february","march","april","may","june","july","august","september","october","november","december"];
        return view('dashboard.income_expense_summary.summary', compact('months','year','group_monthly_incomes', 'group_monthly_expenses','yearly_group_incomes', 'yearly_report', 'data', 'report'), $data);
    }

    public function quarterlySummary()
    {
        $incomes = Income::where('user_id', Auth::User()->id)->get()->toArray();
        $expenses = Expense::where('user_id', Auth::User()->id)->get()->toArray();
        foreach ($incomes as $key => $value) {
            $incomes[$key]['type'] = 'income';
        }

        foreach ($expenses as $key => $value) {
            $expenses[$key]['type'] = 'expense';
            // dd(expenses[$key]['type']);
        }

        $data['results'] = array_merge($incomes, $expenses);
        $data['total_income'] = Income::where('user_id', Auth::User()->id)->sum('income_amount');
        $data['total_expense'] = Expense::where('user_id', Auth::User()->id)->sum('expense_amount');
        $data['balance'] = $data['total_income'] - $data['total_expense'];

        $group_monthly_incomes = DB::select(DB::raw("select year(income_date) as year,
        date_format(income_date, '%M') as month, SUM(income_amount) as incomeTotal FROM `incomes` GROUP BY year(income_date),
         date_format(income_date,'%M') order by income_date"));


        $group_monthly_expenses = DB::select(DB::raw("select year(expense_date) as year,
        date_format(expense_date, '%M') as month, SUM(expense_amount) as expenseTotal FROM `expenses` GROUP BY year(expense_date),
         date_format(expense_date,'%M') order by expense_date"));

        $report = [];

        if ($group_monthly_incomes) {
            foreach ($group_monthly_incomes as $monthly_income) {
                $report[strtolower($monthly_income->month)] = ["incomeAmount"=> $monthly_income->incomeTotal, "expenseAmount"=> 0];
                $report['year'] =  $monthly_income->year;
            }
        }
        if($group_monthly_expenses){
            foreach ($group_monthly_expenses as $monthly_expense) {
                if( isset($report[strtolower($monthly_expense->month)]) ){
                    $report[strtolower($monthly_expense->month)]['expenseAmount'] = $monthly_expense->expenseTotal;
                }else{
                    $report[strtolower($monthly_expense->month)] = ["incomeAmount"=>0, "expenseAmount"=> $monthly_expense->expenseTotal];
                }
                $report['year'] =  $monthly_income->year;
            }
        }
        $months = ["january","february","march","april","may"];
        return view('dashboard.income_expense_summary.Summary_quarterly', compact('months','group_monthly_incomes', 'group_monthly_expenses', 'data', 'report'), $data);
    }

    public function yearlySummary()
    {
        $incomes = Income::where('user_id', Auth::User()->id)->get()->toArray();
        $expenses = Expense::where('user_id', Auth::User()->id)->get()->toArray();
        foreach ($incomes as $key => $value) {
            $incomes[$key]['type'] = 'income';
        }

        foreach ($expenses as $key => $value) {
            $expenses[$key]['type'] = 'expense';
            // dd(expenses[$key]['type']);
        }

        if (auth()->user()->role_name == "super_admin") {
            $incomes_yearly = Income::whereYear('income_date', Carbon::now()->year)->whereMonth('income_date', Carbon::now()->month)->sum('income_amount');
            $expenses_yearly = Expense::whereYear('expense_date', Carbon::now()->year)->whereMonth('expense_date', Carbon::now()->month)->sum('expense_amount');
            $balance_yearly = $incomes_yearly - $expenses_yearly;

        } else {
            $incomes_yearly = Income::where('user_id', Auth::User()->id)->whereYear('income_date', Carbon::now()->year)->whereMonth('income_date', Carbon::now()->month)->sum('income_amount');
            $expenses_yearly = Expense::where('user_id', Auth::User()->id)->whereYear('expense_date', Carbon::now()->year)->whereMonth('expense_date', Carbon::now()->month)->sum('expense_amount');
            $balance_yearly = $incomes_yearly - $expenses_yearly;

        }


        $data['results'] = array_merge($incomes, $expenses);
        $data['total_income'] = Income::where('user_id', Auth::User()->id)->sum('income_amount');
        $data['total_expense'] = Expense::where('user_id', Auth::User()->id)->sum('expense_amount');
        $data['balance'] = $data['total_income'] - $data['total_expense'];

        $group_monthly_incomes = DB::select(DB::raw("select year(income_date) as year,
        date_format(income_date, '%M') as month, SUM(income_amount) as incomeTotal FROM `incomes` GROUP BY year(income_date),
         date_format(income_date,'%M') order by income_date"));


        $group_monthly_expenses = DB::select(DB::raw("select year(expense_date) as year,
        date_format(expense_date, '%M') as month, SUM(expense_amount) as expenseTotal FROM `expenses` GROUP BY year(expense_date),
         date_format(expense_date,'%M') order by expense_date"));

        $yearly_group_incomes = DB::select(DB::raw("select year(income_date) as year,
         SUM(income_amount) as yearIncomeTotal FROM `incomes` GROUP BY year(income_date) order by year(income_date) "));

        $yearly_group_expenses = DB::select(DB::raw("select year(expense_date) as year,
            SUM(expense_amount) as yearExpenseTotal FROM `expenses` GROUP BY year(expense_date) "));


        $report = [];

        if ($group_monthly_incomes) {
            foreach ($group_monthly_incomes as $monthly_income) {
                $report[strtolower($monthly_income->month)] = ["incomeAmount"=> $monthly_income->incomeTotal, "expenseAmount"=> 0];
                $report['year'] =  $monthly_income->year;
            }
        }
        if($group_monthly_expenses){
            foreach ($group_monthly_expenses as $monthly_expense) {
                if( isset($report[strtolower($monthly_expense->month)]) ){
                    $report[strtolower($monthly_expense->month)]['expenseAmount'] = $monthly_expense->expenseTotal;
                }else{
                    $report[strtolower($monthly_expense->month)] = ["incomeAmount"=>0, "expenseAmount"=> $monthly_expense->expenseTotal];
                }
                $report['year'] =  $monthly_income->year;
            }
        }

         // YEARLY FILTER

         $yearly_report = [];
        if ($yearly_group_incomes) {
             foreach ($yearly_group_incomes as $yearly_income) {
                //  $yearly_report[strtolower($yearly_income->year)] = ["YearlyIncomeAmount"=> $yearly_income->yearlyIncomeTotal, "YearlyExpenseAmount"=> 0];
                $yearly_report['yearIncomeTotal'] =  ["YearlyExpenseAmount"=> 0, "YearlyIncomeAmount"=> $yearly_income->yearIncomeTotal];
                 $yearly_report['year'] =  $yearly_income->year;
             }
        }
        if ($yearly_group_incomes) {
             foreach ($yearly_group_incomes as $yearly_income) {
                //  $yearly_report[strtolower($yearly_income->year)] = ["YearlyIncomeAmount"=> $yearly_income->yearlyIncomeTotal, "YearlyExpenseAmount"=> 0];
                $yearly_report['yearIncomeTotal'] =  ["YearlyExpenseAmount"=> 0, "YearlyIncomeAmount"=> $yearly_income->yearIncomeTotal];
                 $yearly_report['year'] =  $yearly_income->year;
             }
        }

        if($yearly_group_expenses){
            foreach ($yearly_group_expenses as $yearly_expense) {

                if( isset($report[strtolower($yearly_expense->year)]) ){
                    $report[strtolower($yearly_expense->year)]['YearlyExpenseAmount'] = $yearly_expense->yearExpenseTotal;
                }
                else{
                     $report[strtolower($yearly_expense->year)] = ["YearlyIncomeAmount"=>0, "YearlyExpenseAmount"=> $yearly_expense->yearExpenseTotal];
                    //  $yearly_report[strtolower($yearly_expense->year)] = ["YearlyIncomeAmount"=>0, "YearlyExpenseAmount"=> $yearly_expense->yearExpenseTotal];
                     }
                $yearly_report['year'] =  $yearly_expense->year;
            }
        }

// dd($yearly_group_expenses);
// dd($yearly_income->yearIncomeTotal);
        $months = ["january","february","march","april","may","june","july","august","september","october","november","december"];
        $years = ["2022","2023","2024","2025","2026","2027","2028","2029","2030"];


        return view('dashboard.income_expense_summary.Summary_yearly', compact('months','years','group_monthly_incomes', 'group_monthly_expenses',
        'yearly_group_incomes','yearly_report', 'yearly_group_expenses','data', 'report'),
        $data,  $incomes_yearly, $expenses_yearly, $balance_yearly,);
    }

}
