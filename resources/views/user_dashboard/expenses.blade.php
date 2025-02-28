<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses Management | MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                <a href="/income" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#FF6F3C]/10 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Income
                </a>

                <div class="px-4 py-2 mt-6 text-xs text-gray-400 uppercase">Outcome</div>
                <a href="/expenses" class="flex items-center px-6 py-3 text-white bg-[#FF6F3C]/20 border-l-4 border-[#FF6F3C]">
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

            <!-- Expenses Dashboard Content -->
            <main class="p-6">
                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <!-- Total Monthly Expenses -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Monthly Expenses</p>
                                <h3 class="text-2xl font-bold text-gray-900">$2,540.00</h3>
                            </div>
                            <div class="p-3 bg-red-100 rounded-full">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4M12 20V4" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                                </svg>
                                <span class="text-sm text-red-600 ml-1">+8.4% from last month</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recurring Expenses -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Recurring Expenses</p>
                                <h3 class="text-2xl font-bold text-gray-900">$1,850.00</h3>
                            </div>
                            <div class="p-3 bg-blue-100 rounded-full">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </div>
                        </div>
                        <p class="mt-4 text-sm text-gray-500">73% of total expenses</p>
                    </div>

                    <!-- One-time Expenses -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">One-time Expenses</p>
                                <h3 class="text-2xl font-bold text-gray-900">$690.00</h3>
                            </div>
                            <div class="p-3 bg-purple-100 rounded-full">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="mt-4 text-sm text-gray-500">27% of total expenses</p>
                    </div>
                </div>

                <!-- Expenses Categories -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recurring Expenses Section -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Recurring Expenses
                            </h2>
                            <!-- Add Recurring Expense Button -->
                            <button onclick="openModal('recurringExpenseModal')" class="bg-[#FF6F3C] text-white px-4 py-2 rounded-lg hover:bg-[#ff5a24] transition-colors flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                <span>Add Recurring</span>
                            </button>
                        </div>

                        <!-- Recurring Expenses List -->
                        <div class="space-y-4">
                            <!-- Rent Expense -->
                            <div class="expense-card bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="p-2 bg-blue-100 rounded-full">
                                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-900">Rent</h3>
                                            <p class="text-sm text-gray-500">Monthly payment</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-gray-900">$1,200.00</p>
                                        <p class="text-sm text-gray-500">Due on 1st</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Utilities Expense -->
                            <div class="expense-card bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="p-2 bg-yellow-100 rounded-full">
                                            <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-900">Utilities</h3>
                                            <p class="text-sm text-gray-500">Monthly bills</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-gray-900">$250.00</p>
                                        <p class="text-sm text-gray-500">Due on 15th</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Internet Expense -->
                            <div class="expense-card bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="p-2 bg-green-100 rounded-full">
                                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.14 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-900">Internet</h3>
                                            <p class="text-sm text-gray-500">Monthly service</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-gray-900">$80.00</p>
                                        <p class="text-sm text-gray-500">Due on 5th</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- One-time Expenses Section -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                One-time Expenses
                            </h2>
                            <!-- Add One-time Expense Button -->
                            <button onclick="openModal('onetimeExpenseModal')" class="bg-[#FF6F3C] text-white px-4 py-2 rounded-lg hover:bg-[#ff5a24] transition-colors flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                <span>Add One-time</span>
                            </button>
                        </div>

                        <!-- One-time Expenses List -->
                        <div class="space-y-4">
                            <!-- Shopping Expense -->
                            <div class="expense-card bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="p-2 bg-pink-100 rounded-full">
                                            <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-900">Shopping</h3>
                                            <p class="text-sm text-gray-500">Clothing</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-gray-900">$320.00</p>
                                        <p class="text-sm text-gray-500">March 15, 2024</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Electronics Expense -->
                            <div class="expense-card bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="p-2 bg-indigo-100 rounded-full">
                                            <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-900">Electronics</h3>
                                            <p class="text-sm text-gray-500">New monitor</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-gray-900">$370.00</p>
                                        <p class="text-sm text-gray-500">March 10, 2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Recurring Expense Modal -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50" id="recurringExpenseModal">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add Recurring Expense</h3>
                <form class="space-y-4">
                    <!-- Expense Name -->
                    <div class="text-left">
                        <label for="recurring-expense-name" class="block text-sm font-medium text-gray-700">Expense Name</label>
                        <input type="text" id="recurring-expense-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm" placeholder="e.g., Rent">
                    </div>

                    <!-- Category -->
                    <div class="text-left">
                        <label for="recurring-expense-category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="recurring-expense-category" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm">
                            <option value="housing">Housing</option>
                            <option value="utilities">Utilities</option>
                            <option value="transportation">Transportation</option>
                            <option value="insurance">Insurance</option>
                            <option value="subscriptions">Subscriptions</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Amount -->
                    <div class="text-left">
                        <label for="recurring-expense-amount" class="block text-sm font-medium text-gray-700">Amount</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" id="recurring-expense-amount" class="focus:ring-[#FF6F3C] focus:border-[#FF6F3C] block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2" placeholder="0.00" step="0.01">
                        </div>
                    </div>

                    <!-- Due Date -->
                    <div class="text-left">
                        <label for="recurring-expense-due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                        <input type="number" id="recurring-expense-due-date" min="1" max="31" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm" placeholder="Day of month (1-31)">
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-2 justify-end mt-5">
                        <button type="button" 
                                class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400"
                                onclick="closeModal('recurringExpenseModal')">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-[#FF6F3C] text-white text-sm font-medium rounded-md hover:bg-[#ff5a24] focus:outline-none focus:ring-2 focus:ring-[#FF6F3C]">
                            Add Expense
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add One-time Expense Modal -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50" id="onetimeExpenseModal">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add One-time Expense</h3>
                <form class="space-y-4">
                    <!-- Expense Name -->
                    <div class="text-left">
                        <label for="onetime-expense-name" class="block text-sm font-medium text-gray-700">Expense Name</label>
                        <input type="text" id="onetime-expense-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm" placeholder="e.g., Shopping">
                    </div>

                    <!-- Category -->
                    <div class="text-left">
                        <label for="onetime-expense-category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="onetime-expense-category" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm">
                            <option value="shopping">Shopping</option>
                            <option value="entertainment">Entertainment</option>
                            <option value="healthcare">Healthcare</option>
                            <option value="travel">Travel</option>
                            <option value="electronics">Electronics</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Amount -->
                    <div class="text-left">
                        <label for="onetime-expense-amount" class="block text-sm font-medium text-gray-700">Amount</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" id="onetime-expense-amount" class="focus:ring-[#FF6F3C] focus:border-[#FF6F3C] block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2" placeholder="0.00" step="0.01">
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="text-left">
                        <label for="onetime-expense-date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" id="onetime-expense-date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#FF6F3C] focus:border-[#FF6F3C] sm:text-sm">
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-2 justify-end mt-5">
                        <button type="button" 
                                class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400"
                                onclick="closeModal('onetimeExpenseModal')">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-[#FF6F3C] text-white text-sm font-medium rounded-md hover:bg-[#ff5a24] focus:outline-none focus:ring-2 focus:ring-[#FF6F3C]">
                            Add Expense
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
            ['recurringExpenseModal', 'onetimeExpenseModal'].forEach(modalId => {
                document.getElementById(modalId).addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeModal(modalId);
                    }
                });
            });

            // Set today's date as default for one-time expense form
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('onetime-expense-date').value = today;
        });
    </script>
</body>
</html>
