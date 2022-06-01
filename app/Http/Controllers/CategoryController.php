<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\MassDestroyCategoryRequest;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $profile = Profile::all();
        $categories =Category::orderBy('id', 'desc')->paginate(5);
        return view('dashboard.category.index', compact('categories', 'user','profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('dashboard.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name'=>'required|max:191',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status'=>400,
        //         'errors'=> $validator->messages(),
        //     ]);

        // }else{

            //  dd($request);
            $category = new Category();
            $category->name= $request->name;
            $category ->save();

            // return response()->json([
            //     'status'=>200,
            //     'message'=>'category added successfully',
            // ]);

            Toastr::success('Post added successfully :)','Success', ["positionClass" =>"toast-top-center"] );
            return redirect()->route('user.category.index')->with('success', 'category created successfully');
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::findOrFail($category->id);
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        // dd($request);
        $category->name= $request->name;
        $category ->save();
        Toastr::info('category created successfully :)','info',["positionClass" =>"toast-top-center"] );

        return redirect()->route('user.category.index')->with('success', 'category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Toastr::error('category deleted successfully :)','error', ["positionClass" =>"toast-top-center"] );

        return redirect()->back()->with('success', 'category deleted successfully');
    }

    public function massDestroy(MassDestroyCategoryRequest $request)
    {
        Category::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
