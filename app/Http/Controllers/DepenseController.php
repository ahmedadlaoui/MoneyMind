<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    public function addExpense()
    {
        $newdepense = new Depense();
        $newdepense->title = request('deptitle');
        $newdepense->date = request('depdate');
        $newdepense->category_id = request('depcategory');
        $newdepense->price = request('depamount');
        $newdepense->type = request('deptype');
        $newdepense->user_id = Auth::id();
        $newdepense->save();

        return redirect()->route('expenses.showcategories');
    }

    public function getUserExpenses()
    {
        $userId = Auth::id();
        $expenses = Depense::where('user_id', $userId)
                          ->with('category')
                          ->orderBy('date', 'desc')
                          ->get();
        
        // Calculate totals
        $totalExpenses = $expenses->sum('price');
        $recurringExpenses = $expenses->where('type', 'recurrent')->sum('price');
        $oneTimeExpenses = $expenses->where('type', 'normal')->sum('price');
        
        $categories = Category::all();
        
        return view('user_dashboard/expenses', compact(
            'expenses', 
            'categories', 
            'totalExpenses', 
            'recurringExpenses', 
            'oneTimeExpenses'
        ));
    }
}