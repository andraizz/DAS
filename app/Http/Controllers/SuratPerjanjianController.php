<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPerjanjian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSuratPerjanjianRequest;
use App\Http\Requests\UpdateSuratPerjanjianRequest;

class SuratPerjanjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mails = SuratPerjanjian::select(
        //     'judul',
        //     'tujuan',
        //     'perihal',
        //     'ticket_number',
        //     'document_number',
        //     'created_at',
        //     'status',
        //     'end_date'
        // )->where('status', 'Submitted')->get();

        // return view('surat-perjanjian.index', compact('mails'));

        $divisiMapping = [
            'Managed Service' => 'MS',
            'Engineering' => 'ENG',
            'Sales & Marketing' => 'SALES',
            'Finance & Accounting' => 'FIN',
            'Procurement & Logistic' => 'PROC',
            'HR & GA' => 'HRD',
            'Legal' => 'LEG',
            'C' => 'CORSEC',
            'Internal Audit' => 'IA',
            'Corporate' => 'CORP',
            'SP' => 'SP',
        ];

        // Ambil divisi user yang login
        $userDivision = Auth::user()->divisi;

        // Cek apakah divisi user ada di mapping
        $divisi = $divisiMapping[$userDivision] ?? null;

        if (!$divisi) {
            // Jika divisi tidak ditemukan dalam mapping, tampilkan kosong
            $mails = collect(); // Empty collection
        } else {
            // Filter tiket berdasarkan divisi
            $mails = SuratPerjanjian::select(
                'ticket_number',
                'judul',
                'tujuan',
                'perihal',
                'document_number',
                'created_at',
                'status',
                'end_date'
            )->where('status', 'Submitted')
                ->where('divisi', $divisi)
                ->get();
        }

        return view('surat-perjanjian.index', compact('mails'));
    }

    public function history()
    {
        $divisiMapping = [
            'Managed Service' => 'MS',
            'Engineering' => 'ENG',
            'Sales & Marketing' => 'SALES',
            'Finance & Accounting' => 'FIN',
            'Procurement & Logistic' => 'PROC',
            'HR & GA' => 'HRD',
            'Legal' => 'LEG',
            'C' => 'CORSEC',
            'Internal Audit' => 'IA',
            'Corporate' => 'CORP',
            'SP' => 'SP',
        ];

        // Ambil divisi user yang login
        $userDivision = Auth::user()->divisi;

        // Cek apakah divisi user ada di mapping
        $divisi = $divisiMapping[$userDivision] ?? null;

        if (!$divisi) {
            // Jika divisi tidak ditemukan dalam mapping, tampilkan kosong
            $mails = collect(); // Empty collection
        } else {
            // Filter tiket berdasarkan divisi
            $mails = SuratPerjanjian::select(
                'ticket_number',
                'judul',
                'tujuan',
                'perihal',
                'document_number',
                'created_at',
                'status',
                'end_date'
            )->where('status', 'Closed')
                ->where('divisi', $divisi)
                ->get();
        }

        return view('surat-perjanjian.history', compact('mails'));
    }

    public function form()
    {
        return view('surat-perjanjian.form');
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
     * @param  \App\Http\Requests\StoreSuratPerjanjianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'confidential' => 'required|string|max:3',
        ]);

        try {
            // Generate nomor tiket
            $dateNow = now()->format('ymd');
            $jenisSurat = 'SPJ';

            // Cek jumlah tiket bulan ini
            $currentYear = now()->format('Y');
            $lastTicket = DB::table('surat_perjanjian')
                ->whereYear('created_at', $currentYear) // Filter berdasarkan tahun ini
                ->orderBy('id', 'desc')
                ->first();

            if ($lastTicket) {
                // Ambil nomor terakhir di bulan ini dan increment
                $lastIncrement = (int) substr($lastTicket->ticket_number, -3); // Ambil 3 digit terakhir
                $increment = str_pad($lastIncrement + 1, 3, '0', STR_PAD_LEFT);
            } else {
                // Reset ke 001 jika belum ada tiket bulan ini
                $increment = str_pad(1, 3, '0', STR_PAD_LEFT);
            }

            $ticket = "{$dateNow}-{$jenisSurat}-{$increment}"; // Format nomor tiket

            // Generate nomor dokumen
            $kodePerusahaan = $request->perusahaan;
            $tujuan = $request->tujuan;
            $divisi = $request->divisi;
            $perihal = $request->perihal;
            $bulanRomawi = $this->convertToRoman(now()->month); // Konversi bulan ke angka romawi
            $tahun = now()->year;

            $documentNumber = "{$increment}/{$kodePerusahaan}-{$tujuan}/{$divisi}/{$perihal}/{$bulanRomawi}/{$tahun}"; // Format nomor dokumen

            // Simpan data ke database
            $validatedData['ticket_number'] = $ticket;
            $validatedData['document_number'] = $documentNumber;
            $validatedData['status'] = 'Submitted';
            $validatedData['end_date'] = now()->addDays(5);

            SuratPerjanjian::create($validatedData);

            return redirect()->route('surat-perjanjian.index')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    private function convertToRoman($month)
    {
        $romanNumerals = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',
        ];

        return $romanNumerals[$month] ?? '';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratPerjanjian  $suratPerjanjian
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_number)
    {
        $ticket = SuratPerjanjian::where('ticket_number', $ticket_number)->firstOrFail();

        return view('surat-perjanjian.detail', [
            'ticket' => $ticket
        ]);
    }

    public function upload(Request $request, $ticket_number)
    {

        $ticket = SuratPerjanjian::where('ticket_number', $ticket_number)->first();

        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket tidak ditemukan.');
        }

        // Validasi file upload
        $validated = $request->validate([
            'file' => $ticket->confidential == 2
                ? 'required|file|mimes:pdf,doc,docx|max:2048'
                : 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Menyimpan file
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('surat-perjanjian', 'public');
            $ticket->file_path = $filePath;
        }

        $ticket->status = 'Closed';
        $ticket->save();

        return redirect()->route('surat-perjanjian.index')->with('success', 'Success!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratPerjanjian  $suratPerjanjian
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratPerjanjian $suratPerjanjian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuratPerjanjianRequest  $request
     * @param  \App\Models\SuratPerjanjian  $suratPerjanjian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuratPerjanjianRequest $request, SuratPerjanjian $suratPerjanjian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratPerjanjian  $suratPerjanjian
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratPerjanjian $suratPerjanjian)
    {
        //
    }
}
