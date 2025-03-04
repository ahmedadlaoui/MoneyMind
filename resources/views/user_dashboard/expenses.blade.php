<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses Management | MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }

        .expense-card {
            transition: all 0.2s ease;
        }

        .expense-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <x-app-layout>
        <div class="flex h-screen bg-gray-100">
            @include('components.sidebar', ['active' => 'expenses'])

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-end items-center px-6 py-4">

                    <div class="flex items-center space-x-4">
                        <button class="p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                        <div class="relative">
                            <button class="flex items-center space-x-2 focus:outline-none">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=7C3AED&background=EDE9FE' }}" alt="User avatar">
                                <span class="text-gray-700">{{ Auth::user()->name }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
                <div class="p-8">
                    <!-- Header with Add Button -->
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Expenses Management</h1>
                            <p class="mt-2 text-gray-600">Track and manage your expenses</p>
                        </div>
                        <button onclick="openExpenseModal()"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[#FF6F3C] rounded-lg hover:bg-[#ff5a24] transition-colors duration-200 shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add Expense
                        </button>
                    </div>

                    <!-- AI Insights Section -->
                    <div class="bg-gradient-to-r from-white to-orange-50 p-6 mb-8 rounded-xl shadow-sm border border-orange-100">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-[#FF6F3C]/10 rounded-lg">
                                    <svg class="w-5 h-5 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-900">AI Financial Advisor</h2>
                                    <p class="text-sm text-gray-500">Smart insights for better financial decisions</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 text-sm text-[#FF6F3C] bg-[#FF6F3C]/10 rounded-full font-medium">
                                Daily Update
                            </span>
                        </div>

                        <!-- Single Large Insight -->
                        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:border-[#FF6F3C]/30 transition-all duration-300 group">
                            <div class="flex items-start gap-4">
                                <div class="p-2 bg-[#FF6F3C]/10 rounded-lg group-hover:bg-[#FF6F3C]/20 transition-colors mt-1">
                                    <svg class="w-5 h-5 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-gray-600">
                                        Your monthly recurring expenses of <span class="text-[#FF6F3C] font-medium">${{ number_format($recurringExpenses, 2) }}</span> represent <span class="text-[#FF6F3C] font-medium">{{ number_format(($recurringExpenses / ($totalExpenses == 0 ? 1 : $totalExpenses)) * 100, 1) }}%
                                        </span> of your total spending.
                                    </p>
                                    <p class="text-gray-600">
                                        Consider reviewing your subscriptions and setting aside <span class="text-[#FF6F3C] font-medium">${{ number_format($totalExpenses * 0.2, 2) }}</span> (20%) monthly for emergency funds and future goals.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- View More Button -->
                        <div class="flex justify-center mt-4">
                            <a href="/insights" class="inline-flex items-center gap-2 px-4 py-2 text-sm text-[#FF6F3C] hover:text-[#ff5a24] transition-colors duration-200">
                                View Detailed Analysis
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                        <!-- Total Expenses Chart -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Expenses Overview</h3>
                                <span class="text-sm text-gray-500">Total: ${{ number_format($totalExpenses, 2) }}</span>
                            </div>
                            <div class="relative" style="height: 210px;">
                                <canvas id="expenseTypeChart"></canvas>
                            </div>
                        </div>

                        <!-- Expense Distribution Chart -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Expense Types</h3>
                                <span class="text-sm text-gray-500">Distribution</span>
                            </div>
                            <div class="relative" style="height: 210px;">
                                <canvas id="expenseDistributionChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Main Grid Layout -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Expense List and Suggestions Section -->
                        <div class="lg:col-span-2 space-y-6">


                            <!-- Expense List -->
                            <div class="bg-white rounded-xl shadow-sm">
                                <div class="p-6 border-b border-gray-100">
                                    <h2 class="text-xl font-semibold text-gray-900">Recent Expenses</h2>
                                    <p class="text-sm text-gray-500 mt-1">All your recent expenses</p>
                                </div>
                                <div class="divide-y divide-gray-100">
                                    @forelse($expenses as $expense)
                                    <div class="p-6 hover:bg-gray-50 transition-colors duration-200">
                                        <div class="flex items-center justify-between">
                                            <!-- Left side: Icon and Title -->
                                            <div class="flex items-center space-x-4">
                                                <div class="p-2 {{ $expense->type == 'recurrent' ? 'bg-[#FF6F3C]/10 text-[#FF6F3C]' : 'bg-gray-100 text-gray-600' }} rounded-lg">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        @if($expense->type == 'recurrent')
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        @else
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                        @endif
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="text-sm font-medium text-gray-900">{{ $expense->title }}</h3>
                                                    <p class="text-xs text-gray-500">{{ $expense->category->category }}</p>
                                                </div>
                                            </div>

                                            <!-- Right side: Date, Monthly tag, Amount, and Delete -->
                                            <div class="flex items-center gap-6">
                                                <!-- Date -->
                                                <p class="text-xs text-gray-500 whitespace-nowrap">{{ \Carbon\Carbon::parse($expense->date)->format('M d, Y') }}</p>

                                                <!-- Monthly Tag -->
                                                @if($expense->type == 'recurrent')
                                                <span class="px-2 py-0.5 text-xs bg-[#FF6F3C]/10 text-[#FF6F3C] rounded-full whitespace-nowrap">Monthly</span>
                                                @endif

                                                <!-- Amount -->
                                                <p class="text-sm font-medium text-gray-900 whitespace-nowrap min-w-[80px] text-right">${{ number_format($expense->price, 2) }}</p>

                                                <!-- Delete Button -->
                                                <button class="p-1 text-gray-400 hover:text-red-500 transition-colors duration-200">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="p-6 text-center text-gray-500">
                                        No expenses found. Add your first expense using the form.
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity / Charts -->
                        <div class="lg:col-span-1">
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
                                <!-- Add your recent activity content here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <!-- Expense Modal -->
    <div id="expenseModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50 overflow-y-auto">
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 transform transition-all">
                <!-- Modal Header -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-900">Add New Expense</h2>
                    <button onclick="closeExpenseModal()" class="text-gray-400 hover:text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Expense Form -->
                <form action="/expenses" method="post">
                    @csrf
                    <div class="space-y-4">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" id="title" name="deptitle"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#FF6F3C] focus:ring-[#FF6F3C]"
                                placeholder="Enter expense title">
                        </div>

                        <!-- Amount -->
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                            <div class="mt-1 relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" id="amount" name="depamount"
                                    class="block w-full pl-7 pr-12 rounded-lg border-gray-300 focus:border-[#FF6F3C] focus:ring-[#FF6F3C]"
                                    placeholder="0.00" step="0.01">
                            </div>
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="category" name="depcategory"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#FF6F3C] focus:ring-[#FF6F3C]">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Type -->
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <select id="type" name="deptype"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#FF6F3C] focus:ring-[#FF6F3C]">
                                <option value="normal">One-time</option>
                                <option value="recurrent">Recurring</option>
                            </select>
                        </div>

                        <!-- Date -->
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" id="date" name="depdate"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#FF6F3C] focus:ring-[#FF6F3C]">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-[#FF6F3C] text-white py-2 px-4 rounded-lg hover:bg-[#ff5a24] transition-colors duration-200">
                            Add Expense
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            try {
                // Get the chart contexts
                const typeChart = document.getElementById('expenseTypeChart');
                const distributionChart = document.getElementById('expenseDistributionChart');

                if (!typeChart || !distributionChart) {
                    console.error('Chart elements not found');
                    return;
                }

                // Parse the PHP variables safely
                const totalExpenses = parseFloat('{{ $totalExpenses }}') || 0;
                const recurringExpenses = parseFloat('{{ $recurringExpenses }}') || 0;
                const oneTimeExpenses = parseFloat('{{ $oneTimeExpenses }}') || 0;

                // Create Expense Type Chart
                new Chart(typeChart, {
                    type: 'doughnut',
                    data: {
                        labels: ['Recurring Expenses', 'One-time Expenses'],
                        datasets: [{
                            data: [recurringExpenses, oneTimeExpenses],
                            backgroundColor: ['#FF6F3C', '#4B5563'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    usePointStyle: true,
                                    padding: 20,
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const value = context.raw;
                                        return ` $${value.toFixed(2)}`;
                                    }
                                }
                            }
                        },
                        cutout: '65%'
                    }
                });

                // Create Distribution Chart
                new Chart(distributionChart, {
                    type: 'bar',
                    data: {
                        labels: ['Total', 'Recurring', 'One-time'],
                        datasets: [{
                            label: 'Amount ($)',
                            data: [totalExpenses, recurringExpenses, oneTimeExpenses],
                            backgroundColor: ['#FF6F3C', '#FF8B67', '#FFA88F'],
                            borderRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const value = context.raw;
                                        return ` $${value.toFixed(2)}`;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    callback: function(value) {
                                        return '$' + value.toFixed(2);
                                    }
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            } catch (error) {
                console.error('Error initializing charts:', error);
            }
        });

        // Keep your existing modal scripts
        function openExpenseModal() {
            document.getElementById('expenseModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeExpenseModal() {
            document.getElementById('expenseModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('expenseModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeExpenseModal();
            }
        });

        // Set today's date as default
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('date').value = today;
        });
    </script>
</body>

</html>