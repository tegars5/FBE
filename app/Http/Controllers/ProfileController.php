<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Buyer;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna yang sedang login.
     */
    public function show()
    {
        $user = Auth::user();
        $supplier = $user->role === 'supplier' ? $user->supplier : null;
        $buyer = $user->role === 'buyer' ? $user->buyer : null;

        return view('profile.show', compact('user', 'supplier', 'buyer'));
    }

    /**
     * Menampilkan form untuk mengedit profil.
     */
    public function edit()
    {
        $user = Auth::user()->load(['supplier', 'buyer']);
        return view('profile.edit', compact('user'));
    }

    /**
     * Memperbarui data profil di database.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi data umum (User)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update data User
        $user->update($request->only('name', 'email'));

        // Validasi dan update data spesifik berdasarkan peran
        if ($user->role === 'supplier' && $user->supplier) {
            // Validasi untuk supplier
            $supplierData = $request->validate([
                'region' => 'required|string|max:255',
                'monthly_capacity' => 'required|numeric|min:0',
                'contact_name' => 'required|string|max:255',
                'contact_email' => 'required|email',
                'contact_phone' => 'required|string',
                'annual_sales' => 'nullable|numeric',
                'desired_price' => 'nullable|numeric',
                'years_operation' => 'nullable|integer',
            ]);

            // PERBAIKAN: Gunakan relasi untuk update, lebih efisien
            $user->supplier->update($supplierData);
        } elseif ($user->role === 'buyer' && $user->buyer) {
            // Validasi untuk buyer
            $buyerData = $request->validate([
                'company_name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'contact_person_name' => 'required|string|max:255',
                'contact_person_email' => 'required|email',
                'monthly_purchase_volume' => 'nullable|numeric',
            ]);

            // PERBAIKAN: Gunakan relasi untuk update
            $user->buyer->update($buyerData);
        }

        // Redirect ke halaman profil pengguna setelah berhasil update
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
