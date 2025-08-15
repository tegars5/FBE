<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Detail Order #{{ $order->id }}" />

<body class="font-sans leading-relaxed antialiased bg-gray-100">
    <x-layout.navbar />

    <div class="container mx-auto px-4 py-8 mt-20">

        {{-- Header Section --}}
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Detail Order #{{ $order->id }}</h1>
                    <p class="text-lg text-gray-600 mt-1">
                        Informasi lengkap pesanan dari admin FBE
                    </p>
                </div>
                <a href="{{ route('supplier.orders.index', $supplier->id) }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                    ← Kembali ke Daftar Order
                </a>
            </div>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p class="font-bold">Berhasil</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Order Information --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-gray-800">Informasi Order</h2>
                        <span
                            class="inline-flex px-3 py-1 text-sm font-semibold rounded-full 
                               bg-{{ $order->status_color }}-100 text-{{ $order->status_color }}-800">
                            {{ $order->status_label }}
                        </span>
                    </div>

                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Tanggal Order</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $order->created_at->format('d F Y, H:i') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Admin Yang Memesan</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $order->admin->name ?? 'Admin FBE' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Volume Diminta</dt>
                            <dd class="mt-1 text-sm font-semibold text-gray-900">
                                {{ number_format($order->quantity_requested, 2) }} ton</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Harga Ditawarkan</dt>
                            <dd class="mt-1 text-sm font-semibold text-gray-900">{{ $order->formatted_price }} / ton
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Total Nilai</dt>
                            <dd class="mt-1 text-lg font-bold text-green-600">{{ $order->formatted_total }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Status Terakhir</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $order->updated_at->format('d F Y, H:i') }}</dd>
                        </div>
                    </dl>
                </div>

                {{-- Delivery Information --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Informasi Pengiriman</h3>
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Tanggal Pengiriman Yang Diinginkan</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $order->delivery_date ? $order->delivery_date->format('d F Y') : 'Belum ditentukan' }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Lokasi Pengiriman</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $order->delivery_location ?? 'Belum ditentukan' }}</dd>
                        </div>
                    </dl>
                </div>

                {{-- Notes --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Catatan</h3>

                    @if ($order->notes)
                        <div class="mb-4">
                            <dt class="text-sm font-medium text-gray-500 mb-2">Catatan dari Admin:</dt>
                            <dd class="text-sm text-gray-900 bg-blue-50 p-3 rounded-md">{{ $order->notes }}</dd>
                        </div>
                    @endif

                    @if ($order->supplier_notes)
                        <div class="mb-4">
                            <dt class="text-sm font-medium text-gray-500 mb-2">Catatan Anda:</dt>
                            <dd class="text-sm text-gray-900 bg-green-50 p-3 rounded-md">{{ $order->supplier_notes }}
                            </dd>
                        </div>
                    @endif

                    @if (!$order->notes && !$order->supplier_notes)
                        <p class="text-gray-500 italic">Tidak ada catatan untuk order ini.</p>
                    @endif
                </div>

                {{-- Response Form (jika order masih pending) --}}
                @if ($order->status === 'pending')
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Tanggapi Order</h3>

                        <form method="POST"
                            action="{{ route('supplier.orders.updateStatus', [$supplier->id, $order->id]) }}">
                            @csrf
                            @method('PATCH')

                            <div class="mb-4">
                                <label for="supplier_notes" class="block text-sm font-medium text-gray-700 mb-2">
                                    Catatan Tanggapan (Opsional)
                                </label>
                                <textarea id="supplier_notes" name="supplier_notes" rows="4"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                    placeholder="Tambahkan catatan jika perlu...">{{ old('supplier_notes') }}</textarea>
                                @error('supplier_notes')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex space-x-4">
                                <button type="submit" name="status" value="accepted"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded transition duration-300"
                                    onclick="return confirm('Yakin mau terima order ini?')">
                                    ✓ Terima Order
                                </button>
                                <button type="submit" name="status" value="rejected"
                                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded transition duration-300"
                                    onclick="return confirm('Yakin mau tolak order ini?')">
                                    ✗ Tolak Order
                                </button>
                            </div>
                        </form>
                    </div>
                @endif

                {{-- Mark as Complete (jika order sudah accepted) --}}
                @if ($order->status === 'accepted')
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Tandai Selesai</h3>
                        <p class="text-sm text-gray-600 mb-4">
                            Jika pengiriman sudah selesai, tandai order ini sebagai selesai.
                        </p>
                        <form method="POST"
                            action="{{ route('supplier.orders.markCompleted', [$supplier->id, $order->id]) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition duration-300"
                                onclick="return confirm('Tandai order ini sebagai selesai?')">
                                ✓ Tandai Selesai
                            </button>
                        </form>
                    </div>
                @endif

                {{-- Order History / Activity Log --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Riwayat Aktivitas</h3>
                    <div class="flow-root">
                        <ul role="list" class="-mb-8">
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                        aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span
                                                class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                            <div>
                                                <p class="text-sm text-gray-500">Order dibuat oleh <span
                                                        class="font-medium text-gray-900">{{ $order->admin->name ?? 'Admin' }}</span>
                                                </p>
                                            </div>
                                            <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                {{ $order->created_at->format('d M Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            @if ($order->status !== 'pending')
                                <li>
                                    <div class="relative pb-8">
                                        @if ($order->status !== 'completed')
                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                aria-hidden="true"></span>
                                        @endif
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span
                                                    class="h-8 w-8 rounded-full bg-{{ $order->status_color }}-500 flex items-center justify-center ring-8 ring-white">
                                                    @if ($order->status === 'accepted')
                                                        <svg class="w-4 h-4 text-white" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    @elseif($order->status === 'rejected')
                                                        <svg class="w-4 h-4 text-white" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    @else
                                                        <svg class="w-4 h-4 text-white" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-500">Order {{ $order->status_label }}
                                                    </p>
                                                    @if ($order->supplier_notes)
                                                        <p class="text-xs text-gray-400 mt-1">
                                                            {{ Str::limit($order->supplier_notes, 50) }}</p>
                                                    @endif
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    {{ $order->updated_at->format('d M Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if ($order->status === 'completed')
                                <li>
                                    <div class="relative">
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span
                                                    class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                                    <svg class="w-4 h-4 text-white" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-500">Order selesai</p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    {{ $order->updated_at->format('d M Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1 space-y-6">

                {{-- Order Summary --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Ringkasan Order</h3>

                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Volume</span>
                            <span class="text-sm font-semibold">{{ number_format($order->quantity_requested, 2) }}
                                ton</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Harga per ton</span>
                            <span class="text-sm font-semibold">{{ $order->formatted_price }}</span>
                        </div>
                        <hr>
                        <div class="flex justify-between">
                            <span class="text-base font-semibold text-gray-800">Total</span>
                            <span class="text-base font-bold text-green-600">{{ $order->formatted_total }}</span>
                        </div>
                    </div>

                    @if ($order->status === 'accepted')
                        <div class="mt-4 p-3 bg-green-50 rounded-md">
                            <p class="text-xs text-green-800">
                                <strong>Status:</strong> Order telah diterima dan akan diproses.
                            </p>
                        </div>
                    @elseif($order->status === 'pending')
                        <div class="mt-4 p-3 bg-yellow-50 rounded-md">
                            <p class="text-xs text-yellow-800">
                                <strong>Status:</strong> Menunggu konfirmasi dari Anda.
                            </p>
                        </div>
                    @elseif($order->status === 'completed')
                        <div class="mt-4 p-3 bg-blue-50 rounded-md">
                            <p class="text-xs text-blue-800">
                                <strong>Status:</strong> Order telah selesai dilaksanakan.
                            </p>
                        </div>
                    @endif
                </div>

                {{-- Contact Admin --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Kontak Admin</h3>

                    <div class="space-y-3">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mr-3">
                                <span
                                    class="text-sm font-medium text-gray-700">{{ substr($order->admin->name ?? 'A', 0, 1) }}</span>
                            </div>
                            <div>
                                <p class="font-semibold text-sm">{{ $order->admin->name ?? 'Admin FBE' }}</p>
                                <p class="text-xs text-gray-500">{{ $order->admin->email ?? 'admin@fbe.com' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button
                            class="w-full bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded transition duration-300">
                            💬 Kirim Pesan
                        </button>
                    </div>
                </div>

                {{-- Quick Actions --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Aksi Cepat</h3>

                    <div class="space-y-3">
                        <button
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                            📄 Download PDF
                        </button>
                        <button
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                            🖨️ Print Order
                        </button>
                        @if ($order->status === 'accepted' || $order->status === 'completed')
                            <button
                                class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                📊 Lihat Invoice
                            </button>
                        @endif
                    </div>
                </div>

                {{-- Order Stats --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Info Supplier</h3>

                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Kapasitas Bulanan:</span>
                            <span class="font-semibold">{{ number_format($supplier->monthly_capacity, 0) }} ton</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Volume Diterima:</span>
                            <span class="font-semibold">{{ number_format($supplier->accepted_volume, 0) }} ton</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sisa Kapasitas:</span>
                            <span class="font-semibold text-green-600">
                                {{ number_format($supplier->monthly_capacity - $supplier->accepted_volume, 0) }} ton
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <x-layout.footer />
</body>

</html>
