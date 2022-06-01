<?php

namespace App\Http\Controllers;

use App\Models\NoticeBoard;
use App\Models\NoticeBoardCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NoticeBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticeBoardCategories = NoticeBoardCategory::all();
        $noticeBoard = NoticeBoard::where('notice_board_category_id')->latest()->paginate(10);
        // $noticeBoards = NoticeBoard::all();
        // ->whereBetween('notice_board_category_id', 'desc');

    $noticeBoards = $noticeBoard->whereNotNull('noticeBoardCategory')->orderBy('notice_board_category_id', 'desc')->get()->groupBy('notice_board_category_id');

        return view('dashboard.notice_Board.index', compact('noticeBoardCategories', 'noticeBoards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $noticeBoardCategories = NoticeBoardCategory::all();
        return view('dashboard.notice_Board.create', compact('noticeBoardCategories'))->with('success', 'events created successfully');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'start_time'=>'required|date_format:H:i'
        // dd($request->a  ll());
        $noticeBoard = new NoticeBoard();
         $noticeBoard-> notice_board_category_id = $request->notice_board_category_id;
         $noticeBoard-> start_time = Carbon::parse($request->input('start_time'))->format('h:i a');
         $noticeBoard-> end_time   = Carbon::parse($request->input('end_time'))->format('h:i a');
         $noticeBoard-> start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
         $noticeBoard-> end_date   = Carbon::parse($request->input('end_date'))->format('Y-m-d');
         $noticeBoard-> venue = $request->venue;
         $noticeBoard-> banner = $request->banner;
         $noticeBoard-> speaker = $request->speaker;
         $noticeBoard-> theme   = $request->theme;
         $noticeBoard-> topic = $request->topic;
         $noticeBoard-> bible_text = $request->bible_text;
         $noticeBoard->save();

        return redirect()->route('user.noticeBoard.index')->with('success', 'events created successfully');
    }
    // notice_board_category_id,start_time,end_time,start_date,end_date,venue,banner,speaker, theme,topic, bible_text
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function show(NoticeBoard $noticeBoard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function edit(NoticeBoard $noticeBoard)
    {
        $noticeBoardCategories = NoticeBoardCategory::all();
        return view('dashboard.notice_Board.edit', compact('noticeBoard', 'noticeBoardCategories'))->with('success', 'events created successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NoticeBoard $noticeBoard)
    {
        $noticeBoard-> notice_board_category_id = $request->notice_board_category_id;
        $noticeBoard-> start_time = $request->start_time;
        $noticeBoard-> end_time = $request->end_time;
        $noticeBoard-> start_date = $request->start_date;
        $noticeBoard-> end_date = $request->end_date;
        $noticeBoard-> venue = $request->venue;
        $noticeBoard-> banner = $request->banner;
        $noticeBoard-> speaker = $request->speaker;
        $noticeBoard-> theme   = $request->theme;
        $noticeBoard-> topic = $request->topic;
        $noticeBoard-> bible_text = $request->bible_text;
        $noticeBoard->save();


        return redirect()->back()->with('success', 'events updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy(NoticeBoard $noticeBoard)
    {
        $noticeBoard->delete();
        return redirect()->back()->with('success', 'events deleted successfully');

    }
}
