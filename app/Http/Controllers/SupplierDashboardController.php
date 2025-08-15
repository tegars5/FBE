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
        $confirmedOrders       = $supplier->accepted_volume ?? 0;
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
        $supplier = Supplier::where('user_id', auth()->id())->first();

        return view('profile.partials.edit-supplier-form', compact('supplier'));
    }

    public function updateProfile(Request $request)
    {
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'region' => 'required|string|max:255',
            'annual_sales' => 'required|numeric',
            'monthly_capacity' => 'required|numeric',
            'dura_composition' => 'required|numeric',
            'tenera_composition' => 'required|numeric',
            'pisifera_composition' => 'required|numeric',
            'sales_record' => 'required|numeric',
            'desired_price' => 'required|numeric',
            'minimum_order_quantity' => 'required|numeric',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:255',
        ]);

        $supplier = Supplier::where('user_id', auth()->id())->first(); // Ambil data supplier yang terkait dengan user yang sedang login

        // Perbarui data supplier
        $supplier->update($validatedData);

        return redirect()->route('supplier.dashboard')->with('success', 'Your supplier profile has been updated successfully.');
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
        // SupplierDashboardController@saveProductManagement

        if ($request->hasFile('factory_warehouse_photos')) {
            $paths = [];
            foreach ($request->file('factory_warehouse_photos') as $photo) {
                $paths[] = $photo->store('supplier/factory', 's3');
            }
            $supplier->factory_warehouse_photos = $paths;
        }

        if ($request->hasFile('pks_sample_photos')) {
            $paths = [];
            foreach ($request->file('pks_sample_photos') as $photo) {
                $paths[] = $photo->store('supplier/pks-samples', 's3');
            }
            $supplier->pks_sample_photos = $paths;
        }

        if ($request->hasFile('lab_test_report')) {
            $supplier->lab_test_report_path = $request->file('lab_test_report')
                ->store('supplier/lab-reports', 's3');
        }
        $supplier->notes = $request->input('notes');
        $supplier->save();
        return redirect()->route('supplier.dashboard')->with('success', 'Product management data saved successfully.');
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
    public function showSupplierDashboard()
    {
        $supplier = Supplier::where('user_id', Auth::id())->first();

        return view('supplier.dashboard', compact('supplier'));
    }
}
