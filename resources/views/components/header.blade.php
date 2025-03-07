<header class="bg-white shadow-sm">
    <div class="flex justify-end items-center px-6 py-4">
        <div class="flex items-center space-x-4">
            <!-- Notifications Dropdown -->
            <div class="relative">
                <button onclick="toggleNotifications()" class="p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none relative">
                    <span class="absolute -top-1 -right-1 h-4 w-4 bg-red-500 rounded-full flex items-center justify-center">
                        <span class="text-xs text-white">3</span>
                    </span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

                <!-- Notifications Panel -->
                <div id="notificationsPanel" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Notifications</h3>
                    </div>
                    
                    <div class="max-h-[400px] overflow-y-auto">
                        <!-- Unread Notifications -->
                        <div class="p-2 bg-gray-50">
                            <p class="text-xs font-medium text-gray-500 px-2">NEW</p>
                        </div>
                        <div class="p-4 hover:bg-gray-50 cursor-pointer border-b border-gray-100 bg-blue-50">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 pt-1">
                                    <span class="bg-blue-100 rounded-full p-1">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="ml-3 w-0 flex-1">
                                    <p class="text-sm font-medium text-gray-900">Monthly budget reminder</p>
                                    <p class="mt-1 text-sm text-gray-500">You've used 80% of your monthly budget.</p>
                                    <p class="mt-1 text-xs text-gray-400">5 minutes ago</p>
                                </div>
                            </div>
                        </div>

                        <!-- Read Notifications -->
                        <div class="p-2 bg-gray-50">
                            <p class="text-xs font-medium text-gray-500 px-2">EARLIER</p>
                        </div>
                        <div class="p-4 hover:bg-gray-50 cursor-pointer border-b border-gray-100">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 pt-1">
                                    <span class="bg-green-100 rounded-full p-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="ml-3 w-0 flex-1">
                                    <p class="text-sm font-medium text-gray-900">Savings goal achieved!</p>
                                    <p class="mt-1 text-sm text-gray-500">You've reached your emergency fund goal.</p>
                                    <p class="mt-1 text-xs text-gray-400">2 days ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 hover:bg-gray-50 cursor-pointer">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 pt-1">
                                    <span class="bg-yellow-100 rounded-full p-1">
                                        <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="ml-3 w-0 flex-1">
                                    <p class="text-sm font-medium text-gray-900">Large expense detected</p>
                                    <p class="mt-1 text-sm text-gray-500">Unusual spending pattern detected in your account.</p>
                                    <p class="mt-1 text-xs text-gray-400">5 days ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border-t border-gray-200">
                        <a href="#" class="text-sm font-medium text-[#FF6F3C] hover:text-[#ff5a24] flex justify-center">
                            View all notifications
                        </a>
                    </div>
                </div>
            </div>

            <!-- User Profile -->
            <div class="relative">
                <button class="flex items-center space-x-2 focus:outline-none">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=7C3AED&background=EDE9FE' }}" alt="User avatar">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                </button>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function toggleNotifications() {
            const panel = document.getElementById('notificationsPanel');
            panel.classList.toggle('hidden');
        }

        // Make toggleNotifications available globally
        window.toggleNotifications = toggleNotifications;

        // Close notifications panel when clicking outside
        document.addEventListener('click', function(event) {
            const panel = document.getElementById('notificationsPanel');
            const button = event.target.closest('button');
            
            if (!panel.classList.contains('hidden') && !panel.contains(event.target) && !button?.contains(event.target)) {
                panel.classList.add('hidden');
            }
        });
    });
</script>