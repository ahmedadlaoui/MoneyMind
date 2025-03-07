<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }

        .progress-bar {
            transition: width 1s ease-in-out;
        }

        .stat-card {
            border-left: 4px solid transparent;
        }

        .income-card {
            border-left-color: #3b82f6;
        }

        .expense-card {
            border-left-color: #ef4444;
        }

        .balance-card {
            border-left-color: #10b981;
        }

        .savings-card {
            border-left-color: #8b5cf6;
        }

        .chart-container {
            position: relative;
            height: 350px;
            width: 100%;
        }

        .upcoming-payment {
            transition: all 0.2s ease;
        }

        .upcoming-payment:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body>


    <div class="flex h-screen bg-gray-50">
        @include('components.sidebar', ['active' => 'dashboard'])

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            @include('components.header')

            <!-- Dashboard Content -->
            <main class="p-6">
                <div class="flex gap-8">
                    <!-- Left Column (Main Content) -->
                    <div class="flex-grow space-y-8">
                        <!-- Summary Cards -->
                        <div class="grid grid-cols-3 gap-6">
                            <!-- Current Balance Card -->
                            <div class="bg-white rounded-lg shadow-sm p-6">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500 mb-1">Current Balance</p>
                                        <h3 class="text-2xl font-bold text-gray-900">MAD {{ number_format($currentBalance, 2) }}</h3>
                                        <div class="flex items-center mt-1">
                                            <svg class="w-4 h-4 {{ $balanceChange >= 0 ? 'text-[#FF6F3C]' : 'text-red-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M{{ $balanceChange >= 0 ? '5 10l7-7m0 0l7 7m-7-7v18' : '19 14l-7 7m0 0l-7-7m7 7V3' }}" />
                                            </svg>
                                            <span class="text-sm {{ $balanceChange >= 0 ? 'text-[#FF6F3C]' : 'text-red-500' }} ml-1">
                                                {{ number_format(abs($balanceChange), 1) }}% from last month
                                            </span>
                                        </div>
                                    </div>
                                    <div class="bg-[#FF6F3C]/10 p-3 rounded-full">
                                        <svg class="w-6 h-6 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Monthly Income Card -->
                            <div class="bg-white rounded-lg shadow-sm p-6">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500 mb-1">Monthly Income</p>
                                        <h3 class="text-2xl font-bold text-gray-900">MAD {{ number_format($monthlyIncome, 2) }}</h3>
                                        <div class="flex items-center mt-1">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                            </svg>
                                            <span class="text-sm text-gray-400 ml-1">Fixed Income</span>
                                        </div>
                                    </div>
                                    <div class="bg-[#FF6F3C]/10 p-3 rounded-full">
                                        <svg class="w-6 h-6 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Monthly Expenses Card -->
                            <div class="bg-white rounded-lg shadow-sm p-6">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500 mb-1">Monthly Expenses</p>
                                        <h3 class="text-2xl font-bold text-gray-900">MAD {{ number_format($currentMonthTotal, 2) }}</h3>
                                        <div class="flex items-center mt-1">
                                            <svg class="w-4 h-4 {{ $expenseChange >= 0 ? 'text-red-500' : 'text-[#FF6F3C]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M{{ $expenseChange >= 0 ? '19 14l-7 7m0 0l-7-7m7 7V3' : '5 10l7-7m0 0l7 7m-7-7v18' }}" />
                                            </svg>
                                            <span class="text-sm {{ $expenseChange >= 0 ? 'text-red-500' : 'text-[#FF6F3C]' }} ml-1">
                                                {{ number_format(abs($expenseChange), 1) }}% from last month
                                            </span>
                                        </div>
                                    </div>
                                    <div class="bg-gray-100 p-3 rounded-full">
                                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Financial Overview Section -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-lg font-bold text-gray-900">Income vs Expenses</h2>
                                <div class="flex space-x-2">
                                    <button class="px-3 py-1 text-sm bg-gray-100 rounded-md text-gray-600 hover:bg-gray-200">This month</button>
                                </div>
                            </div>
                            <div class="chart-container">
                                <canvas id="incomeExpensesChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column (Latest Payments) -->
                    <div class="w-96">
                        <div class="bg-white rounded-lg shadow-sm p-6 sticky top-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-lg font-bold text-gray-900 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Latest Payments
                                </h2>
                                <a href="#" class="text-sm font-medium text-[#FF6F3C] hover:text-[#ff5a24]">View All</a>
                            </div>

                            <div class="space-y-4 min-h-[400px]">
                                @if(count($currentMonthExpenses) > 0)
                                    @foreach($currentMonthExpenses as $currentmonthexpense)
                                        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                            <div class="flex justify-between items-center mb-2">
                                                <h3 class="font-medium text-gray-900">{{ $currentmonthexpense->title }}</h3>
                                                <p class="text-lg font-medium text-gray-900">{{ $currentmonthexpense->price }}</p>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <p class="text-sm text-gray-500">{{ $currentmonthexpense->category->category }}</p>
                                                <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($currentmonthexpense->date)->format('F d, Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex flex-col items-center justify-center h-[300px] text-gray-500">
                                        <svg class="w-12 h-12 mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                        <p class="text-sm">No activity for the moment</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>



    <script>
        const ctx = document.getElementById('incomeExpensesChart').getContext('2d');
        
        // Get the data passed from controller
        const dailyData = @json($dailyData);
        const monthlyIncome = {{ $monthlyIncome ?? 0 }};
        const daysInMonth = {{ $daysInMonth ?? 30 }};

        // Prepare data for the chart
        const dates = Array.from({length: daysInMonth}, (_, i) => i + 1);
        const balances = dailyData.map(item => item.balance);
        const dailyExpenses = dailyData.map(item => item.dailyExpense); // Using individual day expenses

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Balance',
                    data: balances,
                    borderColor: '#FF6F3C',
                    backgroundColor: 'rgba(255, 111, 60, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointHoverRadius: 5,
                    pointBackgroundColor: '#FF6F3C',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    yAxisID: 'y'
                },
                {
                    label: 'Daily Expenses',
                    data: dailyExpenses,
                    borderColor: '#94A3B8',
                    backgroundColor: 'rgba(148, 163, 184, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointHoverRadius: 5,
                    pointBackgroundColor: '#94A3B8',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    yAxisID: 'y1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                family: "'Inter', sans-serif",
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'white',
                        titleColor: '#1F2937',
                        bodyColor: '#1F2937',
                        padding: 12,
                        borderColor: '#E5E7EB',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                const label = context.dataset.label;
                                const value = context.raw;
                                return `${label}: $${value.toLocaleString()}`;
                            },
                            title: function(context) {
                                return `Day ${context[0].label}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        beginAtZero: false,
                        grid: {
                            drawBorder: false,
                            color: '#E5E7EB'
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            },
                            font: {
                                family: "'Inter', sans-serif",
                                size: 12
                            }
                        }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        beginAtZero: true,
                        grid: {
                            drawOnChartArea: false,
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            },
                            font: {
                                family: "'Inter', sans-serif",
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Day of Month'
                        },
                        ticks: {
                            autoSkip: false,
                            maxRotation: 0,
                            font: {
                                family: "'Inter', sans-serif",
                                size: 12
                            },
                            callback: function(value, index) {
                                // Show every 5th day for clarity
                                return index % 5 === 0 ? value : '';
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
    </script>


</body>

</html>