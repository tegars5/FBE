<!DOCTYPE html>
<html lang="en">

<x-layout.head title="Supplier Dashboard" />

<body class="font-sans leading-relaxed antialiased bg-gray-100">
    <x-layout.navbar />

    <div class="container mx-auto px-4 py-8 mt-20">
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
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold text-gray-800">Supplier Profile</h2>

                    </div>

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

                            <!-- Photos and Files Section -->
                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-medium text-gray-700">Factory & Warehouse Photos:</h4>
                                    @if ($supplier->factory_warehouse_photos)
                                        <div class="grid grid-cols-2 gap-4">
                                            @foreach (json_decode($supplier->factory_warehouse_photos) as $photo)
                                                <img src="{{ Storage::disk('s3')->url($photo) }}" alt="Factory Photo"
                                                    class="w-full h-32 object-cover rounded-md">
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500">No photos uploaded.</p>
                                    @endif
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700">PKS Sample Photos:</h4>
                                    @if ($supplier->pks_sample_photos)
                                        <div class="grid grid-cols-2 gap-4">
                                            @foreach (json_decode($supplier->pks_sample_photos) as $photo)
                                                <img src="{{ Storage::disk('s3')->url($photo) }}"
                                                    alt="PKS Sample Photo" class="w-full h-32 object-cover rounded-md">
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500">No photos uploaded.</p>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-700">Lab Test Report:</h4>
                                    @if ($supplier->lab_test_report_path)
                                        <a href="{{ Storage::disk('s3')->url($supplier->lab_test_report_path) }}"
                                            class="text-blue-500 hover:text-blue-700" target="_blank">Download PDF</a>
                                    @else
                                        <p class="text-sm text-gray-500">No lab test report uploaded.</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="mt-6 text-right">
                            <a href="{{ route('supplier.profile.edit') }}"
                                class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">Edit
                                Profile</a>
                        </div>
                    @else
                        <p class="text-gray-600">Supplier details not found. Please complete your profile.</p>
                    @endif
                </div>
            </div>

            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Sales Status</h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between items-center">
                            <span class="text-gray-600">Current Month Available</span>
                            <span class="font-bold text-green-600">{{ number_format($currentMonthAvailable, 2) }}
                                tons</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span class="text-gray-600">Confirmed Orders</span>
                            <span class="font-bold">{{ number_format($confirmedOrders, 2) }} tons</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span class="text-gray-600">Pending Inquiries</span>
                            <span class="font-bold">{{ $pendingInquiries }}</span>
                        </li>
                    </ul>
                    <p class="text-xs text-gray-400 mt-4 text-right">Last Update:
                        {{ $supplier->updated_at->format('Y/m/d') }}</p>
                    <a href="{{ route('supplier.orders.index') }}"
                        class="block text-center mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        View Orders
                    </a>
                </div>
            </div>
        </div>
    </div>

    <x-layout.footer />
</body>

</html>
