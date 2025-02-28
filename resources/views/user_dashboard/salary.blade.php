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

                <a href="/board" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#FF6F3C]/10 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>

                <div class="px-4 py-2 mt-6 text-xs text-gray-400 uppercase">Income</div>
                <a href="/income" class="flex items-center px-6 py-3 text-white bg-[#FF6F3C]/20 border-l-4 border-[#FF6F3C]">
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
                                <!-- Add Salary Button -->
                                <div class="bg-[#FF6F3C] rounded-lg shadow-sm p-4 text-white hover:bg-[#ff5a24] transition-colors cursor-pointer" onclick="openModal('salaryModal')">
                                    <div class="flex items-center justify-center space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        <span class="font-medium">Add New Salary</span>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <p class="text-sm text-gray-500 mb-1">Monthly Income</p>
                                    <h3 class="text-2xl font-bold text-gray-900">$4,250.00</h3>
                                    <div class="flex items-center mt-1">
                                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                        </svg>
                                        <span class="text-sm text-green-600 ml-1">+5.2% from last month</span>
                                    </div>
                                </div>

                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <p class="text-sm text-gray-500 mb-1">Year-to-Date Income</p>
                                    <h3 class="text-2xl font-bold text-gray-900">$21,250.00</h3>
                                </div>

                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <p class="text-sm text-gray-500 mb-1">Average Monthly</p>
                                    <h3 class="text-2xl font-bold text-gray-900">$4,150.00</h3>
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
                                <!-- Savings Goal 1 -->
                                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <h3 class="font-medium text-gray-900">Emergency Fund</h3>
                                            <p class="text-sm text-gray-500">3-6 months of expenses</p>
                                        </div>
                                        <span class="text-sm font-bold text-[#FF6F3C]">$10,000</span>
                                    </div>
                                    <div class="mt-2">
                                        <div class="flex justify-between items-center mb-1">
                                            <span class="text-xs font-medium text-gray-500">Progress</span>
                                            <span class="text-xs font-medium text-[#FF6F3C]">65%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-[#FF6F3C] h-2 rounded-full" style="width: 65%"></div>
                                        </div>
                                        <div class="flex justify-between mt-1">
                                            <p class="text-xs text-gray-500">$6,500 saved</p>
                                            <p class="text-xs text-gray-500">$3,500 to go</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Savings Goal 2 -->
                                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <h3 class="font-medium text-gray-900">Vacation Fund</h3>
                                            <p class="text-sm text-gray-500">Summer trip to Europe</p>
                                        </div>
                                        <span class="text-sm font-bold text-[#FF6F3C]">$3,000</span>
                                    </div>
                                    <div class="mt-2">
                                        <div class="flex justify-between items-center mb-1">
                                            <span class="text-xs font-medium text-gray-500">Progress</span>
                                            <span class="text-xs font-medium text-[#FF6F3C]">40%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-[#FF6F3C] h-2 rounded-full" style="width: 40%"></div>
                                        </div>
                                        <div class="flex justify-between mt-1">
                                            <p class="text-xs text-gray-500">$1,200 saved</p>
                                            <p class="text-xs text-gray-500">$1,800 to go</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Savings Goal 3 -->
                                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <h3 class="font-medium text-gray-900">New Car Down Payment</h3>
                                            <p class="text-sm text-gray-500">For a hybrid vehicle</p>
                                        </div>
                                        <span class="text-sm font-bold text-[#FF6F3C]">$5,000</span>
                                    </div>
                                    <div class="mt-2">
                                        <div class="flex justify-between items-center mb-1">
                                            <span class="text-xs font-medium text-gray-500">Progress</span>
                                            <span class="text-xs font-medium text-[#FF6F3C]">15%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-[#FF6F3C] h-2 rounded-full" style="width: 15%"></div>
                                        </div>
                                        <div class="flex justify-between mt-1">
                                            <p class="text-xs text-gray-500">$750 saved</p>
                                            <p class="text-xs text-gray-500">$4,250 to go</p>
                                        </div>
                                    </div>
                                </div>

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
                            <!-- Wishlist Item 1 -->
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden wishlist-card">
                                <div class="flex h-24">
                                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-14-pro-finish-select-202209-6-7inch-deeppurple?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1663703841896" alt="iPhone 14 Pro" class="w-24 h-full object-cover">
                                    <div class="p-4 flex-1 flex flex-col justify-between">
                                        <div>
                                            <div class="flex justify-between items-start">
                                                <h3 class="font-medium text-gray-900">iPhone 14 Pro</h3>
                                                <span class="text-sm font-bold text-[#FF6F3C]">$999</span>
                                            </div>
                                            <p class="text-sm text-gray-500 mt-1">Electronics</p>
                                        </div>
                                        <div class="flex justify-end">
                                            <button class="text-xs text-gray-500 hover:text-[#FF6F3C]">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Wishlist Item 2 -->
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden wishlist-card">
                                <div class="flex h-24">
                                    <img src="https://m.media-amazon.com/images/I/61bLefD79-L._AC_SL1500_.jpg" alt="Sony WH-1000XM4" class="w-24 h-full object-cover">
                                    <div class="p-4 flex-1 flex flex-col justify-between">
                                        <div>
                                            <div class="flex justify-between items-start">
                                                <h3 class="font-medium text-gray-900">Sony WH-1000XM4</h3>
                                                <span class="text-sm font-bold text-[#FF6F3C]">$349</span>
                                            </div>
                                            <p class="text-sm text-gray-500 mt-1">Electronics</p>
                                        </div>
                                        <div class="flex justify-end">
                                            <button class="text-xs text-gray-500 hover:text-[#FF6F3C]">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Wishlist Item 3 -->
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden wishlist-card">
                                <div class="flex h-24">
                                    <img src="https://m.media-amazon.com/images/I/71NBQ2a52CL._AC_SL1500_.jpg" alt="Nintendo Switch OLED" class="w-24 h-full object-cover">
                                    <div class="p-4 flex-1 flex flex-col justify-between">
                                        <div>
                                            <div class="flex justify-between items-start">
                                                <h3 class="font-medium text-gray-900">Nintendo Switch OLED</h3>
                                                <span class="text-sm font-bold text-[#FF6F3C]">$349</span>
                                            </div>
                                            <p class="text-sm text-gray-500 mt-1">Gaming</p>
                                        </div>
                                        <div class="flex justify-end">
                                            <button class="text-xs text-gray-500 hover:text-[#FF6F3C]">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Salary</h3>
                <form class="space-y-4">
                    <!-- Type -->
                    <div class="text-left">
                        <label for="salary-type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select id="salary-type" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm">
                            <option value="salary">Regular Salary</option>
                            <option value="bonus">Bonus</option>
                            <option value="overtime">Overtime</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Amount -->
                    <div class="text-left">
                        <label for="salary-amount" class="block text-sm font-medium text-gray-700">Amount</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" id="salary-amount" class="focus:ring-[#FF6F3C] focus:border-[#FF6F3C] block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2" placeholder="0.00" step="0.01">
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="text-left">
                        <label for="salary-date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" id="salary-date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm">
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-2 justify-end mt-5">
                        <button type="button"
                            class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400"
                            onclick="closeModal('salaryModal')">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-[#FF6F3C] text-white text-sm font-medium rounded-md hover:bg-[#ff5a24] focus:outline-none focus:ring-2 focus:ring-[#FF6F3C]">
                            Add Salary
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
                <form class="space-y-4">
                    <!-- Goal Name -->
                    <div class="text-left">
                        <label for="goal-name" class="block text-sm font-medium text-gray-700">Goal Name</label>
                        <input type="text" id="goal-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm" placeholder="e.g., Emergency Fund">
                    </div>

                    <!-- Target Amount -->
                    <div class="text-left">
                        <label for="goal-target" class="block text-sm font-medium text-gray-700">Target Amount</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" id="goal-target" class="focus:ring-[#FF6F3C] focus:border-[#FF6F3C] block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2" placeholder="0.00" step="0.01">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="text-left">
                        <label for="goal-description" class="block text-sm font-medium text-gray-700">Brief Description</label>
                        <textarea id="goal-description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm" placeholder="Describe your savings goal..."></textarea>
                    </div>

                    <!-- Buttons -->
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

    <!-- Add Wishlist Item Button and Modal -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50" id="wishlistModal">
        <!-- Wishlist Form Modal Content -->
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Wishlist Item</h3>
                <form class="space-y-4">
                    <!-- Item Name -->
                    <div class="text-left">
                        <label for="item-name" class="block text-sm font-medium text-gray-700">Item Name</label>
                        <input type="text" id="item-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm" placeholder="e.g., iPhone 14 Pro">
                    </div>

                    <!-- Category -->
                    <div class="text-left">
                        <label for="item-category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="item-category" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm">
                            <option value="electronics">Electronics</option>
                            <option value="clothing">Clothing</option>
                            <option value="home">Home</option>
                            <option value="gaming">Gaming</option>
                            <option value="travel">Travel</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Price -->
                    <div class="text-left">
                        <label for="item-price" class="block text-sm font-medium text-gray-700">Price</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" id="item-price" class="focus:ring-[#FF6F3C] focus:border-[#FF6F3C] block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2" placeholder="0.00" step="0.01">
                        </div>
                    </div>

                    <!-- Image URL -->
                    <div class="text-left">
                        <label for="item-image" class="block text-sm font-medium text-gray-700">Image URL</label>
                        <input type="url" id="item-image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm" placeholder="https://example.com/image.jpg">
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

    <!-- Add this script at the end of your body tag -->
    <script>
        // Functions to handle modal operations
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // Close modals when clicking outside
        document.addEventListener('DOMContentLoaded', function() {
            ['salaryModal', 'savingsGoalModal', 'wishlistModal'].forEach(modalId => {
                document.getElementById(modalId).addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeModal(modalId);
                    }
                });
            });

            // Set today's date as default for salary form
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('salary-date').value = today;
        });
    </script>
</body>

</html>