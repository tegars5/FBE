<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // <-- DITAMBAHKAN
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Supplier; // <-- DITAMBAHKAN
use App\Models\Buyer;    // <-- DITAMBAHKAN

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();
        $data = ['user' => $user];

        if ($user->role === 'supplier') {
            $data['supplier'] = $user->supplier;
        } elseif ($user->role === 'buyer') {
            $data['buyer'] = $user->buyer;
        }

        return view('profile.show', $data);
    }

    /**
     * Menampilkan form untuk mengedit profil.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        $data = ['user' => $user];

        if ($user->role === 'supplier') {
            $data['supplier'] = $user->supplier;
        } elseif ($user->role === 'buyer') {
            $data['buyer'] = $user->buyer;
        }

        return view('profile.edit', $data);
    }

    // ===================================================================
    //            BAGIAN YANG DITAMBAHKAN DIMULAI DARI SINI
    // ===================================================================

    /**
     * Memperbarui data profil di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Validasi data umum (User)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // 2. Update data User
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // 3. Validasi dan update data spesifik berdasarkan peran
        if ($user->role === 'supplier') {
            // Validasi untuk supplier (bisa Anda lengkapi)
            $request->validate([
                'region' => 'required|string|max:255',
                'monthly_capacity' => 'required|numeric|min:0',
                'contact_name' => 'required|string|max:255',
                'contact_email' => 'required|email',
                'contact_phone' => 'required|string',
            ]);

            // Mengambil semua data yang relevan dari request
            $supplierData = $request->only([
                'region',
                'monthly_capacity',
                'dura_composition',
                'tenera_composition',
                'pisifera_composition',
                'annual_sales',
                'desired_price',
                'years_operation',
                'contact_name',
                'contact_email',
                'contact_phone'
            ]);

            // Update data supplier
            Supplier::where('user_id', $user->id)->update($supplierData);
        } elseif ($user->role === 'buyer') {
            // Validasi untuk buyer (bisa Anda lengkapi)
            $request->validate([
                'company_name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'contact_person_name' => 'required|string|max:255',
                'contact_person_email' => 'required|email',
            ]);

            // Mengambil semua data yang relevan dari request
            $buyerData = $request->only([
                'company_name',
                'country',
                'city',
                'years_in_operation',
                'annual_purchase_volume',
                'monthly_purchase_volume',
                'preferred_trade_terms',
                'target_price',
                'products_of_interest',
                'contact_person_name',
                'contact_person_email',
                'contact_person_phone',
                'additional_notes'
            ]);

            // Update data buyer
            Buyer::where('user_id', $user->id)->update($buyerData);
        }

        // 4. Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
