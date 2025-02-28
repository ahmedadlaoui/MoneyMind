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
                <a href="/expenses" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#FF6F3C]/10 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Expenses
                </a>

                <div class="px-4 py-2 mt-6 text-xs text-gray-400 uppercase">Settings</div>
                <a href="/settings" class="flex items-center px-6 py-3 text-white bg-[#FF6F3C]/20 border-l-4 border-[#FF6F3C]">
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
            <!-- Profile Content -->
            <div class="p-8">
                <!-- Profile Header -->
                <div class="mb-8 bg-gradient-to-r from-[#2E2E2E] to-[#1a1a1a] rounded-xl shadow-lg p-8">
                    <div class="flex items-center space-x-8">
                        <div class="relative group">
                            <div class="w-36 h-36 rounded-full overflow-hidden border-4 border-[#FF6F3C] shadow-xl">
                                <img class="w-full h-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=7C3AED&background=EDE9FE' }}"
                                    alt="{{ Auth::user()->name }}" />
                            </div>
                            <div class="absolute inset-0 bg-black/60 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center cursor-pointer">
                                <label for="profile_photo" class="text-white text-sm font-medium">
                                    <svg class="w-8 h-8 mb-2 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="block text-center">Change Photo</span>
                                </label>
                                <input type="file" id="profile_photo" name="profile_photo" class="hidden" accept="image/*" />
                            </div>
                        </div>
                        <div class="text-white">
                            <h2 class="text-3xl font-bold mb-1">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-300 mb-4">{{ Auth::user()->email }}</p>
                            <div class="flex items-center space-x-4">

                                <span class="text-sm text-gray-300">Member since {{ Auth::user()->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Sections Grid -->
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                    <!-- Left Column (2 cols wide) -->
                    <div class="xl:col-span-2 space-y-8">
                        <!-- Profile Information -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl">
                            <div class="p-8">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <!-- Delete Account -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl">
                            <div class="p-8">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-8">
                        <!-- Update Password -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl">
                            <div class="p-8">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <!-- Account Activity -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl">
                            <div class="p-8">
                                <div class="flex items-center space-x-3 mb-6">
                                    <div class="p-2 bg-[#FF6F3C]/10 rounded-lg">
                                        <svg class="w-6 h-6 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 mr-3 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">Last login</p>
                                            <p class="text-sm text-gray-500">{{ Auth::user()->last_login_at ?? 'Never' }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 mr-3 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                        </svg>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">Password updated</p>
                                            <p class="text-sm text-gray-500">2 months ago</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('profile_photo').addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.profile-photo').src = e.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>
</x-app-layout>