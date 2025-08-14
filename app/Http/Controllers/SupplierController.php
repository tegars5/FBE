<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Handle the initial supplier information submission (Mill Factory).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function initialRegistration(Request $request)
    {
        // 1. Validasi data formulir
        $validatedData = $request->validate([
            'mill_region' => 'required|string|max:255',
            'mill_monthly_capacity' => 'required|numeric',
            'mill_dura' => 'nullable|numeric|min:0|max:100',
            'mill_tenera' => 'nullable|numeric|min:0|max:100',
            'mill_pisifera' => 'nullable|numeric|min:0|max:100',
            'mill_annual_sales' => 'required|numeric',
            'mill_desired_price' => 'required|numeric',
            'mill_years_operation' => 'required|numeric|integer|min:0',
            'mill_contact_name' => 'required|string|max:255',
            'mill_contact_email' => 'required|email|max:255',
            'mill_contact_phone' => 'required|string|max:255',
        ]);

        // Mapping validated data keys to model fillable keys
        $supplierData = [
            'region' => $validatedData['mill_region'],
            'monthly_capacity' => $validatedData['mill_monthly_capacity'],
            'dura_composition' => $validatedData['mill_dura'] ?? 0,
            'tenera_composition' => $validatedData['mill_tenera'] ?? 0,
            'pisifera_composition' => $validatedData['mill_pisifera'] ?? 0,
            'annual_sales' => $validatedData['mill_annual_sales'],
            'desired_price' => $validatedData['mill_desired_price'],
            'years_operation' => $validatedData['mill_years_operation'],
            'contact_name' => $validatedData['mill_contact_name'],
            'contact_email' => $validatedData['mill_contact_email'],
            'contact_phone' => $validatedData['mill_contact_phone'],
            'type' => 'Mill Factory',
        ];

        // Cek apakah ada supplier dengan email yang sama.
        $existingSupplierByEmail = Supplier::where('contact_email', $supplierData['contact_email'])->first();

        if (Auth::check()) {
            // Pengguna sudah login
            if ($existingSupplierByEmail && $existingSupplierByEmail->user_id !== Auth::id()) {
                // Email ini sudah terdaftar sebagai supplier oleh akun lain.
                return redirect()->back()->withInput()->withErrors(['mill_contact_email' => 'This email is already registered as a supplier by another account. If this is new data, please use a different email or delete the existing entry.']);
            } elseif ($existingSupplierByEmail && $existingSupplierByEmail->user_id === Auth::id()) {
                // Email ini sudah terdaftar dan terkait dengan akun yang sedang login.
                // Dalam kasus ini, kita update entri yang ada karena ini kemungkinan adalah pembaruan data yang sama.
                try {
                    $existingSupplierByEmail->update($supplierData);
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while updating supplier information: ' . $e->getMessage()]);
                }
                return redirect()->route('supplier.dashboard')->with('success', 'Your Mill Factory information has been successfully updated!');
            } else {
                // Email belum terdaftar sebagai supplier, atau terdaftar tapi user_id-nya null.
                // Buat supplier baru dan hubungkan dengan pengguna yang login.
                $supplierData['user_id'] = Auth::id(); // Langsung hubungkan dengan pengguna yang login
                try {
                    Supplier::create($supplierData);
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while saving new supplier information: ' . $e->getMessage()]);
                }
                return redirect()->route('supplier.dashboard')->with('success', 'Your Mill Factory information has been submitted successfully!');
            }
        } else {
            // Pengguna belum login
            if ($existingSupplierByEmail) {
                // Email sudah terdaftar sebagai supplier oleh siapapun (termasuk yang belum terhubung user_id).
                // Arahkan ke halaman login.
                return redirect()->route('login')->withErrors(['email' => 'This email is already registered as a supplier. Please login.'])->withInput(['email' => $supplierData['contact_email']]);
            } else {
                // Email belum terdaftar. Buat record supplier tanpa user_id dulu, lalu arahkan ke pendaftaran.
                try {
                    $supplier = Supplier::create($supplierData);
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while saving supplier information: ' . $e->getMessage()]);
                }

                Session::put('pending_supplier_id', $supplier->id);
                return redirect()->route('register')->with([
                    'email' => $supplierData['contact_email'],
                    'name' => $supplierData['contact_name'],
                    'message' => 'Please complete your registration to create an account and link it with your supplier information.'
                ]);
            }
        }
    }
    public function showForm()
    {
        // Cek apakah user sudah login dan memiliki data supplier
        $supplier = Supplier::where('user_id', Auth::id())->first();

        // Jika supplier ditemukan, tampilkan data supplier di form
        return view('supplier.mill-factory-form', compact('supplier'));
    }

    public function showCollectorForm()
    {
        // Cek apakah user sudah login dan memiliki data supplier
        $supplier = Supplier::where('user_id', Auth::id())->first();

        return view('supplier.collector-form', compact('supplier'));
    }
}
