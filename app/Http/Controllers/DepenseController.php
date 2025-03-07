<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\Category;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;
use App\Services\GeminiService;

class DepenseController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function addExpense()
    {
        try {
            $user = Auth::user();
            $newExpenseAmount = (float)request('depamount');

            // Get current month's total expenses
            $currentMonthTotal = Depense::where('user_id', $user->id)
                ->whereMonth('date', now()->month)
                ->whereYear('date', now()->year)
                ->sum('price');


            $goals = Goal::where('user_id', $user->id)->get();
            $totalMonthlyContributions = $goals->sum(function ($goal) use ($user) {
                return ($goal->contribution / 100) * $user->monthly_income;
            });

            // Calculate total monthly commitments including new expense
            $totalMonthlyCommitments = $currentMonthTotal + $totalMonthlyContributions + $newExpenseAmount;

            // Check if total would exceed monthly income
            if ($totalMonthlyCommitments > $user->monthly_income) {
                return back()->with(
                    'error',
                    sprintf(
                        'Cannot add expense: Total monthly commitments (%.2f dhs) would exceed your monthly income (%.2f dhs). This includes: 
                         Current month expenses: %.2f dhs
                         Savings contributions: %.2f dhs
                        New expense: %.2f dhs',
                        $totalMonthlyCommitments,
                        $user->monthly_income,
                        $currentMonthTotal,
                        $totalMonthlyContributions,
                        $newExpenseAmount
                    )
                );
            }

            // If we get here, it's safe to add the expense
            $newdepense = new Depense();
            $newdepense->title = request('deptitle');
            $newdepense->date = request('depdate');
            $newdepense->category_id = request('depcategory');
            $newdepense->price = $newExpenseAmount;
            $newdepense->type = request('deptype');
            $newdepense->user_id = $user->id;
            $newdepense->save();

            return redirect()->route('expenses.showcategories')->with('success', 'Expense added successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error adding expense: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $expense = Depense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.showcategories');
    }

    public function getUserExpenses()
    {
        $userId = Auth::id();
        $expenses = Depense::where('user_id', $userId)
            ->with('category')
            ->orderBy('date', 'desc')
            ->get();

        // Calculate totals as floats
        $totalExpenses = (float)$expenses->sum('price');
        $recurringExpenses = (float)$expenses->where('type', 'recurrent')->sum('price');
        $oneTimeExpenses = (float)$expenses->where('type', 'normal')->sum('price');

        $currentMonthExpenses = Depense::where('user_id', $userId)
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->get();

        $currentMonthTotal = (float)$currentMonthExpenses->sum('price');
        $currentMonthRecurring = (float)$currentMonthExpenses->where('type', 'recurrent')->sum('price');
        $currentMonthOneTime = (float)$currentMonthExpenses->where('type', 'normal')->sum('price');

        $categories = Category::all();
        $suggestions = nl2br($this->geminiService->getSuggestions($expenses, $recurringExpenses, Auth::user()->monthly_income));

        return view('user_dashboard/expenses', compact(
            'expenses',
            'categories',
            'totalExpenses',
            'recurringExpenses',
            'oneTimeExpenses',
            'currentMonthTotal',
            'currentMonthRecurring',
            'currentMonthOneTime',
            'suggestions'
        ));
    }


    public function getUserExpensesData()
    {
        $userId = Auth::id();
        $expenses = Depense::where('user_id', $userId)
            ->with('category')
            ->orderBy('date', 'desc')
            ->get();

        $totalExpenses = $expenses->sum('price');
        $recurringExpenses = $expenses->where('type', 'recurrent')->sum('price');
        $oneTimeExpenses = $expenses->where('type', 'normal')->sum('price');

        

        $categories = Category::all();
        return view('user_dashboard/salary', compact(
            'expenses',
            'categories',
            'totalExpenses',
            'recurringExpenses',
            'oneTimeExpenses'
        ));
    }
    public function getUserExpensesData_board()
    {
        $userId = Auth::id();
        $user = Auth::user();
        $categories = Category::all();


        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();
        $daysInMonth = now()->daysInMonth;
        $lastMonth = now()->subMonth();


        $currentMonthExpenses = Depense::where('user_id', $userId)
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->orderBy('date', 'asc')
            ->with('category')
            ->limit(4)
            ->get();


        $lastMonthExpenses = Depense::where('user_id', $userId)
            ->whereMonth('date', $lastMonth->month)
            ->whereYear('date', $lastMonth->year)
            ->sum('price');


        $monthlyIncome = $user->monthly_income ?? 0;
        $currentMonthTotal = $currentMonthExpenses->sum('price');

        //comparison with last month
        $expenseChange = $lastMonthExpenses != 0
            ? (($currentMonthTotal - $lastMonthExpenses) / $lastMonthExpenses) * 100
            : 0;


        $currentBalance = $monthlyIncome - $currentMonthTotal;
        $balanceChange = $lastMonthExpenses != 0
            ? (($currentBalance - ($monthlyIncome - $lastMonthExpenses)) / ($monthlyIncome - $lastMonthExpenses)) * 100
            : 0;


        $totalExpenses = $currentMonthExpenses->sum('price');
        $recurringExpenses = $currentMonthExpenses->where('type', 'recurrent')->sum('price');
        $oneTimeExpenses = $currentMonthExpenses->where('type', 'normal')->sum('price');

        $currentMonthTotal = $currentMonthExpenses->sum('price');
        $currentMonthRecurring = $currentMonthExpenses->where('type', 'recurrent')->sum('price');
        $currentMonthOneTime = $currentMonthExpenses->where('type', 'normal')->sum('price');


        $dailyData = [];
        $runningBalance = $monthlyIncome;
        $runningExpenses = 0;

        $expensesByDay = $currentMonthExpenses->groupBy(function ($expense) {
            return (int)date('d', strtotime($expense->date));
        });


        for ($day = 1; $day <= $daysInMonth; $day++) {
            $dailyExpense = isset($expensesByDay[$day])
                ? $expensesByDay[$day]->sum('price')
                : 0;

            $runningBalance -= $dailyExpense;
            $runningExpenses += $dailyExpense;

            $dailyData[] = [
                'day' => $day,
                'balance' => $runningBalance,
                'expense' => $runningExpenses, // Cumulative expenses
                'dailyExpense' => $dailyExpense // Single day expense
            ];
        }


        $totalGoals = Goal::Where('user_id', Auth::id())
            ->sum('targetprice');


        return view('user_dashboard/dashboard', compact(
            'categories',
            'totalExpenses',
            'recurringExpenses',
            'oneTimeExpenses',
            'currentMonthTotal',
            'currentMonthRecurring',
            'currentMonthOneTime',
            'dailyData',
            'monthlyIncome',
            'daysInMonth',
            'currentBalance',
            'balanceChange',
            'expenseChange',
            'currentMonthExpenses',
            'totalGoals'
        ));
    }
}
