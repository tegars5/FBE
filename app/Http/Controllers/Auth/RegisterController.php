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
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        // Debug: Log data yang diterima
        Log::info('Registration data received:', $request->all());

        $this->validator($request->all())->validate();
        $user = DB::transaction(fn() => $this->create($request));
        event(new Registered($user));
        return redirect($this->redirectPath())->with('status', 'Registration successful! Your account will be activated after verification by the admin.');
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:buyer,supplier'],
        ];

        if (isset($data['role'])) {
            if ($data['role'] === 'buyer') {
                $buyerRules = [
                    'company_name' => ['required', 'string', 'max:255'],
                    'country_region' => ['required', 'string', 'max:255'],
                    'city' => ['required', 'string', 'max:255'],
                    'annual_pks_purchase_volume' => ['required', 'numeric', 'min:0'],
                    'monthly_purchase_volume' => ['required', 'numeric', 'min:0'],
                    'preferred_trade_terms' => ['required', 'string'],
                    'target_price' => ['nullable', 'numeric', 'min:0'],
                    'products_of_interest' => ['nullable', 'array'],
                    'years_in_operation' => ['nullable', 'numeric', 'min:0'],
                    'contact_person_name' => ['required', 'string', 'max:255'],
                    'contact_person_email' => ['required', 'email', 'max:255'],
                    'contact_person_phone' => ['required', 'string', 'max:20'],
                    'additional_notes' => ['nullable', 'string'],
                ];
                $rules = array_merge($rules, $buyerRules);
            } elseif ($data['role'] === 'supplier') {
                $supplierRules = [
                    // PERBAIKAN: Gunakan nama field yang sesuai dengan form HTML
                    'supplier_type' => ['required', 'string', 'in:Mill Factory,Collector'],
                    'supplier_company_name' => ['required', 'string', 'max:255'],
                    'region_supplier' => ['required', 'string', 'max:255'],
                    'annual_production_volume' => ['nullable', 'numeric', 'min:0'],
                    'monthly_available_volume' => ['required', 'numeric', 'min:0'],
                    'dura_percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
                    'tenera_percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
                    'pisifera_percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
                    'sales_record_past_1_year' => ['nullable', 'numeric', 'min:0'],
                    'desired_selling_price' => ['nullable', 'numeric', 'min:0'],
                    'minimum_order_quantity' => ['nullable', 'numeric', 'min:0'],
                    'years_in_operation_supplier' => ['nullable', 'numeric', 'min:0'],
                    'contact_person_supplier' => ['required', 'string', 'max:255'],
                    'email_supplier' => ['required', 'email', 'max:255'],
                    'phone_supplier' => ['required', 'string', 'max:20'],
                    'notes_supplier' => ['nullable', 'string'],

                    // File uploads (optional)
                    'factory_warehouse_photos' => ['nullable', 'array', 'max:5'],
                    'factory_warehouse_photos.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                    'pks_sample_photos' => ['nullable', 'array', 'max:5'],
                    'pks_sample_photos.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                    'lab_test_report' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
                ];
                $rules = array_merge($rules, $supplierRules);
            }
        }

        return Validator::make($data, $rules);
    }

    protected function create(Request $request)
    {
        $data = $request->all();

        // Debug: Log semua data sebelum membuat user
        Log::info('Creating user with role: ' . $data['role']);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'status' => 'pending',
        ]);

        Log::info('User created with ID: ' . $user->id);

        if ($data['role'] === 'buyer') {
            Buyer::create([
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
            ]);
        } elseif ($data['role'] === 'supplier') {
            // PERBAIKAN: Sesuaikan dengan struktur database yang ada
            $supplierData = [
                'user_id' => $user->id,
                'type' => $data['supplier_type'],
                'company_name' => $data['supplier_company_name'],
                'region' => $data['region_supplier'],
                'monthly_capacity' => $data['monthly_available_volume'],
                'accepted_volume' => $data['annual_production_volume'] ?? null, // Sesuai field database
                'annual_sales' => $data['sales_record_past_1_year'] ?? null,
                'contact_name' => $data['contact_person_supplier'],
                'contact_email' => $data['email_supplier'],
                'contact_phone' => $data['phone_supplier'],
                'submission_status' => 'pending',
                'dura_composition' => $data['dura_percentage'] ?? null,
                'tenera_composition' => $data['tenera_percentage'] ?? null,
                'pisifera_composition' => $data['pisifera_percentage'] ?? null,
                'desired_price' => $data['desired_selling_price'] ?? null,
                'years_operation' => $data['years_in_operation_supplier'] ?? null,
                'minimum_order_quantity' => $data['minimum_order_quantity'] ?? null,

                // Field untuk file uploads - simpan path nanti setelah upload
                'factory_warehouse_photos' => null, // Will be processed if files uploaded
                'pks_sample_photos' => null, // Will be processed if files uploaded  
                'lab_test_report_path' => null, // Will be processed if file uploaded
            ];

            // Debug: Log data supplier sebelum disimpan
            Log::info('Creating supplier with data:', $supplierData);

            $supplier = Supplier::create($supplierData);
            Log::info('Supplier created with ID: ' . $supplier->id);
        }

        return $user;
    }
}
