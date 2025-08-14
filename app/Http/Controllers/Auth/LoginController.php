<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function redirectTo()
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 'admin':
                return route('admin.dashboard');
            case 'supplier':
                return route('supplier.dashboard');
            case 'buyer':
                return route('buyer.dashboard');
            default:
                return '/';
        }
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        // =================================================================
        // FIX HERE: Add User Status Check
        // =================================================================
        $user = Auth::user();

        // Check if user status is NOT 'active'
        if ($user->status !== 'active') {
            Auth::logout(); // Force logout so the session is not saved

            // Prepare error message based on user status
            $message = $user->status === 'pending'
                ? 'Your account is waiting for admin verification.'
                : 'Your account is inactive. Please contact the administrator.';

            return redirect('/login')->with('error', $message);
        }
        // =================================================================

        // Logic to link supplier data (only run if user is active)
        if (Session::has('pending_supplier_id')) {
            $supplierId = Session::get('pending_supplier_id');
            $supplier = Supplier::find($supplierId);

            if ($supplier && is_null($supplier->user_id)) {
                $supplier->user_id = Auth::id();
                $supplier->save();
                Session::forget('pending_supplier_id');
                Session::flash('success', 'Supplier information has been successfully linked to your account!');
            } else if ($supplier && !is_null($supplier->user_id) && $supplier->user_id != Auth::id()) {
                Session::forget('pending_supplier_id');
                Session::flash('warning', 'The supplier information is already linked or cannot be linked to this account.');
            } else {
                Session::forget('pending_supplier_id');
            }
        }

        // Redirect using the path from the redirectTo() method
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }
}
