<x-app-layout>
    <div class="flex h-screen bg-gray-100">
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

            <nav class="mt-6 space-y-1 px-4">
                <div class="px-4 py-2 text-xs text-gray-400 uppercase">Main</div>

                <a href="admin" class="flex items-center px-4 py-3 text-white bg-[#FF6F3C]/20 rounded-lg border-l-4 border-[#FF6F3C]">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Overview
                </a>

                <a href="category" class="flex items-center px-4 py-3 text-gray-300 hover:bg-[#FF6F3C]/10 hover:text-white rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Categories
                </a>

                <div class="px-4 py-2 mt-6 text-xs text-gray-400 uppercase">Settings</div>

                <a href="" class="flex items-center px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl transition-all duration-200 mx-4 group">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="font-medium">Log out</span>
                    </div>
                    <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
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
            <div class="p-8">
                <!-- Welcome Section -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Welcome back, Admin! 👋</h1>
                    <p class="text-gray-600 mt-2">Here's what's happening with your platform today.</p>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Users Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6 stat-card balance-card">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Users</p>
                                <h3 class="text-2xl font-bold text-gray-900">24,521</h3>
                                <div class="flex items-center mt-1">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                    <span class="text-sm text-green-600 ml-1">+12.5% this month</span>
                                </div>
                            </div>
                            <div class="bg-green-50 p-3 rounded-full">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Active Users Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6 stat-card income-card">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Active Users</p>
                                <h3 class="text-2xl font-bold text-gray-900">18,472</h3>
                                <div class="flex items-center mt-1">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                    <span class="text-sm text-blue-600 ml-1">+8.2% this month</span>
                                </div>
                            </div>
                            <div class="bg-blue-50 p-3 rounded-full">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Premium Users Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6 stat-card expense-card">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Premium Users</p>
                                <h3 class="text-2xl font-bold text-gray-900">7,842</h3>
                                <div class="flex items-center mt-1">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                    <span class="text-sm text-red-600 ml-1">+15.3% this month</span>
                                </div>
                            </div>
                            <div class="bg-red-50 p-3 rounded-full">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6 stat-card savings-card">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Revenue</p>
                                <h3 class="text-2xl font-bold text-gray-900">$542,897</h3>
                                <div class="flex items-center mt-1">
                                    <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                    <span class="text-sm text-purple-600 ml-1">+22.4% this month</span>
                                </div>
                            </div>
                            <div class="bg-purple-50 p-3 rounded-full">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inactive Users Table -->
                <div class="bg-white rounded-2xl shadow-sm">
                    <div class="p-8 border-b border-gray-100">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-red-100 rounded-xl">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Inactive Users</h3>
                                <p class="text-sm text-gray-500 mt-1">Users who haven't logged in for 30 days or more</p>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                    <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Active</th>
                                    <th class="px-8 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                    <td class="px-8 py-4">
                                        <div class="flex items-center">
                                            <img class="h-10 w-10 rounded-xl object-cover"
                                                src="https://ui-avatars.com/api/?name=John+Doe&background=FF6F3C&color=fff"
                                                alt="">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">John Doe</div>
                                                <div class="text-sm text-gray-500">john@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-4">
                                        <div class="text-sm text-gray-900">2 months ago</div>
                                        <div class="text-sm text-gray-500">Dec 15, 2023</div>
                                    </td>
                                    <td class="px-8 py-4 text-right">
                                        <button class="p-2 hover:bg-red-50 rounded-xl transition-colors duration-200">
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-8 py-4 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">97</span> results
                            </p>
                            <div class="flex space-x-2">
                                <button class="px-4 py-2 border border-gray-200 rounded-xl text-sm font-medium text-gray-600 bg-white hover:bg-gray-50 transition-colors duration-200">
                                    Previous
                                </button>
                                <button class="px-4 py-2 border border-gray-200 rounded-xl text-sm font-medium text-gray-600 bg-white hover:bg-gray-50 transition-colors duration-200">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>