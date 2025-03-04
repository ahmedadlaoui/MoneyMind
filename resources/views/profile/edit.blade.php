<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        @include('components.sidebar', ['active' => 'settings'])

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
            <!-- Profile Content -->
            <div class="p-8">
                <!-- Profile Header -->
                <div class="mb-8 bg-gradient-to-r from-white to-orange-50 rounded-xl shadow-sm border border-orange-100">
                    <div class="p-8 flex items-center space-x-8">
                        <div class="relative group">
                            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-[#FF6F3C] shadow-lg">
                                <img class="w-full h-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=7C3AED&background=EDE9FE' }}"
                                    alt="{{ Auth::user()->name }}" />
                            </div>
                            <div class="absolute inset-0 bg-black/60 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center cursor-pointer">
                                <label for="profile_photo" class="text-white text-sm font-medium">
                                    <svg class="w-6 h-6 mb-1 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="block text-center text-xs">Change Photo</span>
                                </label>
                                <input type="file" id="profile_photo" name="profile_photo" class="hidden" accept="image/*" />
                            </div>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-1">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-500 mb-3">{{ Auth::user()->email }}</p>
                            <div class="flex items-center space-x-4">
                                <span class="px-3 py-1 text-sm text-[#FF6F3C] bg-[#FF6F3C]/10 rounded-full">
                                    Member since {{ Auth::user()->created_at->format('M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Sections Grid -->
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                    <!-- Left Column (2 cols wide) -->
                    <div class="xl:col-span-2 space-y-6">
                        <!-- Profile Information -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="p-6">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Update Password -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100">

                            <div class="p-6">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                    
                    </div>
                        <!-- Delete Account -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="p-6">
                                @include('profile.partials.delete-user-form')
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