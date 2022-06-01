<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeclarationCategory;
use Brian2694\Toastr\Facades\Toastr;

class DeclarationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $declarationCategories =  DeclarationCategory::all();
        return view('dashboard.prophetic-declaration-category.index', compact('declarationCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $declarationCategories =  DeclarationCategory::all();
        return view('dashboard.prophetic-declaration-category.create', compact('declarationCategories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $declarationCategory = new DeclarationCategory();
        $declarationCategory->declaration_title =$request->declaration_title;
        $declarationCategory->save();

        Toastr::success('Post added successfully :)','Success', ["positionClass" =>"toast-top-center"] );

        return redirect()->route('user.declarationCategory.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeclarationCategory  $declarationCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DeclarationCategory $declarationCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeclarationCategory  $declarationCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DeclarationCategory $declarationCategory)
    {
        // $declarationCategory =  DeclarationCategory::find($declarationCategory->id);
        return view('dashboard.prophetic-declaration-category.edit', compact('declarationCategory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeclarationCategory  $declarationCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeclarationCategory $declarationCategory)
    {

        $declarationCategory->declaration_title =$request->declaration_title;
        $declarationCategory->save();

        Toastr::success('Post added successfully :)','Success', ["positionClass" =>"toast-top-center"] );

        // return redirect()->back();
        return redirect()->route('user.declarationCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeclarationCategory  $declarationCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeclarationCategory $declarationCategory)
    {
        $declarationCategory->delete();

        Toastr::success('declaration deleted successfully :)','error', ["positionClass" =>"toast-top-center"] );

        return redirect()->route('user.declarationCategory.index');
    }
}
