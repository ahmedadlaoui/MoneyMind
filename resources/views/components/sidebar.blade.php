@props(['active'])

<aside class="w-64 bg-white border-r border-gray-200 h-screen flex flex-col">
    <!-- Logo Section -->
    <div class="p-6">
        <a href="/" class="flex items-center gap-3">
            <div class="p-2 bg-gray-50 rounded-lg">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <span class="text-lg font-semibold text-gray-900">MoneyMind</span>
                <p class="text-xs text-gray-500">Financial Dashboard</p>
            </div>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 space-y-2 overflow-y-auto">
        <!-- Overview Section -->
        <div class="py-4">
            <span class="px-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Overview</span>
            <div class="mt-3 space-y-1">
                <a href="/board"
                    class="group flex items-center px-3 py-2.5 rounded-lg text-sm font-medium {{ $active === 'dashboard' ? 'bg-gray-50 text-gray-900 border border-gray-200' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition duration-200">
                    <svg class="{{ $active === 'dashboard' ? 'text-gray-700' : 'text-gray-400 group-hover:text-gray-700' }} w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>
            </div>
        </div>

        <!-- Financial Management -->
        <div class="py-4">
            <span class="px-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Financial Management</span>
            <div class="mt-3 space-y-1">
                <a href="/income"
                    class="group flex items-center px-3 py-2.5 rounded-lg text-sm font-medium {{ $active === 'income' ? 'bg-gray-50 text-gray-900 border border-gray-200' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition duration-200">
                    <svg class="{{ $active === 'income' ? 'text-gray-700' : 'text-gray-400 group-hover:text-gray-700' }} w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Income
                </a>

                <a href="/expenses"
                    class="group flex items-center px-3 py-2.5 rounded-lg text-sm font-medium {{ $active === 'expenses' ? 'bg-gray-50 text-gray-900 border border-gray-200' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition duration-200">
                    <svg class="{{ $active === 'expenses' ? 'text-gray-700' : 'text-gray-400 group-hover:text-gray-700' }} w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Expenses
                </a>
            </div>
        </div>

        <!-- Account Settings -->
        <div class="py-4">
            <span class="px-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Account</span>
            <div class="mt-3 space-y-1">
                <a href="/settings"
                    class="group flex items-center px-3 py-2.5 rounded-lg text-sm font-medium {{ $active === 'settings' ? 'bg-gray-50 text-gray-900 border border-gray-200' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition duration-200">
                    <svg class="{{ $active === 'settings' ? 'text-gray-700' : 'text-gray-400 group-hover:text-gray-700' }} w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Settings
                </a>
            </div>
        </div>
    </nav>



    <!-- Logout Button -->
    <div class="p-4 border-t border-gray-200">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center w-full px-4 py-2 text-gray-700 rounded-lg hover:bg-red-50 hover:text-red-600 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="ml-3">Logout</span>
            </button>
        </form>
    </div>
</aside>