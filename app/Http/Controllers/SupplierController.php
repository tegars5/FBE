<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier; // Import Model Supplier Anda

class SupplierController extends Controller
{
    /**
     * Handle the initial supplier information submission.
     * Then redirect to the registration page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function initialRegistration(Request $request)
    {
        // 1. Validasi data formulir
        $validatedData = $request->validate([
            'mill_region' => 'required|string|max:255', // Sesuaikan nama input
            'mill_monthly_capacity' => 'required|numeric', // Sesuaikan nama input
            'mill_dura' => 'nullable|numeric|min:0|max:100', // Sesuaikan nama input
            'mill_tenera' => 'nullable|numeric|min:0|max:100', // Sesuaikan nama input
            'mill_pisifera' => 'nullable|numeric|min:0|max:100', // Sesuaikan nama input
            'mill_annual_sales' => 'required|numeric', // Sesuaikan nama input
            'mill_desired_price' => 'required|numeric', // Sesuaikan nama input
            'mill_years_operation' => 'required|numeric|integer|min:0', // Sesuaikan nama input
            'mill_contact_name' => 'required|string|max:255', // Sesuaikan nama input
            'mill_contact_email' => 'required|email|max:255|unique:suppliers,contact_email', // Sesuaikan nama input
            'mill_contact_phone' => 'required|string|max:255', // Sesuaikan nama input
        ]);

        // Mapping validated data keys to model fillable keys if they are different
        $supplierData = [
            'region' => $validatedData['mill_region'],
            'monthly_capacity' => $validatedData['mill_monthly_capacity'],
            'dura_composition' => $validatedData['mill_dura'] ?? 0, // Default to 0 if null
            'tenera_composition' => $validatedData['mill_tenera'] ?? 0,
            'pisifera_composition' => $validatedData['mill_pisifera'] ?? 0,
            'annual_sales' => $validatedData['mill_annual_sales'],
            'desired_price' => $validatedData['mill_desired_price'],
            'years_operation' => $validatedData['mill_years_operation'],
            'contact_name' => $validatedData['mill_contact_name'],
            'contact_email' => $validatedData['mill_contact_email'],
            'contact_phone' => $validatedData['mill_contact_phone'],
        ];


        // Opsional: Cek apakah email sudah ada di tabel suppliers sebelum membuat record baru
        $existingSupplier = Supplier::where('contact_email', $supplierData['contact_email'])->first();

        if ($existingSupplier) {
            return redirect()->route('login')->withErrors(['email' => 'This email is already registered as a supplier. Please login.']);
        }

        // 2. Simpan data formulir ke database menggunakan Model Supplier
        try {
            $supplier = Supplier::create($supplierData);
        } catch (\Exception $e) {
            // Tangani error jika terjadi masalah saat menyimpan
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save supplier information: ' . $e->getMessage()]);
        }

        // 3. Simpan ID supplier di sesi agar bisa dihubungkan ke user setelah register
        Session::put('pending_supplier_id', $supplier->id);

        // 4. Redirect ke halaman registrasi dengan data email dan nama untuk pre-fill
        return redirect()->route('register')->with([
            'email' => $supplierData['contact_email'],
            'name' => $supplierData['contact_name'],
            'message' => 'Please complete your registration to create an account.'
        ]);
    }
}
