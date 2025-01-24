<?php

namespace App\Http\Controllers;

use App\Models\MasterAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMasterAdminRequest;
use App\Http\Requests\UpdateMasterAdminRequest;

class MasterAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function skTujuan()
    {
        try {
            $tujuanList = DB::table('sk_tujuan')->get();

            return view('admin.outgoing-mail.tujuan', compact('tujuanList'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data: ' . $e->getMessage());
        }
    }

    public function skPerihal()
    {
        try {
            $perihalList = DB::table('sk_perihal')->get();

            return view('admin.outgoing-mail.perihal', compact('perihalList'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data: ' . $e->getMessage());
        }
    }

    public function spTujuan()
    {
        try {
            $tujuanList = DB::table('sp_tujuan')->get();

            return view('admin.surat-perjanjian.tujuan', compact('tujuanList'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data: ' . $e->getMessage());
        }
    }

    public function spPerihal()
    {
        try {
            $perihalList = DB::table('sp_perihal')->get();

            return view('admin.surat-perjanjian.perihal', compact('perihalList'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data: ' . $e->getMessage());
        }
    }

    public function imProjek()
    {
        try {
            $projekList = DB::table('im_projek')->get();

            return view('admin.internal-memo.projek', compact('projekList'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data: ' . $e->getMessage());
        }
    }

    public function skForm()
    {
        return view('admin.outgoing-mail.form');
    }

    public function skForm2()
    {
        return view('admin.outgoing-mail.form2');
    }

    public function spForm()
    {
        return view('admin.surat-perjanjian.form');
    }

    public function spForm2()
    {
        return view('admin.surat-perjanjian.form2');
    }

    public function imForm()
    {
        return view('admin.internal-memo.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tujuan' => 'required|string|max:255',
            'kode_tujuan' => 'required|string|max:15|unique:sk_tujuan,kode_tujuan',
        ]);

        try {
            // Simpan data ke tabel sk_tujuan
            DB::table('sk_tujuan')->insert([
                'tujuan' => $validatedData['tujuan'],
                'kode_tujuan' => $validatedData['kode_tujuan'],
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('admin.outgoing-mail.tujuan')->with('success', 'Data tujuan berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function store2(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'perihal' => 'required|string|max:255',
            'kode_perihal' => 'required|string|max:15|unique:sk_perihal,kode_perihal',
        ]);

        try {
            // Simpan data ke tabel sk_perihal
            DB::table('sk_perihal')->insert([
                'perihal' => $validatedData['perihal'],
                'kode_perihal' => $validatedData['kode_perihal'],
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('admin.outgoing-mail.perihal')->with('success', 'Data perihal berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function spStore(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tujuan' => 'required|string|max:255',
            'kode_tujuan' => 'required|string|max:15|unique:sk_tujuan,kode_tujuan',
        ]);

        try {
            // Simpan data ke tabel sk_tujuan
            DB::table('sp_tujuan')->insert([
                'tujuan' => $validatedData['tujuan'],
                'kode_tujuan' => $validatedData['kode_tujuan'],
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('admin.surat-perjanjian.tujuan')->with('success', 'Data tujuan berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function spStore2(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'perihal' => 'required|string|max:255',
            'kode_perihal' => 'required|string|max:15|unique:sk_perihal,kode_perihal',
        ]);

        try {
            // Simpan data ke tabel sk_perihal
            DB::table('sp_perihal')->insert([
                'perihal' => $validatedData['perihal'],
                'kode_perihal' => $validatedData['kode_perihal'],
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('admin.surat-perjanjian.perihal')->with('success', 'Data perihal berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function imStore(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kode_projek' => 'required|string|max:15|unique:im_projek,kode_projek',
        ]);

        try {
            // Simpan data ke tabel sk_tujuan
            DB::table('im_projek')->insert([
                'kode_projek' => $validatedData['kode_projek'],
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('admin.internal-memo.projek')->with('success', 'Data tujuan berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterAdmin  $masterAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(MasterAdmin $masterAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterAdmin  $masterAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterAdmin $masterAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterAdminRequest  $request
     * @param  \App\Models\MasterAdmin  $masterAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterAdminRequest $request, MasterAdmin $masterAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterAdmin  $masterAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterAdmin $masterAdmin)
    {
        //
    }
}