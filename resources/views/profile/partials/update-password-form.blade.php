<section>
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Form Header -->
        <div class="flex items-center space-x-3 mb-6 pb-6 border-b border-gray-100">
            <div class="p-2 bg-[#FF6F3C]/10 rounded-lg">
                <svg class="w-6 h-6 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Security Settings</h3>
                <p class="text-sm text-gray-500">Ensure your account is using a strong password for security.</p>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Current Password -->
            <div class="space-y-2">
                <x-input-label for="current_password" :value="__('Current Password')" class="text-gray-700 font-medium" />
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#FF6F3C] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input id="current_password" name="current_password" type="password"
                        class="pl-10 block w-full rounded-lg border-gray-300 bg-gray-50 focus:border-[#FF6F3C] focus:ring focus:ring-[#FF6F3C] focus:ring-opacity-50 transition-all"
                        placeholder="Enter your current password" />
                </div>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- New Password -->
                <div class="space-y-2">
                    <x-input-label for="password" :value="__('New Password')" class="text-gray-700 font-medium" />
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#FF6F3C] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <x-text-input id="password" name="password" type="password"
                            class="pl-10 block w-full rounded-lg border-gray-300 bg-gray-50 focus:border-[#FF6F3C] focus:ring focus:ring-[#FF6F3C] focus:ring-opacity-50 transition-all"
                            placeholder="Enter your new password" />
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#FF6F3C] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                            class="pl-10 block w-full rounded-lg border-gray-300 bg-gray-50 focus:border-[#FF6F3C] focus:ring focus:ring-[#FF6F3C] focus:ring-opacity-50 transition-all"
                            placeholder="Confirm your new password" />
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 mt-6 pt-6 border-t border-gray-100">
            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="flex items-center text-sm text-green-600 space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ __('Password updated successfully') }}</span>
                </div>
            @endif
            <x-secondary-button type="reset" class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-gray-200">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-primary-button class="bg-[#FF6F3C] hover:bg-[#ff5a24] focus:ring-[#FF6F3C] px-6">
                {{ __('Update Password') }}
            </x-primary-button>
        </div>
    </form>
</section>
