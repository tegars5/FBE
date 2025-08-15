<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;

class AdminSupplierController extends Controller
{
    /**
     * Menampilkan daftar semua supplier.
     */
    public function index()
    {
        // PERBAIKAN: Mengambil data dari model User yang perannya 'supplier',
        // lalu memuat relasi 'supplier' mereka. Ini cara yang benar.
        $suppliers = User::where('role', 'supplier')->with('supplier')->latest()->get();

        return view('admin.suppliers.index', compact('suppliers'));
    }
    public function edit(Supplier $supplier)
    {
        $supplier->load('user');
        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Menampilkan detail spesifik dari satu supplier.
     */
    public function show(Supplier $supplier)
    {
        // Memuat relasi user untuk memastikan data tersedia di view
        $supplier->load('user');
        return view('admin.suppliers.show', compact('supplier'));
    }
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'monthly_capacity' => 'required|numeric|min:0',
        ]);

        $supplier->user->update(['name' => $validated['name']]);
        $supplier->update($validated);

        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier details have been updated successfully.');
    }
    public function destroy(Supplier $supplier)
    {
        $supplier->user()->delete();
        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier has been deleted successfully.');
    }

    /**
     * Menerima submission dan mengubah kapasitas supplier.
     */
    public function acceptSubmission(Request $request, Supplier $supplier)
    {
        $request->validate([
            'accepted_volume' => 'required|numeric|min:0|max:' . $supplier->monthly_capacity,
        ]);

        // PERBAIKAN: Kurangi kapasitas bulanan dengan jumlah yang diterima, bukan menggantinya.
        $supplier->monthly_capacity -= $request->accepted_volume;

        $supplier->submission_status = 'accepted'; // Status tetap diubah
        $supplier->save();

        return redirect()->back()->with('success', 'Accepted ' . $request->accepted_volume . ' tons. Remaining capacity updated.');
    }

    /**
     * Menolak submission.
     */
    public function rejectSubmission(Supplier $supplier)
    {
        $supplier->submission_status = 'rejected';
        $supplier->save();
        return redirect()->back()->with('success', 'Submission rejected.');
    }
}
