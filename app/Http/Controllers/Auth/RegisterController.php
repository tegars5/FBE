<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; // Pastikan ini diimpor
use Illuminate\Support\Facades\Session; // Pastikan ini diimpor
use App\Models\Supplier; 

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        // Cek apakah ada ID supplier yang tertunda di sesi
        if (Session::has('pending_supplier_id')) {
            $supplierId = Session::get('pending_supplier_id');

            // Temukan record supplier berdasarkan ID
            $supplier = Supplier::find($supplierId);

            if ($supplier) {
                // Update user_id di tabel suppliers dengan ID user yang baru terdaftar
                $supplier->user_id = $user->id;
                $supplier->save();
            }

            // Hapus ID supplier dari sesi setelah digunakan
            Session::forget('pending_supplier_id');
        }

        // Lanjutkan dengan redirect default Laravel (ke halaman home)
        return redirect($this->redirectPath());
    }
}
