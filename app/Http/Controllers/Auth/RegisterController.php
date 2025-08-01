<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Buyer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; // Pastikan ini di-import
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BuyerRegistrationNotification;
use App\Mail\BuyerVerificationConfirmation;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/registration-success';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        // ... (aturan validasi Anda tetap sama) ...
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:buyer,supplier'],
        ];

        if (isset($data['role']) && $data['role'] === 'buyer') {
            $rules = array_merge($rules, [
                'company_name' => ['required', 'string', 'max:255'],
                'country_region' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'annual_pks_purchase_volume' => ['nullable', 'integer', 'min:0'],
                'monthly_purchase_volume' => ['nullable', 'integer', 'min:0'],
                'preferred_trade_terms' => ['nullable', 'string'],
                'target_price' => ['nullable', 'numeric', 'min:0'],
                'products_of_interest' => ['nullable', 'array'],
                'products_of_interest.*' => ['string'],
                'years_in_operation' => ['nullable', 'integer', 'min:0'],
                'business_license' => ['nullable', 'file', 'mimes:pdf,jpeg,png,jpg', 'max:2048'],
                'contact_person_name' => ['required', 'string', 'max:255'],
                'contact_person_email' => ['required', 'string', 'email', 'max:255'],
                'contact_person_phone_number' => ['nullable', 'string', 'max:255'],
                'additional_notes' => ['nullable', 'string'],
                'company_logo' => ['nullable', 'file', 'mimes:jpeg,png,jpg', 'max:2048'],
                'previous_purchase_records' => ['nullable', 'file', 'mimes:pdf,jpeg,png,jpg', 'max:2048'],
            ]);
        }

        return Validator::make($data, $rules);
    }

    // === PERUBAHAN DI SINI: TAMBAHKAN Request $request sebagai parameter kedua ===
    protected function create(array $data)
    {
        // Pastikan Request $request di-inject ke method ini
        $request = app(Request::class); // <-- Tambahkan ini untuk mendapatkan instance Request

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'is_verified' => false,
        ]);

        if ($data['role'] === 'buyer') {
            $businessLicensePath = null;
            // Sekarang $request bisa diakses
            if ($request->hasFile('business_license')) {
                $businessLicensePath = $request->file('business_license')->store('buyer_documents', 'public');
            }

            $companyLogoPath = null;
            if ($request->hasFile('company_logo')) {
                $companyLogoPath = $request->file('company_logo')->store('buyer_logos', 'public');
            }

            $previousPurchaseRecordsPath = null;
            if ($request->hasFile('previous_purchase_records')) {
                $previousPurchaseRecordsPath = $request->file('previous_purchase_records')->store('buyer_purchase_records', 'public');
            }

            Buyer::create([
                'user_id' => $user->id,
                'company_name' => $data['company_name'],
                'country_region' => $data['country_region'],
                'city' => $data['city'],
                'annual_pks_purchase_volume' => $data['annual_pks_purchase_volume'] ?? null,
                'monthly_purchase_volume' => $data['monthly_purchase_volume'] ?? null,
                'preferred_trade_terms' => $data['preferred_trade_terms'] ?? null,
                'target_price' => $data['target_price'] ?? null,
                'products_of_interest' => $data['products_of_interest'] ?? [],
                'years_in_operation' => $data['years_in_operation'] ?? null,
                'business_license' => $businessLicensePath,
                'contact_person_name' => $data['contact_person_name'],
                'contact_person_email' => $data['contact_person_email'],
                'contact_person_phone_number' => $data['contact_person_phone_number'] ?? null,
                'additional_notes' => $data['additional_notes'] ?? null,
                'company_logo' => $companyLogoPath,
                'previous_purchase_records' => $previousPurchaseRecordsPath,
                'is_verified' => false,
            ]);

            Mail::to(env('ADMIN_EMAIL', 'tegar0651@gmail.com'))->send(new BuyerRegistrationNotification($user));
        }

        if ($data['role'] === 'supplier') {
            if (Session::has('pending_supplier_id')) {
                $supplierId = Session::get('pending_supplier_id');
                $supplier = Supplier::find($supplierId);
                if ($supplier) {
                    $supplier->user_id = $user->id;
                    $supplier->save();
                }
                Session::forget('pending_supplier_id');
            }
        }

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        Auth::logout();
        return redirect($this->redirectPath())->with('status', 'Pendaftaran berhasil! Akun Anda akan diverifikasi oleh admin sebelum dapat login. Notifikasi akan dikirim via email.');
    }
}
