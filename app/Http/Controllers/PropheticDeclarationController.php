<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeclarationCategory;
use App\Models\PropheticDeclaration;
use Brian2694\Toastr\Facades\Toastr;

class PropheticDeclarationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $declarationCategory =DeclarationCategory::all();
        $propheticDeclarations = PropheticDeclaration::orderBy('id', 'desc')->paginate(5);


        return view('dashboard.prophetic-declaration.index', compact('propheticDeclarations', 'declarationCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $declarationCategory =DeclarationCategory::first();
        // dd($declarationCategory);
        return view('dashboard.prophetic-declaration.create', compact('declarationCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function published(Request $request, $id, PropheticDeclaration $propheticDeclaration)
     {
         $PropheticDeclaration =PropheticDeclaration::find($id);
         $PropheticDeclaration->publish_prophecy_Status =$request->boolean('publish_prophecy_Status');
         $PropheticDeclaration->save();
         if ($PropheticDeclaration->publish_prophecy_Status ==1) {

         Toastr::info('status changed successfully :)','info');

         return redirect()->back()->with('success', 'declaration published successfully');
         } else {

         Toastr::info('status changed successfully :)','info');

         return redirect()->back()->with('pending', 'declaration pending successfully');
         }

        //  Toastr::info('status changed successfully :)','info');

        // return redirect()->back()->with('success', 'declaration published successfully');
     }


    public function publishStatus(Request $request, $id)
     {
        $PropheticDeclaration =PropheticDeclaration::find($id);
         $PropheticDeclaration->publish_prophecy_Status =$request->boolean('publish_prophecy_Status');
         $PropheticDeclaration->save();
         Toastr::info('status changed successfully :)','info');

         return redirect()->back()->with('success', 'post has been updated successfully');
    }




    public function store(Request $request)
    {
        // dd($request->all());
        $propheticDeclaration = new PropheticDeclaration();
        $propheticDeclaration->declaration_category_id = $request->declaration_category_id ;
        $propheticDeclaration->prophetic_declaration_title = $request->prophetic_declaration_title ;
        $propheticDeclaration->prophetic_declaration_note = $request->prophetic_declaration_note ;
        $propheticDeclaration->prophetic_declaration_date = $request->prophetic_declaration_date ;
        $propheticDeclaration->save() ;

        Toastr::success('Post added successfully :)','Success', ["positionClass" =>"toast-top-center"] );

        return redirect()->route('user.propheticDeclaration.index')->with('success', 'declaration saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropheticDeclaration  $propheticDeclaration
     * @return \Illuminate\Http\Response
     */
    public function show(PropheticDeclaration $propheticDeclaration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropheticDeclaration  $propheticDeclaration
     * @return \Illuminate\Http\Response
     */
    public function edit(PropheticDeclaration $propheticDeclaration)
    {
        $declarationCategory =DeclarationCategory::all();
        // dd($declarationCategory);
        return view('dashboard.prophetic-declaration.edit', compact('declarationCategory','propheticDeclaration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropheticDeclaration  $propheticDeclaration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropheticDeclaration $propheticDeclaration)
    {
        $propheticDeclaration->declaration_category_id = $request->declaration_category_id ;
        $propheticDeclaration->prophetic_declaration_title = $request->prophetic_declaration_title ;
        $propheticDeclaration->prophetic_declaration_note = $request->prophetic_declaration_note ;
        $propheticDeclaration->prophetic_declaration_date = $request->prophetic_declaration_date ;
        $propheticDeclaration->save() ;

        Toastr::success('Post added successfully :)','Success', ["positionClass" =>"toast-top-center"] );

        return redirect()->route('user.propheticDeclaration.index')->with('success', 'declaration updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropheticDeclaration  $propheticDeclaration
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropheticDeclaration $propheticDeclaration)
    {
        $propheticDeclaration ->delete();
        return redirect()->back()->with('success', 'declaration deleted successfully');
    }
}
