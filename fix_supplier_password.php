<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

echo "=== Fixing User Accounts ===\n\n";

// Update supplier password and email verification
$supplier = User::where('email', 'supplier@example.com')->first();
if ($supplier) {
    $supplier->password = Hash::make('password');
    $supplier->email_verified_at = now();
    $supplier->status = 'active';
    $supplier->is_verified = 1;
    $supplier->save();
    echo "✓ Password and verification updated for supplier@example.com\n";
    echo "  Password: password\n";
    echo "  Status: {$supplier->status}\n";
    echo "  Is verified: {$supplier->is_verified}\n\n";
}

// Update buyer password and email verification
$buyer = User::where('email', 'buyer@example.com')->first();
if ($buyer) {
    $buyer->password = Hash::make('password');
    $buyer->email_verified_at = now();
    $buyer->status = 'active';
    $buyer->is_verified = 1;
    $buyer->save();
    echo "✓ Password and verification updated for buyer@example.com\n";
    echo "  Password: password\n";
    echo "  Status: {$buyer->status}\n";
    echo "  Is verified: {$buyer->is_verified}\n\n";
}

// Update admin password
$admin = User::where('email', 'admin@fujiyama.com')->first();
if ($admin) {
    $admin->password = Hash::make('admin123');
    $admin->email_verified_at = now();
    $admin->status = 'active';
    $admin->is_verified = 1;
    $admin->save();
    echo "✓ Password and verification updated for admin@fujiyama.com\n";
    echo "  Password: admin123\n";
    echo "  Status: {$admin->status}\n";
    echo "  Is verified: {$admin->is_verified}\n\n";
}

echo "=== All accounts fixed! ===\n";

