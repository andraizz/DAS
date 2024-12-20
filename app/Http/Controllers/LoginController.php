<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Pegawai;
use RealRashid\SweetAlert\Facades\Alert;
use Log;
// use Illuminate\Routing\Controller as BaseController;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'nik' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        // Kirim request ke API eksternal
        $response = Http::asForm()->post('https://employee.triasmitra.com/restric/login_api.php', $credentials);

        // dd($response->json());

        if ($response->successful()) {
            $data = $response->json(); // Ambil respon dalam format JSON

            if (isset($data['Success']) && $data['Success'] == true) {
                // Simpan atau update data user ke tabel lokal
                $user = User::updateOrCreate(
                    ['nik' => $data['nik']], // Unique identifier
                    [
                        'nama' => $data['nama'],
                        'email' => $data['email'],
                        'telp' => $data['telp'],
                        'foto' => $data['foto'],
                        'password' => bcrypt($credentials['password']), // Hash password
                        'id_role' => $data['id_role'],
                        'divisi' => $data['divisi'],
                        'company' => $data['company'],
                        'jabatan' => $data['jabatan'],
                    ]
                );

                // Login user menggunakan Auth
                Auth::login($user);

                return redirect()->intended('dashboard')->with('success', 'Login berhasil!');
            } else {
                return redirect()->back()->with('error', $data['message'] ?? 'NIK atau Password salah.');
            }
        }

        return redirect()->back()->with('error', 'NIK atau Password salah.');
    }



    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
