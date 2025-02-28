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
    <!-- Sidebar -->
    <aside class="w-64 bg-[#2E2E2E] text-white">
            <div class="p-6">
                <a href="/" class="inline-flex items-center space-x-2">
                    <svg class="w-8 h-8 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-xl font-bold">MoneyMind</span>
                </a>
            </div>

            <nav class="mt-6">
                <div class="px-4 py-2 text-xs text-gray-400 uppercase">Main</div>

                <a href="/board" class="flex items-center px-6 py-3 text-white bg-[#FF6F3C]/20 border-l-4 border-[#FF6F3C]">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>

                <div class="px-4 py-2 mt-6 text-xs text-gray-400 uppercase">Income</div>
                <a href="/income" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#FF6F3C]/10 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Income
                </a>

                <div class="px-4 py-2 mt-6 text-xs text-gray-400 uppercase">Outcome</div>
                <a href="/expenses" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#FF6F3C]/10 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Expenses
                </a>

                <div class="px-4 py-2 mt-6 text-xs text-gray-400 uppercase">Settings</div>
                <a href="/settings" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#FF6F3C]/10 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Settings
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-6 py-4">
                    <h1 class="text-2xl font-bold text-gray-900">Profile Settings</h1>
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
                    <div class="bg-white rounded-lg shadow-sm p-6 stat-card balance-card">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Current Balance</p>
                                <h3 class="text-2xl font-bold text-gray-900">$2,100.00</h3>
                                <div class="flex items-center mt-1">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                    <span class="text-sm text-green-600 ml-1">+8.1% from last month</span>
                                </div>
                            </div>
                            <div class="bg-green-50 p-3 rounded-full">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Income Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6 stat-card income-card">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Monthly Income</p>
                                <h3 class="text-2xl font-bold text-gray-900">$4,250.00</h3>
                                <div class="flex items-center mt-1">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                    <span class="text-sm text-blue-600 ml-1">+5.2% from last month</span>
                                </div>
                            </div>
                            <div class="bg-blue-50 p-3 rounded-full">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Expenses Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6 stat-card expense-card">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Monthly Expenses</p>
                                <h3 class="text-2xl font-bold text-gray-900">$2,150.00</h3>
                                <div class="flex items-center mt-1">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                    </svg>
                                    <span class="text-sm text-red-600 ml-1">+2.8% from last month</span>
                                </div>
                            </div>
                            <div class="bg-red-50 p-3 rounded-full">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Savings Goal Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6 stat-card savings-card">
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <p class="text-sm text-gray-500">Savings Goal</p>
                                <span class="text-xs font-medium text-purple-600">35%</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">$3,500 <span class="text-sm text-gray-500 font-normal">/ $10,000</span></h3>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                                <div class="bg-purple-600 h-2.5 rounded-full progress-bar" style="width: 35%"></div>
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
        // Income vs Expenses Chart - Past 30 Days
        const incomeExpensesCtx = document.getElementById('incomeExpensesChart').getContext('2d');

        // Generate last 30 days dates
        const generateDates = () => {
            const dates = [];
            const today = new Date();
            for (let i = 29; i >= 0; i--) {
                const date = new Date(today);
                date.setDate(today.getDate() - i);
                dates.push(date.getDate() + '/' + (date.getMonth() + 1));
            }
            return dates;
        };

        // Generate random data with a trend
        const generateData = (base, variance) => {
            const data = [];
            let value = base;
            for (let i = 0; i < 30; i++) {
                value += (Math.random() - 0.5) * variance;
                data.push(Math.round(value * 100) / 100);
            }
            return data;
        };

        const incomeExpensesChart = new Chart(incomeExpensesCtx, {
            type: 'line',
            data: {
                labels: generateDates(),
                datasets: [{
                        label: 'Income',
                        data: generateData(150, 30),
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Expenses',
                        data: generateData(80, 20),
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                        tension: 0.3,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            maxTicksLimit: 10,
                            maxRotation: 0
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                }
            }
        });
    </script>


</body>

</html>