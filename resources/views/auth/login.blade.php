<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#f2f2f2] p-4">
        <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8">
            <!-- Logo -->
            <div class="text-center mb-8">
                <a href="/" class="inline-flex items-center space-x-2">
                    <svg class="w-8 h-8 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-2xl font-bold text-gray-800">MoneyMind</span>
                </a>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Welcome back</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />


            <!-- Divider -->
            <div class="flex items-center gap-4 mb-6">
                <div class="h-px bg-gray-200 flex-1"></div>
                <span class="text-gray-500 text-sm">or login with email</span>
                <div class="h-px bg-gray-200 flex-1"></div>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#FF6F3C] focus:ring-[#FF6F3C] text-gray-700" 
                           required 
                           autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" 
                           id="password" 
                           name="password"
                           class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#FF6F3C] focus:ring-[#FF6F3C] text-gray-700" 
                           required>
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               name="remember" 
                               class="rounded border-gray-300 text-[#FF6F3C] focus:ring-[#FF6F3C]">
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-[#FF6F3C] hover:text-[#ff5a24] font-medium" 
                           href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-[#FF6F3C] text-white font-semibold rounded-lg px-4 py-3 hover:bg-[#ff5a24] transition-colors">
                    Sign in
                </button>

                <!-- Register Link -->
                <p class="text-center text-gray-600 text-sm">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-[#FF6F3C] hover:text-[#ff5a24] font-medium">
                        Create account
                    </a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
