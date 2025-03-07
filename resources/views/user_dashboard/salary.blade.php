<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Management | MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }

        .progress-bar {
            transition: width 1s ease-in-out;
        }

        .income-card {
            border-left: 4px solid #3b82f6;
        }

        .wishlist-card {
            transition: all 0.2s ease;
        }

        .wishlist-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>



    <div class="flex h-screen bg-gray-50">
        @include('components.sidebar', ['active' => 'income'])

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Top Navigation -->
            @include('components.header')

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Two Column Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column - Income Management (2/3 width) -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Income Summary Card -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-lg font-bold text-gray-900 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Income Summary
                                </h2>
                                <!-- Updated Add Income Button -->
                                <button
                                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-[#FF6F3C] rounded-md hover:bg-[#ff5a24] transition-colors duration-200 shadow-sm"
                                    onclick="openModal('salaryModal')">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Add Income
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <p class="text-sm text-gray-500 mb-1">Monthly Income</p>
                                    <h3 class="text-2xl font-bold text-gray-900">{{ Auth::user()->monthly_income }} MAD</h3>

                                </div>

                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <p class="text-sm text-gray-500 mb-1">Total Monthly Outcome</p>
                                    @php
                                    // Calculate total monthly savings contributions
                                    $totalMonthlyContributions = $goals->sum(function($goal) {
                                    return ($goal->contribution/100) * Auth::user()->monthly_income;
                                    });

                                    // Get all recurring expenses (not just current month)
                                    $recurringExpenses = $expenses->where('type', 'recurrent')->sum('price');

                                    // Calculate total monthly outcome (recurring expenses + savings)
                                    $totalMonthlyOutcome = $totalMonthlyContributions + $recurringExpenses;

                                    // Calculate percentage of income
                                    $percentageOfIncome = Auth::user()->monthly_income > 0
                                    ? ($totalMonthlyOutcome / Auth::user()->monthly_income) * 100
                                    : 0;
                                    @endphp
                                    <h3 class="text-2xl font-bold {{ $percentageOfIncome > 100 ? 'text-red-600' : 'text-gray-900' }}">
                                        {{ number_format($totalMonthlyOutcome, 2) }} MAD
                                    </h3>
                                    <div class="flex items-center justify-between mt-1">
                                        <p class="text-xs text-gray-500">
                                            <span class="inline-flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                                </svg>
                                                Savings: {{ number_format($totalMonthlyContributions, 2) }} MAD
                                            </span>
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            <span class="inline-flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                                Recurring: {{ number_format($recurringExpenses, 2) }} MAD
                                            </span>
                                        </p>
                                    </div>
                                    <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5">
                                        <div class="bg-[#FF6F3C] h-1.5 rounded-full" style="width: {{ min($percentageOfIncome, 100) }}%"></div>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ number_format($percentageOfIncome, 1) }}% of monthly income
                                    </p>
                                </div>

                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <p class="text-sm text-gray-500 mb-1">Wallet</p>
                                    <h3 class="text-2xl font-bold ">
                                        {{ Auth::user()->saving - $totalExpenses }} MAD
                                    </h3>

                                </div>

                            </div>
                        </div>

                        <!-- Savings Goals Section -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-lg font-bold text-gray-900 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                    </svg>
                                    Savings Goals
                                </h2>

                            </div>

                            <div class="space-y-4">
                                @foreach($goals as $goal)
                                @php
                                $monthlyContributionAmount = ($goal->contribution/100) * Auth::user()->monthly_income;
                                $monthsPassed = \Carbon\Carbon::parse($goal->created_at)->diffInMonths(now()) + 1;
                                $amountSaved = $monthsPassed * $monthlyContributionAmount;
                                $amountSaved = min($amountSaved, $goal->targetprice);
                                $progressPercentage = ($amountSaved / $goal->targetprice) * 100;
                                $amountToGo = $goal->targetprice - $amountSaved;
                                $isCompleted = $progressPercentage >= 100;
                                @endphp

                                <div class="bg-white rounded-lg border {{ $isCompleted ? 'border-green-200' : 'border-gray-200' }} p-4 shadow-sm hover:shadow-md transition-all duration-300">
                                    <div class="flex justify-between items-start mb-3">
                                        <div class="flex items-start space-x-3">
                                            <div class="flex-shrink-0">
                                                @if($isCompleted)
                                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100">
                                                    <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </span>
                                                @else
                                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#FFF0EB]">
                                                    <svg class="h-5 w-5 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </span>
                                                @endif
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900 flex items-center">
                                                    {{$goal->name}}
                                                    @if($isCompleted)
                                                    <span class="ml-2 px-2 py-0.5 text-xs font-medium bg-green-100 text-green-800 rounded-full">Completed</span>
                                                    @endif
                                                </h3>
                                                <p class="text-sm text-gray-500 mt-0.5">{{$goal->description}}</p>
                                            </div>
                                        </div>
                                        <span class="text-sm font-bold {{ $isCompleted ? 'text-green-600' : 'text-[#FF6F3C]' }}">
                                            MAD {{number_format($goal->targetprice, 1)}}
                                        </span>
                                    </div>

                                    <div class="mt-4">
                                        <div class="flex justify-between items-center mb-1.5">
                                            <span class="text-xs font-medium text-gray-500">Progress</span>
                                            <span class="text-xs font-medium {{ $isCompleted ? 'text-green-600' : 'text-[#FF6F3C]' }}">
                                                {{number_format($progressPercentage, 1)}}%
                                            </span>
                                        </div>
                                        <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                                            <div class="{{ $isCompleted ? 'bg-green-500' : 'bg-[#FF6F3C]' }} h-full rounded-full transition-all duration-700 ease-out"
                                                style="width: {{min($progressPercentage, 100)}}%"></div>
                                        </div>

                                        <div class="mt-3 grid grid-cols-2 gap-4">
                                            <div class="bg-gray-50 rounded-lg p-2">
                                                <p class="text-xs text-gray-500">Monthly Contribution</p>
                                                <p class="text-sm font-medium text-gray-900 mt-0.5">
                                                    MAD {{number_format($monthlyContributionAmount, 1)}}
                                                    <span class="text-xs text-gray-500">({{$goal->contribution}}%)</span>
                                                </p>
                                            </div>
                                            <div class="bg-gray-50 rounded-lg p-2">
                                                <p class="text-xs text-gray-500">Remaining</p>
                                                <p class="text-sm font-medium text-gray-900 mt-0.5">
                                                    MAD {{number_format($amountToGo, 1)}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mt-3 pt-3 border-t border-gray-100">
                                            <p class="text-xs text-gray-400 flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Saved: MAD {{number_format($amountSaved, 1)}} over {{(int)$monthsPassed}} month(s)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Add New Savings Goal Button -->
                                <div class="bg-white rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center h-16 cursor-pointer hover:border-[#FF6F3C] transition-colors" onclick="openModal('savingsGoalModal')">
                                    <div class="text-center">
                                        <button type="button" class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-[#FF6F3C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            <p class="text-sm font-medium text-gray-700">Add New Savings Goal</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Wishlist (1/3 width) -->
                    <div class="space-y-6">
                        <!-- Wishlist Header -->
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                My Wishlist
                            </h2>

                        </div>

                        <!-- Wishlist Items -->
                        <div class="space-y-4">
                            @forelse($wishes as $wish)
                            <!-- Wishlist Item -->
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden wishlist-card">
                                <div class="flex h-24">
                                    <img src="{{ $wish->imageURL }}" alt="{{ $wish->title }}" class="w-24 h-full object-cover">
                                    <div class="p-4 flex-1 flex flex-col justify-between">
                                        <div>
                                            <div class="flex justify-between items-start">
                                                <h3 class="font-medium text-gray-900">{{ $wish->title }}</h3>
                                                <span class="text-sm font-bold text-[#FF6F3C]">{{ number_format($wish->price) }} MAD</span>
                                            </div>
                                            <p class="text-sm text-gray-500 mt-1">{{ $wish->category->category }}</p>
                                        </div>
                                        <div class="flex justify-end">
                                            <form action="{{ route('wishes.delete', $wish->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xs text-gray-500 hover:text-[#FF6F3C]">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="bg-white rounded-lg shadow-sm p-6 text-center text-gray-500">
                                No wishlist items yet. Add your first item using the button below.
                            </div>
                            @endforelse

                            <!-- Add New Wishlist Item Button -->
                            <div class="bg-white rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center h-16 cursor-pointer hover:border-[#FF6F3C] transition-colors" onclick="openModal('wishlistModal')">
                                <div class="text-center">
                                    <button type="button" class="flex items-center justify-center">
                                        <svg class="w-5 h-5 text-[#FF6F3C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        <p class="text-sm font-medium text-gray-700">Add New Wishlist Item</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Salary Button and Modal -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50" id="salaryModal">
        <!-- Salary Form Modal Content -->
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Income</h3>
                <form action="{{ route('salary.update') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <!-- Amount Field -->
                        <div class="text-left">
                            <label for="salary_amount" class="block text-sm font-medium text-gray-700">Monthly Income</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">MAD</span>
                                </div>
                                <input type="number"
                                    name="salary_amount"
                                    id="salary_amount"
                                    value="{{ Auth::user()->monthly_income }}"
                                    class="focus:ring-[#FF6F3C] focus:border-[#FF6F3C] block w-full pl-12 pr-12 sm:text-sm border-gray-300 rounded-md py-2"
                                    placeholder="0.00"
                                    step="0.01"
                                    required>
                            </div>
                        </div>

                        <!-- Date Field -->
                        <div class="text-left">
                            <label for="salary_date" class="block text-sm font-medium text-gray-700">Salary Date</label>
                            <div class="mt-1">
                                <input type="date"
                                    name="salary_date"
                                    id="salary_date"
                                    value="{{ Auth::user()->salary_date }}"
                                    class="focus:ring-[#FF6F3C] focus:border-[#FF6F3C] block w-full sm:text-sm border-gray-300 rounded-md py-2"
                                    required>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Select the date you receive your salary</p>
                        </div>
                    </div>

                    <div class="flex space-x-2 justify-end mt-5">
                        <button type="button"
                            class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-300"
                            onclick="closeModal('salaryModal')">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-[#FF6F3C] text-white text-sm font-medium rounded-md hover:bg-[#ff5a24]">
                            {{ Auth::user()->monthly_income ? 'Update Income' : 'Add Income' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Savings Goal Button and Modal -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50" id="savingsGoalModal">
        <!-- Savings Goal Form Modal Content -->
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Savings Goal</h3>
                <form class="space-y-4" action="{{ route('salary.setgoal') }}" method="POST">
                    @csrf
                    <!-- Goal Name -->
                    <div class="text-left">
                        <label for="goal-name" class="block text-sm font-medium text-gray-700">Goal Name</label>
                        <input type="text"
                            id="goal-name"
                            name="goal_name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm"
                            placeholder="e.g., Emergency Fund"
                            required>
                    </div>

                    <!-- Target Amount -->
                    <div class="text-left">
                        <label for="goal-target" class="block text-sm font-medium text-gray-700">Target Amount</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">MAD</span>
                            </div>
                            <input type="number"
                                id="goal-target"
                                name="target_price"
                                class="focus:ring-[#FF6F3C] focus:border-[#FF6F3C] block w-full pl-12 pr-12 sm:text-sm border-gray-300 rounded-md py-2"
                                placeholder="0.00"
                                min="1"
                                required>
                        </div>
                    </div>

                    <!-- Monthly Contribution -->
                    <div class="text-left">
                        <label for="monthly-contribution" class="block text-sm font-medium text-gray-700">Monthly Contribution</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">%</span>
                            </div>
                            <input type="number"
                                id="monthly-contribution"
                                name="monthly_contribution"
                                class="focus:ring-[#FF6F3C] focus:border-[#FF6F3C] block w-full pl-12 pr-12 sm:text-sm border-gray-300 rounded-md py-2"
                                placeholder="0.00"
                                min="1"
                                required>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="text-left">
                        <label for="goal-description" class="block text-sm font-medium text-gray-700">Brief Description</label>
                        <textarea
                            id="goal-description"
                            name="description"
                            rows="3"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm"
                            placeholder="Describe your savings goal..."
                            required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex space-x-2 justify-end mt-5">
                        <button type="button"
                            class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400"
                            onclick="closeModal('savingsGoalModal')">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-[#FF6F3C] text-white text-sm font-medium rounded-md hover:bg-[#ff5a24] focus:outline-none focus:ring-2 focus:ring-[#FF6F3C]">
                            Add Goal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Wishlist Item Modal -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50" id="wishlistModal">
        <!-- Wishlist Form Modal Content -->
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Wishlist Item</h3>
                <form class="space-y-4" action="{{ route('wishes.add') }}" method="POST">
                    @csrf
                    <!-- Item Name -->
                    <div class="text-left">
                        <label for="item-name" class="block text-sm font-medium text-gray-700">Item Name</label>
                        <input type="text" id="item-name" name="item-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm" placeholder="e.g., iPhone 14 Pro" required>
                    </div>

                    <!-- Category -->
                    <div class="text-left">
                        <label for="item-category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="item-category" name="item-category" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price -->
                    <div class="text-left">
                        <label for="item-price" class="block text-sm font-medium text-gray-700">Price</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" id="item-price" name="item-price" class="focus:ring-[#FF6F3C] focus:border-[#FF6F3C] block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2" placeholder="0.00" step="0.01" required>
                        </div>
                    </div>

                    <!-- Image URL -->
                    <div class="text-left">
                        <label for="item-image" class="block text-sm font-medium text-gray-700">Image URL</label>
                        <input type="url" id="item-image" name="item-image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm" placeholder="https://example.com/image.jpg" required>
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-2 justify-end mt-5">
                        <button type="button"
                            class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400"
                            onclick="closeModal('wishlistModal')">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-[#FF6F3C] text-white text-sm font-medium rounded-md hover:bg-[#ff5a24] focus:outline-none focus:ring-2 focus:ring-[#FF6F3C]">
                            Add Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }


        document.addEventListener('DOMContentLoaded', function() {
            ['salaryModal', 'savingsGoalModal', 'wishlistModal'].forEach(modalId => {
                document.getElementById(modalId).addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeModal(modalId);
                    }
                });
            });


            const today = new Date().toISOString().split('T')[0];
            document.getElementById('salary_date').value = today;
        });
    </script>
</body>

</html>