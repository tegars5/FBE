<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SupplierSubmissionMail;

class SupplierController extends Controller
{
    public function showForm()
    {
        return view('supplier.mill-factory-form');
    }
    public function showCollectorForm()
    {
        return view('supplier.collector-form');
    }
    /**
     * Store a newly created or updated supplier in storage.
     */
    public function store(Request $request)
    {
        Log::info('Supplier submission attempt initiated.', ['user_id' => Auth::id()]);

        // 1. Validate request input
        $validatedData = $request->validate([
            'mill_region' => 'required|string|max:255',
            'mill_monthly_capacity' => 'required|numeric',
            'mill_dura' => 'nullable|numeric|min:0|max:100',
            'mill_tenera' => 'nullable|numeric|min:0|max:100',
            'mill_pisifera' => 'nullable|numeric|min:0|max:100',
            'mill_annual_sales' => 'required|numeric',
            'mill_desired_price' => 'required|numeric',
            'mill_years_operation' => 'required|integer|min:0',
            'mill_contact_name' => 'required|string|max:255',
            'mill_contact_email' => 'required|email|max:255',
            'mill_contact_phone' => 'required|string|max:255',
            'product_photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'factory_photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sample_pks_photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lab_test_report' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
        ]);

        // Helper function for file uploads
        $uploadFiles = function ($files, $folder) {
            $uploadedUrls = [];
            if (!empty($files)) {
                foreach ((array) $files as $file) {
                    $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                    $filePath = Storage::disk('s3')->putFileAs($folder, $file, $fileName, 'public');
                    $uploadedUrls[] = env('AWS_URL') . '/' . $filePath;
                    Log::info("File uploaded to S3", ['folder' => $folder, 'path' => $filePath]);
                }
            }
            return $uploadedUrls;
        };

        // Prepare main supplier data
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
            'product_photos' => $uploadFiles($request->file('product_photos'), 'supplier_product_photos'),
            'factory_photos' => $uploadFiles($request->file('factory_photos'), 'supplier_factory_photos'),
            'sample_pks_photos' => $uploadFiles($request->file('sample_pks_photos'), 'supplier_sample_pks_photos'),
            'lab_test_report' => $request->hasFile('lab_test_report')
                ? $uploadFiles($request->file('lab_test_report'), 'supplier_lab_reports')[0] ?? null
                : null,
        ];

        // Check for existing supplier by email
        $existingSupplierByEmail = Supplier::where('contact_email', $supplierData['contact_email'])->first();

        if (Auth::check()) {
            // --- CASE: USER LOGGED IN ---
            if ($existingSupplierByEmail && $existingSupplierByEmail->user_id !== Auth::id()) {
                return redirect()->back()->withInput()->withErrors([
                    'mill_contact_email' => 'This email is already registered as a supplier by another account. If this is new data, please use a different email or delete the existing entry.'
                ]);
            } elseif ($existingSupplierByEmail && $existingSupplierByEmail->user_id === Auth::id()) {
                // Update existing supplier
                try {
                    $existingSupplierByEmail->update($supplierData);
                    return redirect()->route('supplier.dashboard')->with('success', 'Your Mill Factory information has been successfully updated!');
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while updating supplier information: ' . $e->getMessage()]);
                }
            } else {
                // Create new supplier record linked to this logged-in user
                $supplierData['user_id'] = Auth::id();
                try {
                    Supplier::create($supplierData);
                    return redirect()->route('supplier.dashboard')->with('success', 'Your Mill Factory information has been submitted successfully!');
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while saving new supplier information: ' . $e->getMessage()]);
                }
            }
        } else {
            // --- CASE: USER NOT LOGGED IN ---
            if ($existingSupplierByEmail) {
                return redirect()->route('login')->withErrors([
                    'email' => 'This email is already registered as a supplier. Please login.'
                ])->withInput(['email' => $supplierData['contact_email']]);
            } else {
                try {
                    $supplier = Supplier::create($supplierData);
                    Session::put('pending_supplier_id', $supplier->id);
                    return redirect()->route('register')->with([
                        'email' => $supplierData['contact_email'],
                        'name' => $supplierData['contact_name'],
                        'message' => 'Please complete your registration to create an account and link it with your supplier information.'
                    ]);
                } catch (\Exception $e) {
                    return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while saving supplier information: ' . $e->getMessage()]);
                }
            }
        }
    }
}
