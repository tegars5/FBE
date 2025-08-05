<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Supplier Dashboard" />

<body class="font-sans leading-relaxed antialiased bg-gray-100">
    <x-layout.navbar />

    <div class="container mx-auto px-4 py-8 mt-20"> {{-- Margin top for fixed navbar --}}

        {{-- ⿡ Welcome Section --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }}!</h1>
            <p class="text-lg text-gray-600 mt-1">Manage your PKS supply information, update your profile, and track your
                partnership status with FBE.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p class="font-bold">Success</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Main Content (Left Side) --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- ⿢ Supplier Profile --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold text-gray-800">Supplier Profile</h2>
                        <a href="{{ route('profile.edit') }}"
                            class="text-sm font-medium text-green-custom hover:text-green-hover">[Edit]</a>
                    </div>
                    {{-- Pastikan variabel $supplier tersedia dari controller --}}
                    @if (isset($supplier))
                        <div class="border-t pt-4">
                            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Supplier Type</dt>
                                    <dd class="mt-1 text-md font-semibold text-gray-900">{{ $supplier->type ?? 'N/A' }}
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Region</dt>
                                    <dd class="mt-1 text-md text-gray-900">{{ $supplier->region ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Monthly Available Volume</dt>
                                    <dd class="mt-1 text-md text-gray-900">
                                        {{ number_format($supplier->monthly_capacity ?? 0) }} tons</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Sales Record (past 1 year)</dt>
                                    <dd class="mt-1 text-md text-gray-900">
                                        {{ number_format($supplier->annual_sales ?? 0) }} tons</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Desired Selling Price</dt>
                                    <dd class="mt-1 text-md text-gray-900">
                                        ${{ number_format($supplier->desired_price ?? 0, 2) }} / ton</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Years in Operation</dt>
                                    <dd class="mt-1 text-md text-gray-900">{{ $supplier->years_operation ?? 0 }} years
                                    </dd>
                                </div>
                                <div class="md:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Palm Variety Composition</dt>
                                    <dd class="mt-1 text-md text-gray-900">
                                        Dura: <span
                                            class="font-semibold">{{ $supplier->dura_composition ?? 0 }}%</span>,
                                        Tenera: <span
                                            class="font-semibold">{{ $supplier->tenera_composition ?? 0 }}%</span>,
                                        Pisifera: <span
                                            class="font-semibold">{{ $supplier->pisifera_composition ?? 0 }}%</span>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <div class="mt-6 text-right">
                            <a href="{{ route('profile.edit') }}"
                                class="bg-green-custom hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                Update Profile
                            </a>
                        </div>
                    @else
                        <p class="text-gray-600">Supplier details not found. Please complete your profile.</p>
                    @endif
                </div>

                {{-- ⿣ Product Management --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Product Management</h2>
                    <div class="space-y-4">
                        <div class="border p-4 rounded-md flex justify-between items-center">
                            <div>
                                <h4 class="font-semibold">Factory & Warehouse Photos</h4>
                                <p class="text-sm text-gray-500">Up to 5 images</p>
                            </div>
                            <button
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Upload</button>
                        </div>
                        <div class="border p-4 rounded-md flex justify-between items-center">
                            <div>
                                <h4 class="font-semibold">PKS Sample Photos</h4>
                                <p class="text-sm text-gray-500">Up to 5 images</p>
                            </div>
                            <button
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Upload</button>
                        </div>
                        <div class="border p-4 rounded-md flex justify-between items-center">
                            <div>
                                <h4 class="font-semibold">Lab Test Report</h4>
                                <p class="text-sm text-gray-500">PDF format</p>
                            </div>
                            <button
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Upload</button>
                        </div>
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                            <textarea id="notes" name="notes" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                placeholder="e.g. Supply may decrease during rainy season"></textarea>
                        </div>
                        <div class="text-right">
                            <button
                                class="bg-green-custom hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Sidebar (Right Side) --}}
            <div class="lg:col-span-1 space-y-8">

                {{-- ⿤ Sales Status --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Sales Status</h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between items-center">
                            <span class="text-gray-600">Current Month Available</span>
                            <span class="font-bold text-green-600">500 tons</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span class="text-gray-600">Confirmed Orders</span>
                            <span class="font-bold">300 tons</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span class="text-gray-600">Pending Inquiries</span>
                            <span class="font-bold">2</span>
                        </li>
                    </ul>
                    <p class="text-xs text-gray-400 mt-4 text-right">Last Update: {{ date('Y/m/d') }}</p>
                    <button
                        class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                        View Orders
                    </button>
                </div>

                {{-- ⿥ Quick Actions --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <button
                            class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                            Post Urgent Sale
                        </button>
                        <button
                            class="w-full bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded transition duration-300">
                            Message FBE
                        </button>
                        <form action="{{ route('logout') }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit"
                                class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-layout.footer />
</body>

</html>
