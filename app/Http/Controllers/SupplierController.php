<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail; // Add this line
use App\Mail\SupplierSubmissionMail; // Add this line - we'll create this Mailable

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

        if (!Auth::check()) {
            Log::warning('Unauthorized supplier submission attempt (user not logged in).');
            return redirect()->route('login')->with('error', 'Please login first to submit supplier information.');
        }

        try {
            // 1. Validate form data
            $validatedData = $request->validate([
                'supplier_type' => 'required|string|in:mill_factory,collector',
                'region' => 'required|string|max:255',
                'annual_production_volume' => 'nullable|numeric|min:0',
                'monthly_available_volume' => 'required|numeric|min:0',
                'dura_composition' => 'nullable|numeric|min:0|max:100',
                'tenera_composition' => 'nullable|numeric|min:0|max:100',
                'pisifera_composition' => 'nullable|numeric|min:0|max:100',
                'sales_record' => 'nullable|numeric|min:0',
                'desired_selling_price' => 'nullable|string|max:255',
                'minimum_order_quantity' => 'nullable|numeric|min:0',
                'product_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'notes' => 'nullable|string|max:1000',
                'urgent_sale_available' => 'nullable|in:on',
                'factory_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'sample_pks_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'lab_test_report' => 'nullable|file|mimes:pdf,doc,docx,jpeg,png,jpg|max:5120',
            ]);
            Log::info('Validation successful for supplier data.', ['user_id' => Auth::id(), 'data' => array_keys($validatedData)]);
        } catch (ValidationException $e) {
            Log::error('Validation failed for supplier submission.', [
                'user_id' => Auth::id(),
                'errors' => $e->errors(),
                'input' => $request->all()
            ]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        // 2. Handle file uploads to Cloudflare R2 (via S3 driver)
        $productPhotoUrls = [];
        if ($request->hasFile('product_photos')) {
            Log::info('Processing product_photos upload.', ['user_id' => Auth::id()]);
            foreach ($request->file('product_photos') as $photo) {
                try {
                    $path = 'supplier_product_photos';
                    $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $filePath = Storage::disk('s3')->putFileAs($path, $photo, $fileName, 'public');
                    $productPhotoUrls[] = env('AWS_URL') . '/' . $filePath;
                    Log::info('Product photo uploaded successfully to R2.', ['user_id' => Auth::id(), 'path' => $filePath, 'url' => end($productPhotoUrls)]);
                } catch (\Exception $e) {
                    Log::error('Failed to upload product photo to R2.', [
                        'user_id' => Auth::id(),
                        'file_name' => $photo->getClientOriginalName(),
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                    return redirect()->back()->withErrors(['product_photos' => 'Failed to upload product photo: ' . $e->getMessage()])->withInput();
                }
            }
        }

        $factoryPhotoUrls = [];
        if ($request->hasFile('factory_photos')) {
            Log::info('Processing factory_photos upload.', ['user_id' => Auth::id()]);
            if (count($request->file('factory_photos')) > 5) {
                Log::warning('Factory photos upload exceeded limit of 5.', ['user_id' => Auth::id(), 'count' => count($request->file('factory_photos'))]);
                return redirect()->back()->withErrors(['factory_photos' => 'You can only upload a maximum of 5 factory/warehouse photos.'])->withInput();
            }
            foreach ($request->file('factory_photos') as $photo) {
                try {
                    $path = 'supplier_factory_photos';
                    $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $filePath = Storage::disk('s3')->putFileAs($path, $photo, $fileName, 'public');
                    $factoryPhotoUrls[] = env('AWS_URL') . '/' . $filePath;
                    Log::info('Factory photo uploaded successfully to R2.', ['user_id' => Auth::id(), 'path' => $filePath, 'url' => end($factoryPhotoUrls)]);
                } catch (\Exception $e) {
                    Log::error('Failed to upload factory photo to R2.', [
                        'user_id' => Auth::id(),
                        'file_name' => $photo->getClientOriginalName(),
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                    return redirect()->back()->withErrors(['factory_photos' => 'Failed to upload factory photo: ' . $e->getMessage()])->withInput();
                }
            }
        }

        $samplePksPhotoUrls = [];
        if ($request->hasFile('sample_pks_photos')) {
            Log::info('Processing sample_pks_photos upload.', ['user_id' => Auth::id()]);
            foreach ($request->file('sample_pks_photos') as $photo) {
                try {
                    $path = 'supplier_sample_pks_photos';
                    $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $filePath = Storage::disk('s3')->putFileAs($path, $photo, $fileName, 'public');
                    $samplePksPhotoUrls[] = env('AWS_URL') . '/' . $filePath;
                    Log::info('Sample PKS photo uploaded successfully to R2.', ['user_id' => Auth::id(), 'path' => $filePath, 'url' => end($samplePksPhotoUrls)]);
                } catch (\Exception $e) {
                    Log::error('Failed to upload sample PKS photo to R2.', [
                        'user_id' => Auth::id(),
                        'file_name' => $photo->getClientOriginalName(),
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                    return redirect()->back()->withErrors(['sample_pks_photos' => 'Failed to upload sample PKS photo: ' . $e->getMessage()])->withInput();
                }
            }
        }

        $labTestReportUrl = null;
        if ($request->hasFile('lab_test_report')) {
            Log::info('Processing lab_test_report upload.', ['user_id' => Auth::id()]);
            try {
                $file = $request->file('lab_test_report');
                $path = 'supplier_lab_reports';
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $filePath = Storage::disk('s3')->putFileAs($path, $file, $fileName, 'public');
                $labTestReportUrl = env('AWS_URL') . '/' . $filePath;
                Log::info('Lab test report uploaded successfully to R2.', ['user_id' => Auth::id(), 'path' => $filePath, 'url' => $labTestReportUrl]);
            } catch (\Exception $e) {
                Log::error('Failed to upload lab test report to R2.', [
                    'user_id' => Auth::id(),
                    'file_name' => $file->getClientOriginalName(),
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
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
}
