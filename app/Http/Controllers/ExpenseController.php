<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\each_limit;
use function GuzzleHttp\Promise\each_limit_all;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        // select sum(expense_amount)  as monthlyexpense from expense where ((created_at) between '2022-04-01' and '2022-05-01'
        // SELECT DATE_FORMAT(created_at, '%Y-%m') as 'month', tithe, COUNT(id),SUM(tithe) FROM cash_books GROUP BY month, tithe

            //  $cyear= date("Y");
            // "select sum(ExpenseCost)  as yearlyexpense from tblexpense where (year(ExpenseDate)='$cyear') && (UserId='$userid');");


        // $monthdate=  date("Y-m-d", strtotime("-1 month"));
        // $crrntdte=date("Y-m-d");
        // "select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
        // $sum_monthly_expense = DB::table('expenses')->select("select sum(expense_amount)  as monthlyexpense from expense where ((created_at) between '$monthdate' and '$crrntdte' ");
        //    return $sum_monthly_expense;

        $pastdate=  date("Y-m-d", strtotime("-1 week"));
        $crrntdte=date("Y-m-d");
        //    "select sum(expense_amount)  as weeklyexpense from expenses where ((created_at) between '$pastdate' and '$crrntdte') ;
        $sum_weeklyexpense = DB::table('expenses')->select("select sum(expense_amount)  as weeklyexpense from expenses where ((created_at) between '$pastdate' and '$crrntdte ");
        // dd($sum_weeklyexpense);


        $from_dayOne=  date("Y-m-d", strtotime("-1 week"));
        $to_daySeven=date("Y-m-d");
        $from=  date("Y-m-d", strtotime("-1 month"));
        $to=date("Y-m-d");
        // $expensesWeekSums = DB::table('expenses')->selectRaw()->toSql();

        $group_monthly_expenses = DB::select(DB::raw("select year(expense_date) as year,
        date_format(expense_date, '%M') as month, SUM(expense_amount) as expenseTotal FROM `expenses` GROUP BY year(expense_date),
         date_format(expense_date,'%M') order by expense_date"));


        //  $weekly_expense= DB::select(DB::raw("select sum(expense_amount)  as weeklyExpense from expenses where ((expense_date) between '$from_dayOne' and '$to_daySeven' )"));
        //  $Month_expense= DB::select(DB::raw("select sum(expense_amount)  as monthlyExpense from expenses where ((expense_date) between '$from' and '$to' )"));


        //  dd($weekly_expense);
        //  $expensesWeekSum=DB::table('expenses')->select("select sum(expense_amount)  as weeklyexpense from expenses where ((created_at) between '$pastdate' and '$crrntdte ");
    // $expensesWeekSum = Expense::whereBetween('created_at', [$from, $to])->get();

    // dd($expensesWeekSum->sum('expense_amount'));
    // where('user_id', Auth::User()->id)->get()->toArray();


    // foreach ($expenses as $key => $value) {
    //     $expenses[$key]['type'] = 'expense';
    //     dd(expenses[$key]['type']);
    // }

        if (Auth::user()->role_name =="super_admin") {

            $expenses = Expense::latest()->paginate(12);
            $totalExpenses = Expense::sum('expense_amount');

        } else {

            $expenses = Expense::where('user_id', Auth::user()->id)->latest()->paginate(12);
            $totalExpenses = Expense::where('user_id', Auth::user()->id)->sum('expense_amount');

        }

        return view('dashboard.expenses.index', compact('expenses','totalExpenses','group_monthly_expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'expense_title' => 'required',
            'expense_amount' => 'required',
            'expense_date'=> 'required'
        ]);

        $expense = new Expense();
        $expense->expense_title = $request->expense_title;
        $expense->expense_amount = $request->expense_amount;
        $expense->expense_date = $request->expense_date;
        $expense->user_id = Auth::user()->id;
        $expense->save();
        Toastr::success('expense added successfully :)','success');

        return redirect()->route('user.expense.index')->with('message', 'New Expense Added');
    }

    public function getExpenseBetweenDate(Request $request)
    {
        $this->validate($request,[
        'start_date' => 'required|date',
        'end_date' => 'required|date|before_or_equal:start_date',
        ]);

        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);

        $get_all_user = Expense::whereDate('date','<=',$end->format('m-d-y'))
        ->whereDate('date','>=',$start->format('m-d-y'));

        return view('dashboard.expense.index', compact('get_all_user'));
    }


    public function ExpenseBetweenDate(Request $request)
    {
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $get_all_user = User::whereDate('created_at','<=',$end)
        ->whereDate('created_at','>=',$start)
        ->get();

        return view('dashboard.expense.index', compact('get_all_user'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $expense = Expense::findOrFail($expense->id);
        return view('dashboard.expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'expense_title' => 'required',
            'expense_amount' => 'required',
            'expense_date'=> 'required'
        ]);

        $expense = Expense::findOrFail($expense->id);
        $expense->expense_title = $request->expense_title;
        $expense->expense_amount = $request->expense_amount;
        $expense->expense_date = $request->expense_date;
        $expense->user_id = Auth::user()->id;
        $expense->save();
        Toastr::info('expense updated successfully :)','info');

        return redirect()->route('user.expense.index')->with('message', 'New Expense Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense = Expense::findOrFail($expense->id);
        $expense->delete();
        Toastr::error('expense deleted successfully :)','error');

        return redirect()->back()->with('message', 'Expense Deleted successfully');
    }

    // Route::get('/prnpriview','PrintController@prnpriview');


    public function printPreview()
        {
            $expenses = Expense::where('user_id', Auth::user()->id)->latest()->paginate(12);
            dd($expenses);
            $totalExpenses = Expense::where('user_id', Auth::user()->id)->sum('expense_amount');

                return view('dashboard.expenses.index')->with('students', $expenses, $totalExpenses);
        }




}
