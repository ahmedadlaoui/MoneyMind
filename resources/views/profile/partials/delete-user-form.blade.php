<section>
    <!-- Delete Account Card -->
    <div class="bg-red-50/50 rounded-lg border border-red-100">
        <!-- Header -->
        <div class="p-6 border-b border-red-100">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-red-100 rounded-lg">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Delete Account</h3>
                    <p class="text-sm text-gray-600">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                </div>
            </div>
        </div>

        <!-- Action -->
        <div class="p-6 bg-red-50/30">
            <div class="flex items-center justify-between">
                <div class="max-w-xl text-sm text-gray-600">
                    <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                </div>
                <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    class="bg-red-600 hover:bg-red-700 focus:ring-red-500">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <div class="mb-6">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-red-50">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-center text-gray-900 mb-2">
                    {{ __('Are you absolutely sure?') }}
                </h2>
                <p class="text-sm text-center text-gray-600 mb-6">
                    {{ __('This action cannot be undone. This will permanently delete your account and remove your data from our servers.') }}
                </p>

                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input id="password" name="password" type="password"
                        class="pl-10 block w-full rounded-lg border-red-300 bg-red-50 focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50"
                        placeholder="{{ __('Enter your password to confirm') }}" />
                </div>
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end space-x-3">
                <x-secondary-button x-on:click="$dispatch('close')"
                    class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-gray-200">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="px-6 bg-red-600 hover:bg-red-700 focus:ring-red-500">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
