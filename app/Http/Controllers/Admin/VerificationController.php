<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage; // <<< TAMBAHKAN BARIS INI
use App\Mail\BuyerVerificationConfirmation;
// use App\Mail\BuyerRejectionNotification; // Buat ini jika ingin kirim email penolakan

class VerificationController extends Controller
{
    // ... sisa kode Anda
    public function rejectBuyer(Request $request, User $user)
    {
        if ($user->role === 'buyer' && !$user->is_verified) {
            if ($user->buyer) {
                // Opsional: Hapus file terkait jika ada
                if ($user->buyer->business_license) {
                    Storage::disk('public')->delete($user->buyer->business_license); // <<< Gunakan Storage::, bukan \Storage::
                }
                if ($user->buyer->company_logo) {
                    Storage::disk('public')->delete($user->buyer->company_logo); // <<< Gunakan Storage::, bukan \Storage::
                }
                if ($user->buyer->previous_purchase_records) {
                    Storage::disk('public')->delete($user->buyer->previous_purchase_records); // <<< Gunakan Storage::, bukan \Storage::
                }
                $user->buyer->delete();
            }
            $user->delete();

            // Opsional: Kirim email penolakan
            // Mail::to($user->email)->send(new BuyerRejectionNotification($user, $request->comments));

            return redirect()->back()->with('success', 'Pendaftaran buyer ' . $user->name . ' telah ditolak dan dihapus.');
        }

        return redirect()->back()->with('error', 'Gagal menolak pendaftaran buyer atau buyer sudah diverifikasi.');
    }
}
