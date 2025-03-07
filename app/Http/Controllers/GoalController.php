<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function SetGoal(Request $request)
    {
        try {
            $request->validate([
                'goal_name' => 'required|string|max:255',
                'target_price' => 'required|numeric|min:1',
                'monthly_contribution' => 'required|numeric|min:1',
                'description' => 'required|string'
            ]);

            Goal::create([
                'name' => $request->goal_name,
                'description' => $request->description,
                'user_id' => Auth::id(),
                'targetprice' => $request->target_price,
                'contribution' => $request->monthly_contribution,
                'is_achieved' => false
            ]);

            return redirect()->back()->with('success', 'Savings goal added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error adding savings goal: ' . $e->getMessage());
        }
    }

}
