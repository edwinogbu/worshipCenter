<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
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
        if (Auth::user()->role_name =="super_admin") {

            $incomes = Income::latest()->paginate(20);
            $totalIncomes = Income::sum('income_amount');

        } else {

            $incomes = Income::where('user_id', Auth::user()->id)->latest()->paginate();
            $totalIncomes = Income::where('user_id', Auth::user()->id)->sum('income_amount');

        }

        $group_monthly_incomes = DB::select(DB::raw("select year(income_date) as year,
        date_format(income_date, '%M') as month, SUM(income_amount) as incomeTotal FROM `incomes` GROUP BY year(income_date),
         date_format(income_date,'%M') order by income_date"));


        return view('dashboard.incomes.index', compact('incomes','totalIncomes', 'group_monthly_incomes'));
    }

    public function approvedBy(Request $request,Income $income)
    {
        $income = Income::findOrFail($income->id);
        $income->approved =$request->approved;
        // $expense->approved =$request->boolean('approved');
        $income->save();
        Toastr::info('approved changed successfully :)','info');

        return redirect()->back()->with('success', 'approval has been created successfully');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.incomes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'income_title' => 'required',
            'income_amount' => 'required',
            'income_date'=> 'required'
        ]);

        $income = new Income();
        $income->income_title =$request->income_title;
        $income->income_amount =$request->income_amount;
        $income->income_date =$request->income_date;
        $income->user_id = Auth::user()->id;
        $income->save();

        Toastr::success('income added successfully :)','success');

        return redirect()->route('user.income.index')->with('message', 'new income created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $incomes = Income::findOrFail($id);
        $income = Income::findOrFail($id);

        return view('dashboard.incomes.edit', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $request->validate([
            'income_title' => 'required',
            'income_amount' => 'required',
            'income_date'=> 'required'
        ]);

        $income = Income::findOrFail($income->id);
        $income->income_title =$request->income_title;
        $income->income_amount =$request->income_amount;
        $income->income_date =$request->income_date;
        $income->user_id = Auth::user()->id;
        $income->update();

        Toastr::info('income updated successfully :)','info');

        return redirect()->back()->with('message', 'new income created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Income::findOrFail($id)->delete();
        Toastr::error('income deleted successfully :)','error');

        return back()->with('message', 'Income details deleted successfully');

    }
}
