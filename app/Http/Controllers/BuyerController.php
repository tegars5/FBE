<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    /**
     * Menampilkan halaman purchase orders untuk buyer
     */
    public function purchaseOrders()
    {
        $user = Auth::user();

        // Ambil purchase orders milik buyer yang sedang login
        // Sesuaikan dengan model dan relasi yang Anda gunakan
        $purchaseOrders = collect(); // Ganti dengan query yang sesuai
        // Contoh: $purchaseOrders = PurchaseOrder::where('buyer_id', $user->id)->get();

        return view('buyer.purchase-orders', compact('purchaseOrders'));
    }

    /**
     * Menampilkan halaman request quote untuk buyer
     */
    public function requestQuote()
    {
        $user = Auth::user();

        // Data yang mungkin diperlukan untuk form request quote
        $suppliers = collect(); // Ganti dengan query supplier
        // Contoh: $suppliers = User::where('role', 'supplier')->get();

        $products = collect(); // Ganti dengan query produk
        // Contoh: $products = Product::all();

        return view('buyer.request-quote', compact('suppliers', 'products'));
    }

    /**
     * Menampilkan halaman order history untuk buyer
     */
    public function orderHistory()
    {
        $user = Auth::user();

        // Ambil riwayat order buyer
        $orderHistory = collect(); // Ganti dengan query yang sesuai
        // Contoh: $orderHistory = Order::where('buyer_id', $user->id)
        //                              ->orderBy('created_at', 'desc')
        //                              ->get();

        return view('buyer.order-history', compact('orderHistory'));
    }
}
