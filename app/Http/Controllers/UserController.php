<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function getusernumbers()
    // {
    //     $user = User::where('id', Auth::id())->get();
    //     return view('user_dashboard/salary', compact('user'));
    // }

    public function updateIncome(Request $request)
    {
        try {
            $request->validate([
                'salary_amount' => 'required|numeric|min:0',
                'salary_date' => 'required|date'
            ]);

            $user = Auth::user();
            $user->monthly_income = $request->salary_amount;
            $user->salary_date = $request->salary_date;
            $user->save();

            return redirect()->back()->with('success', 'Income updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update income');
        }
    }
}
