<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;

class SupplierDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $supplier = $user->supplier;

        $currentMonthAvailable = $supplier->monthly_capacity ?? 0;
        $confirmedOrders       = $supplier->accepted_volume ?? 0; // jangan hardcode 300
        $pendingInquiries      = $supplier->pending_inquiries ?? 0;

        return view('supplier.dashboard', compact(
            'supplier',
            'currentMonthAvailable',
            'confirmedOrders',
            'pendingInquiries'
        ));
    }

    public function editProfile()
    {
        $supplier = Auth::user()->supplier;
        return view('profile.edit', compact('supplier'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $supplier = $user->supplier ?? new Supplier(['user_id' => $user->id]);

        $validatedData = $request->validate([
            'type' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'monthly_capacity' => 'nullable|numeric|min:0',
            'annual_sales' => 'nullable|numeric|min:0',
            'desired_price' => 'nullable|numeric|min:0',
            'years_operation' => 'nullable|integer|min:0',
            'dura_composition' => 'nullable|integer|min:0|max:100',
            'tenera_composition' => 'nullable|integer|min:0|max:100',
            'pisifera_composition' => 'nullable|integer|min:0|max:100',
        ]);

        $supplier->fill($validatedData);
        $supplier->save();

        return redirect()->route('supplier.dashboard')->with('success', 'Profil Anda berhasil diperbarui!');
    }

    public function saveProductManagement(Request $request)
    {
        $user = Auth::user();
        $supplier = $user->supplier ?? new Supplier(['user_id' => $user->id]);

        $request->validate([
            'factory_warehouse_photos.*' => 'nullable|image|max:2048',
            'pks_sample_photos.*' => 'nullable|image|max:2048',
            'lab_test_report' => 'nullable|mimes:pdf|max:5120',
            'notes' => 'nullable|string',
        ]);

        // (Sama seperti punyamu—disingkat)
        if ($request->hasFile('factory_warehouse_photos')) {
            $paths = [];
            foreach ($request->file('factory_warehouse_photos') as $photo) {
                $paths[] = $photo->store('supplier/factory', 'public');
            }
            $supplier->factory_warehouse_photos = $paths;
        }

        if ($request->hasFile('pks_sample_photos')) {
            $paths = [];
            foreach ($request->file('pks_sample_photos') as $photo) {
                $paths[] = $photo->store('supplier/pks-samples', 'public');
            }
            $supplier->pks_sample_photos = $paths;
        }

        if ($request->hasFile('lab_test_report')) {
            $supplier->lab_test_report_path = $request->file('lab_test_report')->store('supplier/lab-reports', 'public');
        }

        $supplier->notes = $request->input('notes');
        $supplier->save();

        return redirect()->route('supplier.dashboard')->with('success', 'Data produk berhasil disimpan!');
    }

    // >>> Orders INDEX: 5 item dari Supplier
    public function ordersIndex()
    {
        $supplier = Auth::user()->supplier;

        $viewStats = [
            'current_month_available' => (float) ($supplier->monthly_capacity ?? 0),
            'confirmed_orders'        => (float) ($supplier->accepted_volume ?? 0),
            'dura'                    => (float) ($supplier->dura_composition ?? 0),
            'tenera'                  => (float) ($supplier->tenera_composition ?? 0),
            'pisifera'                => (float) ($supplier->pisifera_composition ?? 0),
            'type'                    => $supplier->type ?? 'N/A',
            'region'                  => $supplier->region ?? 'N/A',
        ];

        return view('supplier.orders.index', compact('supplier', 'viewStats'));
    }
    // Controller method to show the supplier dashboard
    public function showSupplierDashboard()
    {
        $supplier = Supplier::where('user_id', Auth::id())->first();

        return view('supplier.dashboard', compact('supplier'));
    }
}
