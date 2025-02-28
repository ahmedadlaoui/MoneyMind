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

                <a href="admin" class="flex items-center px-4 py-3 text-gray-300 hover:bg-[#FF6F3C]/10 hover:text-white rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Overview
                </a>

                <a href="category" class="flex items-center px-4 py-3 text-white bg-[#FF6F3C]/20 rounded-lg border-l-4 border-[#FF6F3C]">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    Categories
                </a>

                <div class="px-4 py-2 mt-6 text-xs text-gray-400 uppercase">Settings</div>

                <a href="/logout" class="flex items-center px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl transition-all duration-200 mx-4 group">
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
                    <h1 class="text-2xl font-bold text-gray-900">Categories Management</h1>
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
                <!-- Categories Header -->
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Categories</h2>
                        <p class="text-gray-600 mt-2">Manage your transaction categories here.</p>
                    </div>
                    <button onclick="openAddModal()"
                        class="inline-flex items-center px-4 py-2 bg-[#FF6F3C] text-white rounded-xl hover:bg-[#FF6F3C]/90 transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add New Category
                    </button>
                </div>

                <!-- Categories Table -->
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50/50">
                                    <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                        Category Name & Description
                                    </th>
                                    <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                        Created At
                                    </th>
                                    <th class="px-8 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($Allcategories as $category)
                                <tr class="hover:bg-orange-50/50 transition-colors duration-200">
                                    <input type="hidden" value="{{ $category->id }}" name="idtoupdate">
                                    <td class="px-8 py-4">
                                        <div>
                                            <div class="text-sm font-semibold text-gray-900">{{ $category->category }}</div>
                                            <div class="text-sm text-gray-500">{{ $category->description }}</div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-4">
                                        <div class="text-sm text-gray-900">{{ $category->created_at->format('M d, Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $category->created_at->format('h:i A') }}</div>
                                    </td>
                                    <td class="px-8 py-4">
                                        <div class="flex items-center justify-end space-x-2">
                                            <button onclick="openEditModal('{{ $category->id }}', '{{ $category->category }}', '{{ $category->description }}')"
                                                class="p-2 text-gray-400 hover:text-[#FF6F3C] rounded-lg hover:bg-[#FF6F3C]/10 transition-colors duration-200"
                                                title="Edit Category">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('deletecategory.admin', $category->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        onclick="return confirm('Are you sure you want to delete this category? This action cannot be undone.')"
                                                        class="p-2 text-gray-400 hover:text-red-500 rounded-lg hover:bg-red-50 transition-colors duration-200"
                                                        title="Delete Category">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-8 py-4 border-t border-gray-100 bg-white">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">20</span> categories
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

                <!-- Add Category Modal -->
                <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                    <div class="bg-white rounded-xl p-6 w-full max-w-md m-4">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-gray-900">Add New Category</h2>
                            <button onclick="closeAddModal()" class="text-gray-400 hover:text-gray-500 transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <form action="{{ route('addcategory.admin') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                                <input type="text"
                                    name="name"
                                    id="name"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:border-[#FF6F3C] focus:ring-[#FF6F3C] transition-colors duration-200"
                                    placeholder="Enter category name">
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="description"
                                    id="description"
                                    rows="3"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:border-[#FF6F3C] focus:ring-[#FF6F3C] transition-colors duration-200"
                                    placeholder="Enter category description"></textarea>
                            </div>
                            <div class="flex justify-end space-x-3">
                                <button type="button"
                                    onclick="closeAddModal()"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition-colors duration-200">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-[#FF6F3C] rounded-xl hover:bg-[#FF6F3C]/90 transition-colors duration-200">
                                    Add Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit Category Modal -->
                <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                    <div class="bg-white rounded-xl p-6 w-full max-w-md m-4">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-gray-900">Edit Category</h2>
                            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-500 transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <form action="{{ route('editcategory.admin') }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="idtoupdate" id="edit_category_id">
                            <div>
                                <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                                <input type="text"
                                    name="newcat"
                                    id="edit_name"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:border-[#FF6F3C] focus:ring-[#FF6F3C] transition-colors duration-200">
                            </div>
                            <div>
                                <label for="edit_description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="newdescription"
                                    id="edit_description"
                                    rows="3"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:border-[#FF6F3C] focus:ring-[#FF6F3C] transition-colors duration-200"></textarea>
                            </div>
                            <div class="flex justify-end space-x-3">
                                <button type="button"
                                    onclick="closeEditModal()"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition-colors duration-200">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-[#FF6F3C] rounded-xl hover:bg-[#FF6F3C]/90 transition-colors duration-200">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    function openAddModal() {
                        document.getElementById('addModal').classList.remove('hidden');
                        document.getElementById('addModal').classList.add('flex');
                    }

                    function closeAddModal() {
                        document.getElementById('addModal').classList.add('hidden');
                        document.getElementById('addModal').classList.remove('flex');
                    }

                    function openEditModal(categoryId, categoryName, categoryDescription) {
                        document.getElementById('edit_category_id').value = categoryId;
                        document.getElementById('edit_name').value = categoryName;
                        document.getElementById('edit_description').value = categoryDescription;
                        document.getElementById('editModal').classList.remove('hidden');
                        document.getElementById('editModal').classList.add('flex');
                    }

                    function closeEditModal() {
                        document.getElementById('editModal').classList.add('hidden');
                        document.getElementById('editModal').classList.remove('flex');
                    }
                </script>
            </div>
        </div>
    </div>
</x-app-layout>