<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Buyer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Override method register default untuk menangani upload file.
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // Bungkus proses pembuatan user dan profil dalam transaksi
        $user = DB::transaction(function () use ($request) {
            return $this->create($request); // Kirim seluruh request
        });

        event(new Registered($user));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath())->with('status', 'Registrasi berhasil! Silakan login.');
    }


    protected function validator(array $data)
    {
        // Aturan validasi dasar untuk semua user
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:buyer,supplier'],
        ];

        // Aturan validasi kondisional berdasarkan role
        if (isset($data['role'])) {
            if ($data['role'] === 'buyer') {
                $buyerRules = [
                    'company_name' => ['required', 'string', 'max:255'],
                    'country_region' => ['required', 'string', 'max:255'],
                    'city' => ['required', 'string', 'max:255'],
                    'annual_pks_purchase_volume' => ['required', 'numeric', 'min:0'],
                    'monthly_purchase_volume' => ['required', 'numeric', 'min:0'],
                    'preferred_trade_terms' => ['required', 'string'],
                    'contact_person_name' => ['required', 'string', 'max:255'],
                    'contact_person_email' => ['required', 'email', 'max:255'],
                    'contact_person_phone' => ['required', 'string', 'max:20'],
                    'company_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                    'business_license' => ['nullable', 'file', 'mimes:pdf,jpeg,png,jpg', 'max:2048'],
                    'products_of_interest' => ['nullable', 'array'],
                    'products_of_interest.*' => ['string', 'in:PKS (Raw),PKS Charcoal,Biochar'],
                ];
                $rules = array_merge($rules, $buyerRules);
            } elseif ($data['role'] === 'supplier') {
                // Validasi untuk supplier, termasuk file upload opsional
                $supplierRules = [
                    'factory_name_supplier' => ['required', 'string', 'max:255'],
                    'region_supplier' => ['required', 'string', 'max:255'],
                    'monthly_available_volume' => ['required', 'numeric', 'min:0'],
                    'sales_record_past_1_year' => ['nullable', 'numeric', 'min:0'],
                    'contact_person_supplier' => ['required', 'string', 'max:255'],
                    'email_supplier' => ['required', 'email', 'max:255'],
                    'phone_supplier' => ['required', 'string', 'max:20'],
                    'factory_warehouse_photos.*' => ['nullable', 'image', 'max:2048'],
                    'factory_warehouse_photos' => ['nullable', 'array', 'max:5'],
                    'pks_sample_photos.*' => ['nullable', 'image', 'max:2048'],
                    'pks_sample_photos' => ['nullable', 'array', 'max:5'],
                    'lab_test_report' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
                ];
                $rules = array_merge($rules, $supplierRules);
            }
        }

        return Validator::make($data, $rules);
    }

    /**
     * Buat user baru dan profilnya setelah registrasi valid.
     */
    protected function create(Request $request)
    {
        $data = $request->all();

        // 1. Buat data User
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        // 2. Buat profil terkait (Buyer atau Supplier)
        if ($data['role'] === 'buyer') {
            // Pemetaan data dari form ke model Buyer Anda
            $buyerData = [
                'user_id' => $user->id,
                'company_name' => $data['company_name'],
                'country' => $data['country_region'],
                'city' => $data['city'],
                'annual_purchase_volume' => $data['annual_pks_purchase_volume'],
                'monthly_purchase_volume' => $data['monthly_purchase_volume'],
                'preferred_trade_terms' => $data['preferred_trade_terms'],
                'target_price' => $data['target_price'] ?? null,
                'products_of_interest' => $data['products_of_interest'] ?? [],
                'years_in_operation' => $data['years_in_operation'] ?? null,
                'contact_person_name' => $data['contact_person_name'],
                'contact_person_email' => $data['contact_person_email'],
                'contact_person_phone' => $data['contact_person_phone'],
                'additional_notes' => $data['additional_notes'] ?? null,
            ];

            // Tangani upload file untuk Buyer
            if ($request->hasFile('company_logo')) {
                $buyerData['company_logo_path'] = $request->file('company_logo')->store('logos', 'public');
            }
            if ($request->hasFile('business_license')) {
                $buyerData['business_license_path'] = $request->file('business_license')->store('licenses', 'public');
            }
            if ($request->hasFile('previous_purchase_records')) {
                $buyerData['purchase_records_path'] = $request->file('previous_purchase_records')->store('records', 'public');
            }

            Buyer::create($buyerData);
        } elseif ($data['role'] === 'supplier') {
            // Pemetaan data dari form ke model Supplier Anda
            $supplierData = [
                'user_id' => $user->id,
                'type' => $data['factory_name_supplier'],
                'region' => $data['region_supplier'],
                'monthly_capacity' => $data['monthly_available_volume'],
                'dura_composition' => $data['dura_percentage'] ?? null,
                'tenera_composition' => $data['tenera_percentage'] ?? null,
                'pisifera_composition' => $data['pisifera_percentage'] ?? null,
                'annual_sales' => $data['sales_record_past_1_year'] ?? null,
                'desired_price' => $data['desired_selling_price'] ?? null,
                'years_operation' => $data['years_in_operation_supplier'] ?? null,
                'minimum_order_quantity' => $data['minimum_order_quantity'] ?? null,
                'contact_name' => $data['contact_person_supplier'],
                'contact_email' => $data['email_supplier'],
                'contact_phone' => $data['phone_supplier'],
                'submission_status' => 'pending',
            ];

            // Tangani upload file untuk supplier
            if ($request->hasFile('factory_warehouse_photos')) {
                $paths = [];
                foreach ($request->file('factory_warehouse_photos') as $file) {
                    $paths[] = $file->store('factory_photos', 'public');
                }
                $supplierData['factory_warehouse_photos'] = $paths;
            }
            if ($request->hasFile('pks_sample_photos')) {
                $paths = [];
                foreach ($request->file('pks_sample_photos') as $file) {
                    $paths[] = $file->store('sample_photos', 'public');
                }
                $supplierData['pks_sample_photos'] = $paths;
            }
            if ($request->hasFile('lab_test_report')) {
                $supplierData['lab_test_report_path'] = $request->file('lab_test_report')->store('lab_reports', 'public');
            }

            Supplier::create($supplierData);
        }

        return $user;
    }

    /**
     * User berhasil diregistrasi.
     */
    protected function registered(Request $request, $user)
    {
        return redirect()->route('login')->with('status', 'Registrasi berhasil! Silakan login.');
    }
}
