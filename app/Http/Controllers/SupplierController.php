<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth; // Penting: Pastikan Auth diimpor

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
            'type' => 'Mill Factory', // Set tipe supplier
        ];

        // Cek apakah ada supplier dengan email yang sama.
        $existingSupplierByEmail = Supplier::where('contact_email', $supplierData['contact_email'])->first();

        if (Auth::check()) {
            // Pengguna sudah login
            if ($existingSupplierByEmail && $existingSupplierByEmail->user_id !== Auth::id()) {
                // Email ini sudah terdaftar sebagai supplier oleh akun lain.
                return redirect()->back()->withInput()->withErrors(['mill_contact_email' => 'Email ini sudah terdaftar sebagai supplier oleh akun lain. Jika ini adalah data baru, gunakan email yang berbeda atau hapus entri lama.']);
            } elseif ($existingSupplierByEmail && $existingSupplierByEmail->user_id === Auth::id()) {
                // Email ini sudah terdaftar dan terkait dengan akun yang sedang login.
                // Dalam kasus ini, kita update entri yang ada karena ini kemungkinan adalah pembaruan data yang sama.
                try {
                    $existingSupplierByEmail->update($supplierData);
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui informasi supplier: ' . $e->getMessage()]);
                }
                return redirect()->route('supplier.dashboard')->with('success', 'Informasi Mill Factory Anda berhasil diperbarui!');
            } else {
                // Email belum terdaftar sebagai supplier, atau terdaftar tapi user_id-nya null.
                // Buat supplier baru dan hubungkan dengan pengguna yang login.
                $supplierData['user_id'] = Auth::id(); // Langsung hubungkan dengan pengguna yang login
                try {
                    Supplier::create($supplierData);
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan informasi supplier baru: ' . $e->getMessage()]);
                }
                return redirect()->route('supplier.dashboard')->with('success', 'Informasi Mill Factory Anda berhasil dikirimkan!');
            }
        } else {
            // Pengguna belum login
            if ($existingSupplierByEmail) {
                // Email sudah terdaftar sebagai supplier oleh siapapun (termasuk yang belum terhubung user_id).
                // Arahkan ke halaman login.
                return redirect()->route('login')->withErrors(['email' => 'Email ini sudah terdaftar sebagai supplier. Silakan login.'])->withInput(['email' => $supplierData['contact_email']]);
            } else {
                // Email belum terdaftar. Buat record supplier tanpa user_id dulu, lalu arahkan ke pendaftaran.
                try {
                    $supplier = Supplier::create($supplierData);
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan informasi supplier: ' . $e->getMessage()]);
                }

                Session::put('pending_supplier_id', $supplier->id);
                return redirect()->route('register')->with([
                    'email' => $supplierData['contact_email'],
                    'name' => $supplierData['contact_name'], // Pastikan ini sesuai dengan field di form register Anda
                    'message' => 'Silakan lengkapi pendaftaran Anda untuk membuat akun dan menghubungkan informasi supplier Anda.'
                ]);
            }
        }
    }
}
