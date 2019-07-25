<?php

namespace App\Http\Controllers;

use Auth;
use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Requests\CreateExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Auth::user()->expenses()->paginate(10);
        $cats = ExpenseCategory::all();

        return view('expense_management.expenses.index', compact('expenses', 'cats'));
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
    public function store(CreateExpenseRequest $request)
    {
        if($request->validated()) {
            $expense = new Expense();
            $expense->fill($request->all());
            $expense->user_id = Auth::user()->id;
            $expense->save();

            return redirect()->route('expenses.index')
                             ->with('status', [
                                'msg'       =>  'Expense Successfully Created.',
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
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        if($request->validated()) {
            $expense->fill($request->all());
            $expense->user_id = Auth::user()->id;
            $expense->save();

            return redirect()->route('expenses.index')
                             ->with('status', [
                                'msg'       =>  'Expense Successfully Updated.',
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
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')
                            ->with('status', [
                            'msg'       =>  'Expense Successfully Removed.',
                            'variant'   =>  'success',
                            ]);
    }
}
