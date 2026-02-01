<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buyer;
use App\Models\Supplier;

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

    /**
     * Menampilkan form purchase request
     */
    public function purchaseRequest()
    {
        return view('buyer.purchase-request');
    }

    /**
     * Menyimpan purchase request
     */
    public function storePurchaseRequest(Request $request)
    {
        $validated = $request->validate([
            'product_type' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'delivery_date' => 'required|date|after:today',
            'notes' => 'nullable|string',
        ]);

        // Simpan purchase request logic disini
        // Misalnya: PurchaseRequest::create($validated + ['buyer_id' => Auth::user()->buyer->id]);

        return redirect()->route('buyer.dashboard')->with('success', 'Purchase request submitted successfully!');
    }

    /**
     * Menampilkan daftar purchase orders
     */
    public function purchaseOrders()
    {
        $buyer = Auth::user()->buyer;
        // Ambil purchase orders dari database
        // $orders = PurchaseOrder::where('buyer_id', $buyer->id)->get();
        
        return view('buyer.purchase-orders', compact('buyer'));
    }

    /**
     * Menampilkan form request quote
     */
    public function requestQuote()
    {
        return view('buyer.request-quote');
    }

    /**
     * Menyimpan request quote
     */
    public function storeQuote(Request $request)
    {
        $validated = $request->validate([
            'product_type' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'target_price' => 'nullable|numeric',
            'message' => 'nullable|string',
        ]);

        // Simpan quote request logic disini
        // Misalnya: QuoteRequest::create($validated + ['buyer_id' => Auth::user()->buyer->id]);

        return redirect()->route('buyer.dashboard')->with('success', 'Quote request submitted successfully!');
    }

    /**
     * Menampilkan katalog produk
     */
    public function productsCatalog()
    {
        // Ambil semua supplier yang approved
        $suppliers = Supplier::where('submission_status', 'approved')
            ->with('user')
            ->get();

        return view('buyer.products-catalog', compact('suppliers'));
    }
}
