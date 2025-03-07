<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- Form Header -->
        <div class="flex items-center space-x-3 mb-6 pb-6 border-b border-gray-100">
            <div class="p-2 bg-[#FF6F3C]/10 rounded-lg">
                <svg class="w-6 h-6 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Profile Information</h3>
                <p class="text-sm text-gray-500">Update your account's profile information and email address.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name Input -->
            <div class="space-y-2">
                <x-input-label for="name" :value="__('Full Name')" class="text-gray-700 font-medium" />
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#FF6F3C] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <x-text-input id="name" name="name" type="text" class="pl-10 block w-full rounded-lg border-gray-300 bg-gray-50 focus:border-[#FF6F3C] focus:ring focus:ring-[#FF6F3C] focus:ring-opacity-50 transition-all" :value="old('name', $user->name)" required autofocus autocomplete="name" placeholder="Enter your full name" />
                </div>
                <x-input-error class="mt-1" :messages="$errors->get('name')" />
            </div>

            <!-- Email Input -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 font-medium" />
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#FF6F3C] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <x-text-input id="email" name="email" type="email" class="pl-10 block w-full rounded-lg border-gray-300 bg-gray-50 focus:border-[#FF6F3C] focus:ring focus:ring-[#FF6F3C] focus:ring-opacity-50 transition-all" :value="old('email', $user->email)" required autocomplete="username" placeholder="Enter your email address" />
                </div>
                <x-input-error class="mt-1" :messages="$errors->get('email')" />
            </div>
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div class="mt-6 p-4 bg-[#FF6F3C]/5 rounded-lg border border-[#FF6F3C]/10">
            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <div>
                    <p class="text-sm text-gray-700">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="text-[#FF6F3C] hover:text-[#ff5a24] underline font-medium">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm text-[#FF6F3C] font-medium">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                    @endif
                </div>
            </div>
        </div>
        @endif

        <div class="flex items-center justify-end gap-3 mt-6 pt-6 border-t border-gray-100">
            @if (session('status') === 'profile-updated')
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="flex items-center text-sm text-green-600 space-x-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ __('Saved') }}</span>
            </div>
            @endif
            <button type="reset" class="px-3 py-1.5 text-sm bg-gray-50 text-gray-700 hover:bg-gray-100 border border-gray-300 rounded-md">
                {{ __('Cancel') }}
            </button>
            <button type="submit" class="flex items-center px-3 py-1.5 text-sm bg-[#FF6F3C] text-white rounded-md hover:bg-[#ff5a24] focus:ring-2 focus:ring-[#FF6F3C] focus:ring-offset-2 transition-colors duration-200">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                {{ __('Save Changes') }}
            </button>
        </div>
    </form>
</section>