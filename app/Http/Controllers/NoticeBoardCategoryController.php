<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticeBoardCategory;
use Brian2694\Toastr\Facades\Toastr;

class NoticeBoardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticeBoardCategories = NoticeBoardCategory::all();
        return view('dashboard.notice_BoardCategory.index', compact('noticeBoardCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.notice_BoardCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $noticeBoardCategory = new NoticeBoardCategory();
        $noticeBoardCategory->name = $request->name;
        $noticeBoardCategory->save();

        Toastr::success('declaration deleted successfully :)','success', ["positionClass" =>"toast-top-center"] );

        return redirect()->route('user.noticeBoardCategory.index')->with('success', 'notice category created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoticeBoardCategory  $noticeBoardCategory
     * @return \Illuminate\Http\Response
     */
    public function show(NoticeBoardCategory $noticeBoardCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoticeBoardCategory  $noticeBoardCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(NoticeBoardCategory $noticeBoardCategory)
    {
        $noticeBoardCategories = NoticeBoardCategory::all();
        return view('dashboard.notice_BoardCategory.edit', compact('noticeBoardCategories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoticeBoardCategory  $noticeBoardCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NoticeBoardCategory $noticeBoardCategory)
    {
        $noticeBoardCategory->name =$request->name;
        $noticeBoardCategory->save();
        Toastr::success('declaration deleted successfully :)','info', ["positionClass" =>"toast-top-center"] );

        return redirect()->back()->with('success', 'notice category deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoticeBoardCategory  $noticeBoardCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(NoticeBoardCategory $noticeBoardCategory)
    {
        $noticeBoardCategory->delete();

        Toastr::error('declaration deleted successfully :)','error', ["positionClass" =>"toast-top-center"] );

        return redirect()->back()->with('success', 'notice category deleted successfully');
    }
}
