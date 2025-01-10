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
use GuzzleHttp\Client;
// use Illuminate\Routing\Controller as BaseController;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Cek apakah cookie id_user dan password ada
        if (!isset($_COOKIE['id_user']) || !isset($_COOKIE['password'])) {
            return redirect('https://portal.triasmitra.com/public/dashboard');
        }

        $client = new Client();

        // print_r($_COOKIE);  
        // dd($response->json());

        $user = $_COOKIE['id_user'];
        $pass = $_COOKIE['password'];
        // dd($user);

        $credentials = [
            'nik' => $user,
            'password' => $pass
        ];

        // Kirim request ke API eksternal
        $response = Http::asForm()->post('https://employee.triasmitra.com/restric/login_api_nohash.php', $credentials);

        // dd($response);

        if ($response->successful()) {
            $data = $response->json(); // Ambil respon dalam format JSON
            // dd($data);
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
                        // 'id' => '88',
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

    public function login(Request $request)
    {

        // dd($response->json());
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
        // print_r($_COOKIE);
        // echo $_COOKIE['id_user'];
        // if ($_COOKIE['id_user'] && $_COOKIE['password']) {

        //     $credentials = [
        //         'nik' => $_COOKIE['id_user'],
        //         'password' => $_COOKIE['password'],
        //     ];

        //     // Kirim request ke API eksternal
        //     $response = Http::asForm()->post('https://employee.triasmitra.com/restric/login_api_nohash.php', $credentials);

        //     if ($response->successful()) {
        //         $data = $response->json(); // Ambil respon dalam format JSON

        //         if (isset($data['Success']) && $data['Success'] == true) {
        //             // Simpan atau update data user ke tabel lokal
        //             $user = User::updateOrCreate(
        //                 ['nik' => $data['nik']], // Unique identifier
        //                 [
        //                     'nama' => $data['nama'],
        //                     'email' => $data['email'],
        //                     'telp' => $data['telp'],
        //                     'foto' => $data['foto'],
        //                     'password' => bcrypt($credentials['password']), // Hash password
        //                     'id_role' => $data['id_role'],
        //                     'divisi' => $data['divisi'],
        //                     'company' => $data['company'],
        //                     'jabatan' => $data['jabatan'],
        //                 ]
        //             );

        //             // Login user menggunakan Auth
        //             Auth::login($user);

        //             return redirect()->intended('dashboard')->with('success', 'Login berhasil!');
        //         } else {
        //             // return redirect()->route('login');
        //             // echo 'atau disini';
        //             $data = $response->json();
        //             echo '<pre>';
        //             print_r($credentials);
        //             print_r($data);
        //             echo '</pre>';
        //         }
        //     } else {
        //         $data = $response->json();
        //         echo '<pre>';
        //         print_r($credentials);
        //         print_r($data);
        //         echo '</pre>';
        //         echo 'disini ';
        //         // return redirect()->route('login');
        //     }
        //     echo 'ada';

        // Cek apakah pengguna sudah login
        // if (!auth()->check()) {
        //     // Jika belum login, redirect ke halaman login
        //     return redirect()->route('login'); // Atau gunakan route yang sesuai
        // }
        // dd(Auth::user());
        return view('dashboard');
    }
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('https://portal.triasmitra.com/public/dashboard');
    }
}