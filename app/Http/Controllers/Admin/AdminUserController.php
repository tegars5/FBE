<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Article;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Menampilkan dashboard admin dengan submissions untuk review.
     */
    public function dashboard()
    {
        $articles = Article::all();
        // Mengambil submissions yang pending (supplier dengan submission_status = 'pending')
        $submissions = Supplier::where('submission_status', 'pending')
            ->with('user')
            ->latest()
            ->get();

        // Jika tidak ada submissions, buat collection kosong
        if (!$submissions) {
            $submissions = collect();
        }

        return view('admin.dashboard', compact('articles', 'submissions'));
    }

    /**
     * Menampilkan daftar semua user yang menunggu verifikasi.
     */
    public function pending()
    {
        $pendingUsers = User::where('status', 'pending')->where('role', '!=', 'admin')->latest()->get();
        return view('admin.users.pending', compact('pendingUsers'));
    }

    /**
     * Menyetujui registrasi user.
     */
    public function approve(User $user)
    {
        $user->status = 'active';
        $user->save();

        return redirect()->route('admin.users.pending')->with('success', 'User ' . $user->name . ' berhasil disetujui.');
    }

    /**
     * Menolak dan menghapus registrasi user.
     */
    public function reject(User $user)
    {
        $userName = $user->name;
        // Menghapus user akan otomatis menghapus data buyer/supplier-nya
        // jika relasi di database sudah diatur dengan onDelete('cascade')
        $user->delete();

        return redirect()->route('admin.users.pending')->with('success', 'User ' . $userName . ' berhasil ditolak dan dihapus.');
    }

    /**
     * Menerima submission dari supplier.
     */
    public function acceptSubmission(Request $request, $supplierId)
    {
        $supplier = Supplier::findOrFail($supplierId);

        $request->validate([
            'accepted_volume' => 'required|numeric|min:0|max:' . $supplier->monthly_capacity,
        ], [
            'accepted_volume.required' => 'Volume yang diterima harus diisi.',
            'accepted_volume.numeric' => 'Volume harus berupa angka.',
            'accepted_volume.min' => 'Volume tidak boleh kurang dari 0.',
            'accepted_volume.max' => 'Volume tidak boleh lebih dari kapasitas yang ditawarkan (' . $supplier->monthly_capacity . ' tons).',
        ]);

        // Update kapasitas bulanan dengan mengurangi jumlah yang diterima
        $supplier->monthly_capacity -= $request->accepted_volume;
        $supplier->submission_status = 'accepted';
        $supplier->save();

        return redirect()->back()->with(
            'success',
            'Submission dari ' . $supplier->user->name . ' berhasil diterima! ' .
                'Volume yang diterima: ' . $request->accepted_volume . ' tons. ' .
                'Kapasitas tersisa: ' . $supplier->monthly_capacity . ' tons.'
        );
    }

    /**
     * Menolak submission dari supplier.
     */
    public function rejectSubmission($supplierId)
    {
        $supplier = Supplier::findOrFail($supplierId);
        $supplierName = $supplier->user->name;

        $supplier->submission_status = 'rejected';
        $supplier->save();

        return redirect()->back()->with(
            'success',
            'Submission dari ' . $supplierName . ' berhasil ditolak.'
        );
    }
}
