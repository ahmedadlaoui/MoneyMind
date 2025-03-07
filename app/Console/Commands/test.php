<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Goal;
use App\Models\Depense;

class test extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process monthly salary, deduct savings and recurring expenses';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->day;
        $users = User::all();

        foreach ($users as $user) {
            if ($user->salary_date instanceof Carbon) {
                $salaryDay = $user->salary_date->day;
            } else {
                $salaryDay = Carbon::parse($user->salary_date)->day;
            }
            
            if ($today == $salaryDay) {
                // 1. Add monthly salary to savings
                $user->saving += $user->monthly_income;

                // 2. Calculate and deduct total savings contributions
                $goals = Goal::where('user_id', $user->id)->get();
                $totalContributions = $goals->sum(function($goal) use ($user) {
                    return ($goal->contribution/100) * $user->monthly_income;
                });
                $user->saving -= $totalContributions;

                // 3. Process recurring expenses
                $recurringExpenses = Depense::where('user_id', $user->id)
                    ->where('type', 'recurrent')
                    ->get();

                foreach ($recurringExpenses as $expense) {
                    // Create new expense entry for this month
                    $newExpense = $expense->replicate();
                    $newExpense->date = Carbon::now();
                    $newExpense->save();

                    // Deduct expense amount from savings
                    $user->saving -= $expense->price;
                }

                // 4. Save updated user balance
                $user->save();

                $this->info("Processed monthly update for user: {$user->name}");
                $this->info("- Salary added: +{$user->monthly_income}");
                $this->info("- Savings contributed: -{$totalContributions}");
                $this->info("- Recurring expenses processed: -" . $recurringExpenses->sum('price'));
                $this->info("- New balance: {$user->saving}");
            }
        }
        
        $this->info('✅ Monthly processing completed successfully.');
    }
}
