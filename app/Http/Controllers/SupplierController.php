<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
class SupplierController extends Controller
{
    /**
     * Store a newly created supplier in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Log::info('Supplier submission attempt initiated.', ['user_id' => Auth::id()]);
        // Mapping validated data keys to model fillable keys
        $supplierData = [
            'region' => $validatedData['mill_region'],
            'monthly_capacity' => $validatedData['mill_monthly_capacity'],
            'dura_composition' => $validatedData['mill_dura'] ?? 0,
            'tenera_composition' => $validatedData['mill_tenera'] ?? 0,
            'pisifera_composition' => $validatedData['mill_pisifera'] ?? 0,
            'annual_sales' => $validatedData['mill_annual_sales'],
            'desired_price' => $validatedData['mill_desired_price'],
            'years_operation' => $validatedData['mill_years_operation'],
            'contact_name' => $validatedData['mill_contact_name'],
            'contact_email' => $validatedData['mill_contact_email'],
            'contact_phone' => $validatedData['mill_contact_phone'],
            'type' => 'Mill Factory',
        ];

        // Cek apakah ada supplier dengan email yang sama.
        $existingSupplierByEmail = Supplier::where('contact_email', $supplierData['contact_email'])->first();

        if (Auth::check()) {
            // Pengguna sudah login
            if ($existingSupplierByEmail && $existingSupplierByEmail->user_id !== Auth::id()) {
                // Email ini sudah terdaftar sebagai supplier oleh akun lain.
                return redirect()->back()->withInput()->withErrors(['mill_contact_email' => 'This email is already registered as a supplier by another account. If this is new data, please use a different email or delete the existing entry.']);
            } elseif ($existingSupplierByEmail && $existingSupplierByEmail->user_id === Auth::id()) {
                // Email ini sudah terdaftar dan terkait dengan akun yang sedang login.
                // Dalam kasus ini, kita update entri yang ada karena ini kemungkinan adalah pembaruan data yang sama
                try {
                    $path = 'supplier_product_photos';
                    $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $filePath = Storage::disk('s3')->putFileAs($path, $photo, $fileName, 'public');
                    $productPhotoUrls[] = env('AWS_URL') . '/' . $filePath;
                    Log::info('Product photo uploaded successfully to R2.', ['user_id' => Auth::id(), 'path' => $filePath, 'url' => end($productPhotoUrls)]);
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while updating supplier information: ' . $e->getMessage()]);
                }
                return redirect()->route('supplier.dashboard')->with('success', 'Your Mill Factory information has been successfully updated!');
            } else {
                // Email belum terdaftar sebagai supplier, atau terdaftar tapi user_id-nya null.
                // Buat supplier baru dan hubungkan dengan pengguna yang login.
                $supplierData['user_id'] = Auth::id(); // Langsung hubungkan dengan pengguna yang login
                try {
                    $path = 'supplier_factory_photos';
                    $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $filePath = Storage::disk('s3')->putFileAs($path, $photo, $fileName, 'public');
                    $factoryPhotoUrls[] = env('AWS_URL') . '/' . $filePath;
                    Log::info('Factory photo uploaded successfully to R2.', ['user_id' => Auth::id(), 'path' => $filePath, 'url' => end($factoryPhotoUrls)]);
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while saving new supplier information: ' . $e->getMessage()]);
                }
                return redirect()->route('supplier.dashboard')->with('success', 'Your Mill Factory information has been submitted successfully!');
            }
        } else {
            // Pengguna belum login
            if ($existingSupplierByEmail) {
                // Email sudah terdaftar sebagai supplier oleh siapapun (termasuk yang belum terhubung user_id).
                // Arahkan ke halaman login.
                return redirect()->route('login')->withErrors(['email' => 'This email is already registered as a supplier. Please login.'])->withInput(['email' => $supplierData['contact_email']]);
            } else {
                // Email belum terdaftar. Buat record supplier tanpa user_id dulu, lalu arahkan ke pendaftaran.
                try {
                    $path = 'supplier_sample_pks_photos';
                    $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $filePath = Storage::disk('s3')->putFileAs($path, $photo, $fileName, 'public');
                    $samplePksPhotoUrls[] = env('AWS_URL') . '/' . $filePath;
                    Log::info('Sample PKS photo uploaded successfully to R2.', ['user_id' => Auth::id(), 'path' => $filePath, 'url' => end($samplePksPhotoUrls)]);
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while saving supplier information: ' . $e->getMessage()]);
                }
            }
        }
                Session::put('pending_supplier_id', $supplier->id);
                return redirect()->route('register')->with([
                    'email' => $supplierData['contact_email'],
                    'name' => $supplierData['contact_name'],
                    'message' => 'Please complete your registration to create an account and link it with your supplier information.'
                ]);
                return redirect()->back()->withErrors(['lab_test_report' => 'Failed to upload lab report: ' . $e->getMessage()])->withInput();
            }
        }

        // 3. Prepare data for saving or updating
        $supplierData = [
            'user_id' => Auth::id(),
            'supplier_type' => $validatedData['supplier_type'],
            'region' => $validatedData['region'],
            'annual_production_volume' => $validatedData['annual_production_volume'] ?? null,
            'monthly_available_volume' => $validatedData['monthly_available_volume'],
            'dura_composition' => $validatedData['dura_composition'] ?? null,
            'tenera_composition' => $validatedData['tenera_composition'] ?? null,
            'pisifera_composition' => $validatedData['pisifera_composition'] ?? null,
            'sales_record' => $validatedData['sales_record'] ?? null,
            'desired_selling_price' => $validatedData['desired_selling_price'] ?? null,
            'minimum_order_quantity' => $validatedData['minimum_order_quantity'] ?? null,
            // Important: Since the model already uses 'array' casting, DO NOT json_encode() here.
            // Let Laravel automatically convert the array to JSON when saving to the database.
            'product_photos' => !empty($productPhotoUrls) ? $productPhotoUrls : null,
            'notes' => $validatedData['notes'] ?? null,
            'urgent_sale_available' => $request->has('urgent_sale_available') && $request->urgent_sale_available === 'on',
            'factory_photos' => !empty($factoryPhotoUrls) ? $factoryPhotoUrls : null,
            'sample_pks_photos' => !empty($samplePksPhotoUrls) ? $samplePksPhotoUrls : null,
            'lab_test_report' => $labTestReportUrl,
        ];

        Log::info('Attempting to save supplier data to database.', [
            'user_id' => Auth::id(),
            'data_to_save' => $supplierData
        ]);

        // 4. Create or update Supplier record
        try {
            $supplier = Supplier::updateOrCreate(
                ['user_id' => Auth::id()], // Search condition
                $supplierData              // Data to be filled/updated
            );
            Log::info('Supplier information saved successfully.', ['user_id' => Auth::id(), 'supplier_id' => $supplier->id]);

            // --- NEW: Send Email Notification ---
            try {
                // Prepare data for the email
                $emailData = [
                    'supplier' => $supplier,
                    'user' => Auth::user(), // Get the currently authenticated user
                    'submission_ip' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'submission_time' => now()
                ];

                // Send email to your designated recipient (e.g., 'tegar0651@gmail.com')
                Mail::to('tegar0651@gmail.com')->send(new SupplierSubmissionMail($emailData));

                Log::info('Supplier submission email notification sent successfully.', [
                    'user_id' => Auth::id(),
                    'supplier_id' => $supplier->id,
                    'email_recipient' => 'tegar0651@gmail.com'
                ]);
            } catch (\Exception $emailException) {
                // Log the email failure but don't stop the main process
                Log::error('Failed to send supplier submission email notification.', [
                    'user_id' => Auth::id(),
                    'supplier_id' => $supplier->id,
                    'error' => $emailException->getMessage(),
                    'trace' => $emailException->getTraceAsString()
                ]);
            }
            // --- END NEW ---

            return redirect()->route('supplier.formFactory')->with('success', 'Supplier information successfully submitted!');
        } catch (\Exception $e) {
            Log::error('Failed to save supplier information to database.', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data_attempted_to_save' => $supplierData
            ]);
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while saving supplier information: ' . $e->getMessage()]);
        }
    }
    public function showForm()
    {
        // Cek apakah user sudah login dan memiliki data supplier
        $supplier = Supplier::where('user_id', Auth::id())->first();

        // Jika supplier ditemukan, tampilkan data supplier di form
        return view('supplier.mill-factory-form', compact('supplier'));
    }

    public function showCollectorForm()
    {
        // Cek apakah user sudah login dan memiliki data supplier
        $supplier = Supplier::where('user_id', Auth::id())->first();

        return view('supplier.collector-form', compact('supplier'));
    }
}
