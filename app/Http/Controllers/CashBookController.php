<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\CashBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CashBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    // $test = DB::table('cash_books')
    // ->Where('user_id', Auth::user()->id)
    // ->select(DB::raw('SUM(tithe) as total_tithe, MONTH( record_date ) as month'))
    // ->groupBy(DB::raw('MONTH(record_date) ASC'))->get();
    // foreach ($test as $tests) {
    //      dd($test[0]->total_tithe, $test[1]->total_tithe);
    //      # code...
    //  }

        // select sum(tithe)  as weeklyexpense from cash_books where (created_at) between '2022-04-24' and '2022-05-01';
        /*this is geting the sum total of past 30 days
        select sum(tithe) as monthlyexpense from cash_books where (record_date) between '2022-04-01' and '2022-05-01'
        */



        $cashBooks = CashBook::orderBy('user_id', 'desc')->paginate(5);
        $cashBooks = CashBook::all();
        $sundays = CashBook::select(DB::raw(" COUNT(*) as count "))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        // $cards = CashBook::select('tithe',
        // [
        //         DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month "),
        //         // DB::raw("COUNT(i) as month_number "),
        //         DB::raw("SUM(tithe) as monthly_total ")
        //     ])
        // ->groupBy('tithe')
        // ->groupBy('month')
        // ->orderBy(DB::raw('month'))
        // ->get();

        // dd($cards);

        // $report = [];
        // $months->each(function($item) use (&$report)
        // {
        //     $report[$item->month][$item->record_date] =
        //             [
        //                 'count'=>$item->month_number,
        //                 'church_offering'=>$item->monthly_total
        //             ];
        // });
        // $month_total =$months->pluck('user_id')
        // ->sortBy('user_id')
        // ->uniqid();

        // $months = CashBook::select(
        //     DB::raw(" COUNT(*) as count ")
        //     DB::raw("(created_at) as month_name ")

        //     )
        // ->whereYear('created_at', date('Y'))
        // ->groupBy('month_name')
        // ->get()->toArray();



        // $months = CashBook::select(DB::raw(" Month(created_at) as month "))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw('month'))
        // ->get()->toArray();

        $months = DB::table('cash_books')
        ->selectRaw('
         COUNT(*) as count,
        SUM(church_offering) AS total_church_offering,
        SUM(thanks_giving_offering) AS total_thanks_giving_offering,
        SUM(sunday_school_offering) AS total_sunday_school_offering,
        SUM(children_offering) AS total_children_offering,
        SUM(tithe) AS total_tithe_offering

        ')->groupByRaw('MONTH(created_at)')->get();

        $monthly_group_total = DB::table('cash_books')
        ->selectRaw('
        SUM(church_offering) AS total_church_offering,
        SUM(thanks_giving_offering) AS total_thanks_giving_offering,
        SUM(sunday_school_offering) AS total_sunday_school_offering,
        SUM(children_offering) AS total_children_offering,
        SUM(tithe) AS total_tithe_offering

        ')->groupByRaw('MONTH(created_at)')->get();

        $monthly_total_tithe_offering = DB::table('cash_books')
        ->selectRaw('
        SUM(church_offering) AS total_church_offering,
        SUM(thanks_giving_offering) AS total_thanks_giving_offering,
        SUM(sunday_school_offering) AS total_sunday_school_offering,
        SUM(children_offering) AS total_children_offering,
        SUM(tithe) AS total_tithe_offering
        ')->groupByRaw('MONTH(created_at)')->orderBy('id', 'desc')->get();


        // $monthly_total_church_offering = DB::table('cash_books')
        // ->selectRaw('
        // SUM(church_offering) AS total_church_offering,
        // ')->groupByRaw('MONTH(created_at)')->get()->pluck('total_church_offering');

        // $monthly_total_thanks_giving_offering = DB::table('cash_books')
        // ->selectRaw('
        // SUM(thanks_giving_offering) AS total_thanks_giving_offering,
        // ')->groupByRaw('MONTH(created_at)')->get()->pluck('total_thanks_giving_offering');

        // $monthly_total_sunday_school_offering = DB::table('cash_books')
        // ->selectRaw('
        // SUM(sunday_school_offering) AS total_sunday_school_offering,
        // ')->groupByRaw('MONTH(created_at)')->get()->pluck('total_sunday_school_offering');

        // $monthly_total_children_offering = DB::table('cash_books')
        // ->selectRaw('
        // SUM(children_offering) AS total_children_offering,
        // ')->groupByRaw('MONTH(created_at)')->get()->pluck('total_children_offering');

        // $thisMonthTOTAL = $monthly_total_children_offering;


        $monthly_total_church_offering = DB::table('cash_books')
        ->selectRaw('SUM(church_offering) AS total_church_offering')->groupByRaw('MONTH(created_at)')->get();

        $monthly_total_thanks_giving_offering = DB::table('cash_books')
        ->selectRaw(' SUM(thanks_giving_offering) AS total_thanks_giving_offering')->groupByRaw('MONTH(created_at)')->get();

        $monthly_total_sunday_school_offering = DB::table('cash_books')
        ->selectRaw('SUM(sunday_school_offering) AS total_sunday_school_offering')->groupByRaw('MONTH(created_at)')->get();

        $monthly_total_children_offering = DB::table('cash_books')
        ->selectRaw('SUM(children_offering) AS total_children_offering')->groupByRaw('MONTH(created_at)')->get();

        $monthly_total_tithe_offering = DB::table('cash_books')
        ->selectRaw('COUNT(tithe) AS count')->groupByRaw('MONTH(created_at)')->get();

        $month_tithe_offering = CashBook::orderBy('created_at', 'desc')->groupBy('record_date')->sum('tithe');
        $month_offer = CashBook::select('tithe')->whereMonth('record_date', Carbon::now()->month)->sum('tithe');

// dd($monthly_total_tithe_offering);
        // foreach ($monthly_group_total as $key => $value) {

            // $MONTHLY_GRAND_TOTAL =
            //                             $value->total_church_offering +
            //                             $value->total_thanks_giving_offering +
            //                             $value->total_children_offering +
            //                             $value->total_tithe_offering;

            //                             dd($value->total_tithe_offering);
            //                             dd($MONTHLY_GRAND_TOTAL);
            //     }

        // $MONTHLY_GRAND_TOTAL =  ($monthly_total_church_offering) +
        //                         ($monthly_total_thanks_giving_offering) +
        //                         ($monthly_total_sunday_school_offering) +
        //                         ($monthly_total_children_offering) +
        //                         ($monthly_total_tithe_offering);


        // dd($MONTHLY_GRAND_TOTAL);


        $admin_cashBooks = CashBook::orderBy('created_at','asc', date('m')) ->whereYear('created_at', date('Y'))->latest()->paginate(4);
        $cashBooks = CashBook::where('user_id', Auth::user()->id)->latest()->paginate(2);
        // $total_tithe_offering = CashBook::latest()->sum('tithe'); //->sortBy('id');
        // $total_tithe_offering = CashBook::orderBy('created_at', 'desc')->whereMonth('record_date', Carbon::now()->month)->sum('tithe'); //->sortBy('id');
        // $total_sunday_school_offering = CashBook::orderBy('created_at', 'desc')->sum('sunday_school_offering');
        // $total_church_offering = CashBook::orderBy('created_at', 'desc')->sum('church_offering');
        // $total_thanks_giving_offering = CashBook::orderBy('created_at', 'desc')->sum('thanks_giving_offering');
        // $total_children_offering = CashBook::orderBy('created_at', 'desc')->sum('children_offering');
// dd($total_tithe_offering);


        //GET MONTHLY SUM WORKING
        $total_tithe_offering = CashBook::
        orderBy(' created_at', 'desc')->
        whereMonth('record_date', Carbon::now()->month)->sum('tithe'); //->sortBy('id');
        $total_sunday_school_offering = CashBook::orderBy('created_at', 'desc')->whereMonth('record_date', Carbon::now()->month)->sum('sunday_school_offering'); //->sortBy('id');
        $total_church_offering = CashBook::orderBy('created_at', 'desc')->whereMonth('record_date', Carbon::now()->month)->sum('church_offering'); //->sortBy('id');
        $total_thanks_giving_offering = CashBook::orderBy('created_at', 'desc')->whereMonth('record_date', Carbon::now()->month)->sum('thanks_giving_offering'); //->sortBy('id');
        $total_children_offering = CashBook::orderBy('created_at', 'desc')->whereMonth('record_date', Carbon::now()->month)->sum('children_offering'); //->sortBy('id');



        $GRAND_TOTAL= $total_tithe_offering + $total_sunday_school_offering + $total_church_offering +
                      $total_thanks_giving_offering +
                      $total_children_offering;

        $thirtyTwoPercent_district = 0.32 * $total_church_offering;
        $thirtyTwoPercent_section = 0.32 * $total_church_offering;
        $TenPercent_district_minister_warfare = 0.10 * $total_church_offering;
        $TwoPercent_district_L_B = 0.02 * $total_church_offering;
        $TwoPercent_section_L_B = 0.02 * $total_church_offering;
        $mission_offering = 1000;
        $sectional_burial = 1000;

        if ($sundays) {
            // quarterly code to come shortly
            $sunday_school_quarterly_offering = $total_sunday_school_offering * 4;
        } else {
           $sunday_school_quarterly_offering = 'not yet time';
        }
        $DISBURSEMENTS = $thirtyTwoPercent_district +  $thirtyTwoPercent_section +
                         $TenPercent_district_minister_warfare +  $TwoPercent_district_L_B +
                         $TwoPercent_section_L_B +  $mission_offering + $sectional_burial;

        $TOTAL_BALANCE = $GRAND_TOTAL - $DISBURSEMENTS;

        $titheMonthlySums = DB::table('cash_books')->select("select year(created_at) as year, date_format(created_at, '%M-%Y') as month, SUM(tithe) as titheTotal FROM `cash_books` GROUP BY year(created_at), date_format(created_at,'%M_%Y') order by year(created_at), date_format(created_at, '%M-%Y') WHERE user_id=1 ");

        // $titheMonthlySums = CashBook::select([
        // DB::raw('year(created_at) as year'),
        // DB::raw('COUNT(id) as frequency'),
        // DB::raw(" date_format(created_at, '%M-%Y') as month"),
        // DB::raw("SUM(tithe) as tithe")
        // ])
        // ->groupBY ('month')
        // ->orderBy('month')
        // ->get();
// dd($titheMonthlySums);
        // $report = [];
        // dd($titheMonthlySums);
        // $titheMonthlySums->each(function($item) use (&$report)
        // {
        //     $report[$item->month][$item->tithe] =
        //             [
        //                 'tithe'=>$item->tithe
        //             ];
        // });
        // $tithe_total_amount =$titheMonthlySums->pluck('user_id')
        // ->sortBy('user_id')
        // ->uniqid();

        return view('dashboard.cash-book.index', compact('cashBooks','admin_cashBooks', 'months',
                                                            'total_tithe_offering',
                                                            'total_sunday_school_offering',
                                                            'total_church_offering',
                                                            'total_thanks_giving_offering',
                                                            'total_children_offering',
                                                            'GRAND_TOTAL',
                                                            'thirtyTwoPercent_district',
                                                            'thirtyTwoPercent_section',
                                                            'TenPercent_district_minister_warfare',
                                                            'TwoPercent_district_L_B',
                                                            'TwoPercent_section_L_B',
                                                            'mission_offering',
                                                            'sectional_burial',
                                                            'sunday_school_quarterly_offering',
                                                            'DISBURSEMENTS',
                                                            'TOTAL_BALANCE',
                                                            'monthly_total_church_offering',
                                                            'monthly_total_thanks_giving_offering',
                                                            'monthly_total_sunday_school_offering',
                                                            'monthly_total_children_offering',
                                                            'monthly_total_tithe_offering',
                                                            'monthly_group_total',
                                                            // 'MONTHLY_GRAND_TOTAL'
                                                            // 'tithe_total_amount',
                                                            'titheMonthlySums'
                                                        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.cash-book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        // $user_id = User::find($request->id);
        $user = Auth::user();
                Session::put('user', $user);
        $user = Session::get('user');
           $church_attendance  = $request->church_attendance;
           $sunday_school_attendance  = $request->sunday_school_attendance;
           $sunday_school_offering  = $request->sunday_school_offering;
           $church_offering  = $request->church_offering;
           $tithe  = $request->tithe;
           $thanks_giving_offering  = $request->thanks_giving_offering;
           $children_offering  = $request->children_offering;
           $record_date  = $request->record_date;
           $user_id  = $user->id;

$cashBook=[
           'church_attendance'=> $church_attendance ,
           'sunday_school_attendance'=> $sunday_school_attendance,
           'sunday_school_offering'=> $sunday_school_offering ,
           'church_offering'=> $church_offering ,
           'tithe'=> $tithe,
           'thanks_giving_offering'=> $thanks_giving_offering ,
           'children_offering'=> $children_offering ,
           'record_date'=> $record_date ,
           'user_id'=> $user_id,
         ];


        CashBook::create($cashBook);
        Toastr::success('New Cashbook added successfully :)','Success');


         return redirect()->back()->with('success', 'cash book created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function show(CashBook $cashBook)
    {
        $cashBooks = CashBook::orderBy('user_id', 'desc')->paginate(5);
        $cashBooks = CashBook::all();
        $sundays = CashBook::select(DB::raw(" COUNT(*) as count "))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        // $months = CashBook::select('created_at',
        // [
        //         DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month "),
        //         DB::raw("COUNT(i) as month_number "),
        //         DB::raw("SUM(church_offering) as monthly_total ")
        //     ])
        // ->groupBy(DB::raw('created_at'))
        // ->groupBy(DB::raw('month'))
        // ->orderBy(DB::raw('month'))
        // ->get();
        // ->toArray();
        // dd($months);

        // $report = [];
        // $months->each(function($item) use (&$report)
        // {
        //     $report[$item->month][$item->record_date] =
        //             [
        //                 'count'=>$item->month_number,
        //                 'church_offering'=>$item->monthly_total
        //             ];
        // });
        // $month_total =$months->pluck('user_id')
        // ->sortBy('user_id')
        // ->uniqid();

        // $months = CashBook::select(
        //     DB::raw(" COUNT(*) as count ")
        //     DB::raw("(created_at) as month_name ")

        //     )
        // ->whereYear('created_at', date('Y'))
        // ->groupBy('month_name')
        // ->get()->toArray();



        // $months = CashBook::select(DB::raw(" Month(created_at) as month "))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw('month'))
        // ->get()->toArray();

        $months = DB::table('cash_books')
        ->selectRaw('
         COUNT(*) as count,
        SUM(church_offering) AS total_church_offering,
        SUM(thanks_giving_offering) AS total_thanks_giving_offering,
        SUM(sunday_school_offering) AS total_sunday_school_offering,
        SUM(children_offering) AS total_children_offering,
        SUM(tithe) AS total_tithe_offering

        ')->groupByRaw('MONTH(created_at)')->get();

        $monthly_group_total = DB::table('cash_books')
        ->selectRaw('
        SUM(church_offering) AS total_church_offering,
        SUM(thanks_giving_offering) AS total_thanks_giving_offering,
        SUM(sunday_school_offering) AS total_sunday_school_offering,
        SUM(children_offering) AS total_children_offering,
        SUM(tithe) AS total_tithe_offering

        ')->groupByRaw('MONTH(created_at)')->get();

        $monthly_total_tithe_offering = DB::table('cash_books')
        ->selectRaw('
        SUM(church_offering) AS total_church_offering,
        SUM(thanks_giving_offering) AS total_thanks_giving_offering,
        SUM(sunday_school_offering) AS total_sunday_school_offering,
        SUM(children_offering) AS total_children_offering,
        SUM(tithe) AS total_tithe_offering
        ')->groupByRaw('MONTH(created_at)')->orderBy('id', 'desc')->get();


        // $monthly_total_church_offering = DB::table('cash_books')
        // ->selectRaw('
        // SUM(church_offering) AS total_church_offering,
        // ')->groupByRaw('MONTH(created_at)')->get()->pluck('total_church_offering');

        // $monthly_total_thanks_giving_offering = DB::table('cash_books')
        // ->selectRaw('
        // SUM(thanks_giving_offering) AS total_thanks_giving_offering,
        // ')->groupByRaw('MONTH(created_at)')->get()->pluck('total_thanks_giving_offering');

        // $monthly_total_sunday_school_offering = DB::table('cash_books')
        // ->selectRaw('
        // SUM(sunday_school_offering) AS total_sunday_school_offering,
        // ')->groupByRaw('MONTH(created_at)')->get()->pluck('total_sunday_school_offering');

        // $monthly_total_children_offering = DB::table('cash_books')
        // ->selectRaw('
        // SUM(children_offering) AS total_children_offering,
        // ')->groupByRaw('MONTH(created_at)')->get()->pluck('total_children_offering');

        // $thisMonthTOTAL = $monthly_total_children_offering;


        $monthly_total_church_offering = DB::table('cash_books')
        ->selectRaw('SUM(church_offering) AS total_church_offering')->groupByRaw('MONTH(created_at)')->get();

        $monthly_total_thanks_giving_offering = DB::table('cash_books')
        ->selectRaw(' SUM(thanks_giving_offering) AS total_thanks_giving_offering')->groupByRaw('MONTH(created_at)')->get();

        $monthly_total_sunday_school_offering = DB::table('cash_books')
        ->selectRaw('SUM(sunday_school_offering) AS total_sunday_school_offering')->groupByRaw('MONTH(created_at)')->get();

        $monthly_total_children_offering = DB::table('cash_books')
        ->selectRaw('SUM(children_offering) AS total_children_offering')->groupByRaw('MONTH(created_at)')->get();

        $monthly_total_tithe_offering = DB::table('cash_books')
        ->selectRaw('COUNT(tithe) AS count')->groupByRaw('MONTH(created_at)')->get();

        $month_tithe_offering = CashBook::orderBy('created_at', 'desc')->groupBy('record_date')->sum('tithe');
        $month_offer = CashBook::select('tithe')->whereMonth('record_date', Carbon::now()->month)->sum('tithe');

// dd($monthly_total_tithe_offering);
        // foreach ($monthly_group_total as $key => $value) {

            // $MONTHLY_GRAND_TOTAL =
            //                             $value->total_church_offering +
            //                             $value->total_thanks_giving_offering +
            //                             $value->total_children_offering +
            //                             $value->total_tithe_offering;

            //                             dd($value->total_tithe_offering);
            //                             dd($MONTHLY_GRAND_TOTAL);
            //     }

        // $MONTHLY_GRAND_TOTAL =  ($monthly_total_church_offering) +
        //                         ($monthly_total_thanks_giving_offering) +
        //                         ($monthly_total_sunday_school_offering) +
        //                         ($monthly_total_children_offering) +
        //                         ($monthly_total_tithe_offering);


        // dd($MONTHLY_GRAND_TOTAL);


        $admin_cashBooks = CashBook::orderBy('created_at','asc', date('m')) ->whereYear('created_at', date('Y'))->latest()->paginate(4);
        $cashBooks = CashBook::where('user_id', Auth::user()->id)->latest()->paginate();
        // $total_tithe_offering = CashBook::latest()->sum('tithe'); //->sortBy('id');
        // $total_tithe_offering = CashBook::orderBy('created_at', 'desc')->whereMonth('record_date', Carbon::now()->month)->sum('tithe'); //->sortBy('id');
        // $total_sunday_school_offering = CashBook::orderBy('created_at', 'desc')->sum('sunday_school_offering');
        // $total_church_offering = CashBook::orderBy('created_at', 'desc')->sum('church_offering');
        // $total_thanks_giving_offering = CashBook::orderBy('created_at', 'desc')->sum('thanks_giving_offering');
        // $total_children_offering = CashBook::orderBy('created_at', 'desc')->sum('children_offering');
// dd($total_tithe_offering);


        //GET MONTHLY SUM WORKING
        $total_tithe_offering = CashBook::orderBy('created_at', 'desc')->whereMonth('record_date', Carbon::now()->month)->sum('tithe'); //->sortBy('id');
        $total_sunday_school_offering = CashBook::orderBy('created_at', 'desc')->whereMonth('record_date', Carbon::now()->month)->sum('sunday_school_offering'); //->sortBy('id');
        $total_church_offering = CashBook::orderBy('created_at', 'desc')->whereMonth('record_date', Carbon::now()->month)->sum('church_offering'); //->sortBy('id');
        $total_thanks_giving_offering = CashBook::orderBy('created_at', 'desc')->whereMonth('record_date', Carbon::now()->month)->sum('thanks_giving_offering'); //->sortBy('id');
        $total_children_offering = CashBook::orderBy('created_at', 'desc')->whereMonth('record_date', Carbon::now()->month)->sum('children_offering'); //->sortBy('id');



        $GRAND_TOTAL= $total_tithe_offering + $total_sunday_school_offering + $total_church_offering +
                      $total_thanks_giving_offering +
                      $total_children_offering;

        $thirtyTwoPercent_district = 0.32 * $total_church_offering;
        $thirtyTwoPercent_section = 0.32 * $total_church_offering;
        $TenPercent_district_minister_warfare = 0.10 * $total_church_offering;
        $TwoPercent_district_L_B = 0.02 * $total_church_offering;
        $TwoPercent_section_L_B = 0.02 * $total_church_offering;
        $mission_offering = 1000;
        $sectional_burial = 1000;

        if ($sundays) {
            // quarterly code to come shortly
            $sunday_school_quarterly_offering = $total_sunday_school_offering * 4;
        } else {
           $sunday_school_quarterly_offering = 'not yet time';
        }
        $DISBURSEMENTS = $thirtyTwoPercent_district +  $thirtyTwoPercent_section +
                         $TenPercent_district_minister_warfare +  $TwoPercent_district_L_B +
                         $TwoPercent_section_L_B +  $mission_offering + $sectional_burial;

        $TOTAL_BALANCE = $GRAND_TOTAL - $DISBURSEMENTS;
        return view('dashboard.cash-book.show', compact('cashBooks','admin_cashBooks', 'months',
                                                            'total_tithe_offering',
                                                            'total_sunday_school_offering',
                                                            'total_church_offering',
                                                            'total_thanks_giving_offering',
                                                            'total_children_offering',
                                                            'GRAND_TOTAL',
                                                            'thirtyTwoPercent_district',
                                                            'thirtyTwoPercent_section',
                                                            'TenPercent_district_minister_warfare',
                                                            'TwoPercent_district_L_B',
                                                            'TwoPercent_section_L_B',
                                                            'mission_offering',
                                                            'sectional_burial',
                                                            'sunday_school_quarterly_offering',
                                                            'DISBURSEMENTS',
                                                            'TOTAL_BALANCE',
                                                            'monthly_total_church_offering',
                                                            'monthly_total_thanks_giving_offering',
                                                            'monthly_total_sunday_school_offering',
                                                            'monthly_total_children_offering',
                                                            'monthly_total_tithe_offering',
                                                            'monthly_group_total',
                                                            // 'MONTHLY_GRAND_TOTAL',
                                                            'cashBook',
                                                            'titheMonthlySums'

                                                        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function edit(CashBook $cashBook)
    {
        $cashBook =  CashBook::findOrFail($cashBook->id);
        return view('dashboard.cash-book.edit', compact('cashBook'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashBook $cashBook)
    {
        //

        $user = Auth::user();
                Session::put('user', $user);
        $user = Session::get('user');
           $cashBook->church_attendance  = $request->church_attendance;
           $cashBook->sunday_school_attendance  = $request->sunday_school_attendance;
           $cashBook->sunday_school_offering  = $request->sunday_school_offering;
           $cashBook->church_offering  = $request->church_offering;
           $cashBook->tithe  = $request->tithe;
           $cashBook->thanks_giving_offering  = $request->thanks_giving_offering;
           $cashBook->children_offering  = $request->children_offering;
           $cashBook->record_date  = $request->record_date;
           $cashBook->user_id  = $user->id;
           $cashBook->save();

// $cashBook=[
//            'church_attendance'=> $church_attendance ,
//            'sunday_school_attendance'=> $sunday_school_attendance,
//            'sunday_school_offering'=> $sunday_school_offering ,
//            'church_offering'=> $church_offering ,
//            'tithe'=> $tithe,
//            'thanks_giving_offering'=> $thanks_giving_offering ,
//            'children_offering'=> $children_offering ,
//            'record_date'=> $record_date ,
//            'user_id'=> $user_id,
//          ];


        // CashBook::where('id', $request->id)->update($cashBook);
        Toastr::success('Cashbook Updated successfully :)','Success');


         return redirect()->route('user.cashBook.index')->with('success', 'cash book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashBook $cashBook)
    {
        $cashBook ->delete();

        return redirect()->back()->with('success', 'deleted successfully');
    }
}
