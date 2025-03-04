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


            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Current Balance Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Current Balance</p>
                                <h3 class="text-2xl font-bold text-gray-900">$2,100.00</h3>
                                <div class="flex items-center mt-1">
                                    <svg class="w-4 h-4 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                    <span class="text-sm text-[#FF6F3C] ml-1">+8.1% from last month</span>
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
                                <h3 class="text-2xl font-bold text-gray-900">$4,250.00</h3>
                                <div class="flex items-center mt-1">
                                    <svg class="w-4 h-4 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                    <span class="text-sm text-[#FF6F3C] ml-1">+5.2% from last month</span>
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
                                <h3 class="text-2xl font-bold text-gray-900">$2,150.00</h3>
                                <div class="flex items-center mt-1">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                    </svg>
                                    <span class="text-sm text-gray-500 ml-1">+2.8% from last month</span>
                                </div>
                            </div>
                            <div class="bg-gray-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Savings Goal Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <p class="text-sm text-gray-500">Savings Goal</p>
                                <span class="text-xs font-medium text-[#FF6F3C]">35%</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">$3,500 <span class="text-sm text-gray-500 font-normal">/ $10,000</span></h3>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 mt-2">
                                <div class="bg-[#FF6F3C] h-2.5 rounded-full progress-bar" style="width: 35%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">Vacation Fund</p>
                        </div>
                    </div>
                </div>

                <!-- Financial Overview Section -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                    <!-- Income vs Expenses Chart (2/3 width) -->
                    <div class="bg-white rounded-lg shadow-sm p-6 lg:col-span-2">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg font-bold text-gray-900">Income vs Expenses</h2>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-gray-100 rounded-md text-gray-600 hover:bg-gray-200">Monthly</button>
                                <button class="px-3 py-1 text-sm bg-white rounded-md text-gray-600 border border-gray-200 hover:bg-gray-50">Quarterly</button>
                                <button class="px-3 py-1 text-sm bg-white rounded-md text-gray-600 border border-gray-200 hover:bg-gray-50">Yearly</button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="incomeExpensesChart"></canvas>
                        </div>
                    </div>

                    <!-- Latest Payments (1/3 width) -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Latest Payments
                            </h2>
                            <a href="#" class="text-sm font-medium text-[#FF6F3C] hover:text-[#ff5a24]">View All</a>
                        </div>

                        <div class="space-y-4">
                            <!-- Payment Item 1 -->
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="font-medium text-gray-900">Rent</h3>
                                    <p class="text-lg font-medium text-gray-900">$1,200.00</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="text-sm text-gray-500">Housing</p>
                                    <p class="text-xs text-gray-500">May 1, 2023</p>
                                </div>
                            </div>

                            <!-- Payment Item 2 -->
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="font-medium text-gray-900">Electric Bill</h3>
                                    <p class="text-lg font-medium text-gray-900">$124.50</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="text-sm text-gray-500">Utilities</p>
                                    <p class="text-xs text-gray-500">May 10, 2023</p>
                                </div>
                            </div>

                            <!-- Payment Item 3 -->
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="font-medium text-gray-900">Netflix</h3>
                                    <p class="text-lg font-medium text-gray-900">$14.99</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="text-sm text-gray-500">Entertainment</p>
                                    <p class="text-xs text-gray-500">May 15, 2023</p>
                                </div>
                            </div>

                            <!-- Payment Item 4 -->
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="font-medium text-gray-900">Grocery Shopping</h3>
                                    <p class="text-lg font-medium text-gray-900">$85.75</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="text-sm text-gray-500">Food</p>
                                    <p class="text-xs text-gray-500">May 12, 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>



    <script>
        const ctx = document.getElementById('incomeExpensesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Income',
                    data: [4200, 4500, 4100, 4800, 4250, 4600],
                    borderColor: '#FF6F3C',
                    backgroundColor: 'rgba(255, 111, 60, 0.1)',
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Expenses',
                    data: [2100, 2300, 2000, 2400, 2150, 2250],
                    borderColor: '#94A3B8',
                    backgroundColor: 'rgba(148, 163, 184, 0.1)',
                    fill: true,
                    tension: 0.4
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
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            drawBorder: false,
                        },
                        ticks: {
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
                        ticks: {
                            font: {
                                family: "'Inter', sans-serif",
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>


</body>

</html>