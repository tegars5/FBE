<div class="bg-white overflow-hidden shadow-lg rounded-lg">
    <div class="p-6">
        <div class="flex flex-col items-center">
            {{-- Placeholder untuk Foto Profil --}}
            <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-user text-4xl text-gray-500"></i>
                {{-- Jika Anda punya URL foto: <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile Photo" class="w-24 h-24 rounded-full object-cover"> --}}
            </div>

            <h2 class="text-xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
            <p class="text-sm text-gray-600 mt-1">{{ Auth::user()->email }}</p>
            <span
                class="mt-2 inline-block bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                {{ ucfirst(Auth::user()->role) }}
            </span>
        </div>

        <div class="mt-6 border-t border-gray-200 pt-6">
            <dl>
                <div class="flex justify-between items-center py-2">
                    <dt class="text-sm font-medium text-gray-500">Joined On</dt>
                    <dd class="text-sm text-gray-900">{{ Auth::user()->created_at->format('d M, Y') }}</dd>
                </div>
                {{-- Anda bisa menambahkan info lain di sini --}}
            </dl>
        </div>

        <div class="mt-6">
            <a href="{{ route('profile.edit') }}"
                class="w-full text-center inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-custom hover:bg-green-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition">
                <i class="fas fa-edit -ml-1 mr-2"></i>
                Edit Profile
            </a>
        </div>
    </div>
</div>
