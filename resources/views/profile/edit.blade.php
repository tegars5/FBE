<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-4xl mx-auto p-6 pt-24">
        <!-- Formulir Edit Profil -->
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Your Profile</h2>

            <!-- Menampilkan pesan error jika ada -->
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                        class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                        class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>
                </div>

                <!-- Form Supplier -->
                @if (Auth::user()->role === 'supplier' && isset($supplier))
                    <div class="mb-4">
                        <label for="region" class="block text-sm font-medium text-gray-600">Region</label>
                        <input type="text" id="region" name="region" value="{{ $supplier->region }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="monthly_capacity" class="block text-sm font-medium text-gray-600">Monthly
                            Capacity</label>
                        <input type="number" id="monthly_capacity" name="monthly_capacity"
                            value="{{ $supplier->monthly_capacity }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="contact_name" class="block text-sm font-medium text-gray-600">Contact Name</label>
                        <input type="text" id="contact_name" name="contact_name"
                            value="{{ $supplier->contact_name }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="contact_email" class="block text-sm font-medium text-gray-600">Contact Email</label>
                        <input type="email" id="contact_email" name="contact_email"
                            value="{{ $supplier->contact_email }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="contact_phone" class="block text-sm font-medium text-gray-600">Contact Phone</label>
                        <input type="text" id="contact_phone" name="contact_phone"
                            value="{{ $supplier->contact_phone }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                    </div>
                @elseif(Auth::user()->role === 'buyer' && isset($buyer))
                    <!-- Form Buyer -->
                    <div class="mb-4">
                        <label for="company_name" class="block text-sm font-medium text-gray-600">Company Name</label>
                        <input type="text" id="company_name" name="company_name" value="{{ $buyer->company_name }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="country" class="block text-sm font-medium text-gray-600">Country</label>
                        <input type="text" id="country" name="country" value="{{ $buyer->country }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="contact_person_name" class="block text-sm font-medium text-gray-600">Contact Person
                            Name</label>
                        <input type="text" id="contact_person_name" name="contact_person_name"
                            value="{{ $buyer->contact_person_name }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="contact_person_email" class="block text-sm font-medium text-gray-600">Contact Person
                            Email</label>
                        <input type="email" id="contact_person_email" name="contact_person_email"
                            value="{{ $buyer->contact_person_email }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                    </div>
                @endif

                <!-- Tombol simpan -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-md transition duration-300">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
