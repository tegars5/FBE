<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buyer; // Pastikan model Buyer di-import dengan benar

class AdminBuyerController extends Controller
{
    /**
     * Menampilkan daftar semua buyer.
     */
    public function index()
    {
        // Mengambil data dari model User yang perannya 'buyer'
        $buyers = User::where('role', 'buyer')->with('buyer')->latest()->get();

        return view('admin.buyers.index', compact('buyers'));
    }

    /**
     * Menampilkan detail spesifik dari satu buyer.
     */
    public function show(Buyer $buyer)
    {
        // Memuat relasi user untuk memastikan data tersedia di view
        $buyer->load('user');
        return view('admin.buyers.show', compact('buyer'));
    }

    /**
     * Menampilkan form untuk mengedit data buyer.
     */
    public function edit(Buyer $buyer)
    {
        $buyer->load('user');
        return view('admin.buyers.edit', compact('buyer'));
    }

    /**
     * Memperbarui data buyer di database.
     */
    public function update(Request $request, Buyer $buyer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', // Dari tabel users
            'company_name' => 'required|string|max:255', // Dari tabel buyers
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        // Update nama di tabel users
        if ($buyer->user) {
            $buyer->user->update(['name' => $validated['name']]);
        }

        // Update data di tabel buyers
        $buyer->update($validated);

        return redirect()->route('admin.buyers.index')->with('success', 'Buyer details have been updated successfully.');
    }

    /**
     * Menghapus data buyer dan akun user terkait.
     */
    public function destroy(Buyer $buyer)
    {
        if ($buyer->user) {
            $buyer->user->delete();
        } else {
            $buyer->delete();
        }

        return redirect()->route('admin.buyers.index')->with('success', 'Buyer has been deleted successfully.');
    }
}
