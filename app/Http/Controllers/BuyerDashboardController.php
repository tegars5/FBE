<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buyer;

class BuyerDashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard untuk buyer.
     */
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Cek apakah user memiliki data buyer yang terkait
        $buyer = $user->buyer;

        // Jika tidak ada data buyer, redirect kembali ke halaman profile edit
        if (!$buyer) {
            return redirect()->route('profile.edit')->with('error', 'Please complete your buyer profile.');
        }

        // Tampilkan halaman dashboard untuk buyer dan pass data buyer
        return view('buyer.dashboard', compact('buyer'));
    }
    public function purchaseRequest()
    {
        // tampilkan form request quote / purchase request
        return view('buyer.purchase-request');
    }
}
