<x-app-layout>
    <div class="flex h-screen bg-gray-50">
        @include('components.sidebar', ['active' => 'settings'])

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            @include('components.header')

            <!-- Profile Content -->
            <div class="max-w-7xl mx-auto p-8">
                <!-- Profile Header -->
                <div class="mb-8 bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-8 flex items-center space-x-8">
                        <div class="relative group">
                            <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-100">
                                <img class="w-full h-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=7C3AED&background=EDE9FE' }}"
                                    alt="{{ Auth::user()->name }}" />
                            </div>
                            <div class="absolute inset-0 bg-black/60 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center cursor-pointer">
                                <label for="profile_photo" class="text-white text-sm font-medium">
                                    <svg class="w-5 h-5 mb-1 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-xs">Edit</span>
                                </label>
                                <input type="file" id="profile_photo" name="profile_photo" class="hidden" accept="image/*" />
                            </div>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 mb-1">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-500 mb-3">{{ Auth::user()->email }}</p>
                            <span class="px-3 py-1 text-xs font-medium text-gray-600 bg-gray-100 rounded-full">
                                Member since {{ Auth::user()->created_at->format('M Y') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Settings Grid -->
                <div class="grid grid-cols-3 gap-8">
                    <!-- Main Settings Column -->
                    <div class="col-span-2 space-y-8">
                        <!-- Profile Information -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                            <div class="p-6">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <!-- Delete Account -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                            <div class="p-6">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>

                    <!-- Side Column -->
                    <div class="col-span-1">
                        <!-- Security Settings -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                            <div class="p-6">
                                @include('profile.partials.update-password-form')
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