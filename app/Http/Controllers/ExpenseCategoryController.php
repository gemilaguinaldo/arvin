<?php

namespace App\Http\Controllers;

use App\ExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Requests\CreateExpenseCategoryRequest;
use App\Http\Requests\UpdateExpenseCategoryRequest;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = ExpenseCategory::paginate(10);

        return view('expense_management.expenses_categories.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExpenseCategoryRequest $request)
    {
        if($request->validated()) {
            $expenseCategory = new ExpenseCategory();
            $expenseCategory->fill($request->all());
            $expenseCategory->save();

            return redirect()->route('categories.index')
                             ->with('status', [
                                'msg'       =>  'Category Successfully Created.',
                                'variant'   =>  'success',
                             ]);
        }
        return redirect()->back()
                            ->with('status', [
                            'msg'       =>  'Something Went Wrong.',
                            'variant'   =>  'danger',
                            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseCategoryRequest $request, ExpenseCategory $expenseCategory)
    {
        if($request->validated()) {
            $expenseCategory->fill($request->all());
            $expenseCategory->save();

            return redirect()->route('categories.index')
                             ->with('status', [
                                'msg'       =>  'Category Successfully Created.',
                                'variant'   =>  'success',
                             ]);
        }
        return redirect()->back()
                            ->with('status', [
                            'msg'       =>  'Something Went Wrong.',
                            'variant'   =>  'danger',
                            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseCategory $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
                            ->with('status', [
                            'msg'       =>  'Category Successfully Removed.',
                            'variant'   =>  'success',
                            ]);
    }
}
