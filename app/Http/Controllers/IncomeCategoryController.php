<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomeCategory = IncomeCategory::all();
        return view('dashboard.income-category.index', compact('incomeCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.income-category.create');
    }
    public function dynamic()
    {
        return view('dashboard.income-category.dynamic');
    }
    public function dynamicStore(Request $request)
    {
        $name = $request->name;
        $incomeCategory = new IncomeCategory();
        if (!empty($incomeCategory->name)) {
            for ($i=0; $i < count($incomeCategory->name); $i++) {

                $incomeCategory->name = $name[$i];
                $incomeCategory->save();
            }
        }

        Toastr::success('income category added successfully :)','Success');
        return redirect()->route('user.incomeCategory.index');
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
        $incomeCategory = new IncomeCategory();
        $incomeCategory->name = $request->name;
        $incomeCategory->save();

        Toastr::success('income category added successfully :)','Success');
        return redirect()->route('user.incomeCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeCategory $incomeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeCategory $incomeCategory)
    {
        $incomeCategory = IncomeCategory::findOrFail($incomeCategory->id);
        return view('dashboard.income-category.edit', compact('incomeCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeCategory $incomeCategory)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $income = IncomeCategory::findOrFail($incomeCategory->id);
        $income->name =$request->name;
        $income->update();

        Toastr::info('income category update successfully :)','info');

        return redirect()->route('user.incomeCategory.index')->with('message', 'new income created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeCategory $incomeCategory)
    {
        $incomeCategory = IncomeCategory::findOrFail($incomeCategory->id);

        $incomeCategory->delete();
        Toastr::error('income category deleted successfully :)','error');

        return redirect()->route('user.incomeCategory.index')->with('message', 'incomeCategory deleted successfully');
    }
}
