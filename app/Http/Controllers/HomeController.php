<?php

namespace App\Http\Controllers;

use Auth;
use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $cats = ExpenseCategory::whereHas('expenses', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        return view('dashboard.index', compact('cats'));
    }

    public function getStats()
    {
        $user = Auth::user();
        $labels = array();
        $data = array();
        $cats = ExpenseCategory::whereHas('expenses', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        foreach($cats as $cat) {
            $labels[] = $cat->display_name;
            $data[] = $cat->expenses()->where('user_id', $user->id)->sum('amount');
        }
        
        return response()
                    ->json([
                        'labels'    =>  $labels,
                        'data'      =>  $data,
                    ]);

    }
}
