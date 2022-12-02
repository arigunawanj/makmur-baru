<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function utama()
    {
        //Mengambil seluruh data user
        $user = User::all();

        // Pergi ke Halaman User dan membawa data user
        return view('user', compact('user'));
    }

   
    public function perbarui(Request $request, User $user)
    {
        // Memvalidasi value didalam form
        $data = $request->validate([
            'role' => 'required'
        ]);

        // Jika berhasil divalidasi akan diupdate
        $user->update($data);

        // Jika berhasil di update akan dialihkan ke halaman user
        return redirect('user');
    }


}
