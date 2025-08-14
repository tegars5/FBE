<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Edit Supplier Profile" />

<body class="font-sans leading-relaxed antialiased bg-gray-100">
    <x-layout.navbar />

    <div class="container mx-auto px-4 py-8 mt-20">
        <h1 class="text-2xl font-bold mb-6">Edit Supplier Profile</h1>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                <p class="font-bold">Validation Error</p>
                <ul class="list-disc ml-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('supplier.profile.update') }}" method="POST">
            @csrf
            {{-- @method('PUT') jika route update pakai PUT --}}
            @include('profile.partials.edit-supplier-form', ['supplier' => $supplier])

            <div class="mt-6">
                <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                    Save Changes
                </button>
                <a href="{{ route('supplier.dashboard') }}" class="ml-3 text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>

    <x-layout.footer />
</body>

</html>
