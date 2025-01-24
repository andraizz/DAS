<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\AuthHelpers;
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
        $divisiMapping = [
            'Managed Service' => 'MS',
            'Engineering' => 'ENG',
            'Sales & Marketing' => 'SALES',
            'Finance & Accounting' => 'FIN',
            'Procurement & Logistic' => 'PROC',
            'HR & GA' => 'HRD',
            'Corporate Strategic Planning' => 'CORSEC',
            'Internal Audit' => 'IA',
            'Corporate' => 'CORP',
            'Special Project' => 'SP',
        ];

        if (AuthHelpers::isMasterAdmin()) {
            // Jika user adalah master admin, tampilkan semua tiket
            $mails = SuratPerjanjian::select(
                'ticket_number',
                'judul',
                'tujuan',
                'perihal',
                'document_number',
                'created_at',
                'status',
                'end_date'
            )->where('status', 'Submitted')->get();
        } elseif (Auth::user()->nik === 'KT-23111405') {
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
                ->where('divisi', 'SITAC') // Asrizal
                ->get();
        } elseif (Auth::user()->nik === 'KT-19100823') {
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
                ->where('divisi', 'LEG') // Fadhel
                ->get();
        } elseif (Auth::user()->nik === 'KT-22071206') {
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
                ->where('divisi', 'ACC') // Dian Safitri
                ->get();
        } elseif (Auth::user()->nik === 'KT-23051308' || Auth::user()->nik == 'KT-22081208') {
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
                ->where('divisi', 'CME') // Nico & Krestear
                ->get();
        } elseif (Auth::user()->nik === 'KT-25010503') {
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
                ->where('divisi', 'BETARI') // Pratiwi Dwi Sana
                ->get();
        } else {
            $userDivision = Auth::user()->divisi;
            $divisi = $divisiMapping[$userDivision] ?? null;

            if (!$divisi) {
                // Jika divisi tidak ditemukan dalam mapping, tampilkan kosong
                $mails = collect();
            } else {
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
            'Corporate Strategic Planning' => 'CORSEC',
            'Internal Audit' => 'IA',
            'Corporate' => 'CORP',
            'Special Project' => 'SP',
        ];

        if (AuthHelpers::isMasterAdmin()) {
            // Jika user adalah master admin, tampilkan semua tiket
            $mails = SuratPerjanjian::select(
                'ticket_number',
                'judul',
                'tujuan',
                'perihal',
                'document_number',
                'created_at',
                'status',
                'end_date'
            )->where('status', 'Closed')->get();
        } elseif (Auth::user()->nik === 'KT-23111405') {
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
                ->where('divisi', 'SITAC') // Asrizal
                ->get();
        } elseif (Auth::user()->nik === 'KT-19100823') {
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
                ->where('divisi', 'LEG') // Fadhel
                ->get();
        } elseif (Auth::user()->nik === 'KT-22071206') {
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
                ->where('divisi', 'ACC') // Dian Safitri
                ->get();
        } elseif (Auth::user()->nik === 'KT-23051308' || Auth::user()->nik == 'KT-22081208') {
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
                ->where('divisi', 'CME') // Nico & Krestear
                ->get();
        } elseif (Auth::user()->nik === 'KT-25010503') {
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
                ->where('divisi', 'BETARI') // Pratiwi Dwi Sana
                ->get();
        } else {
            $userDivision = Auth::user()->divisi;
            $divisi = $divisiMapping[$userDivision] ?? null;

            if (!$divisi) {
                // Jika divisi tidak ditemukan dalam mapping, tampilkan kosong
                $mails = collect();
            } else {
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
        }

        return view('surat-perjanjian.history', compact('mails'));
    }

    public function form()
    {
        try {
            $tujuanList = DB::table('sp_tujuan')->select('kode_tujuan', 'tujuan')->get();
            $perihalList = DB::table('sp_perihal')->select('kode_perihal', 'perihal')->get();

            return view('surat-perjanjian.form', compact('tujuanList', 'perihalList'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data: ' . $e->getMessage());
        }
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
            $tujuan = $request->tujuan === 'others' ? $request->tujuan_other : $request->tujuan;
            $kodeTujuan = $request->tujuan === 'others'
                ? 'OTH'
                : DB::table('sp_tujuan')->where('tujuan', $request->tujuan)->value('kode_tujuan');

            $perihal = $request->perihal === 'others' ? $request->perihal_other : $request->perihal;
            $kodePerihal = $request->perihal === 'others'
                ? 'OTH'
                : DB::table('sp_perihal')->where('perihal', $request->perihal)->value('kode_perihal');

            $kodePerusahaan = $request->perusahaan;
            $divisi = $request->divisi;
            $bulanRomawi = $this->convertToRoman(now()->month); // Konversi bulan ke angka romawi
            $tahun = now()->year;

            $documentNumber = "{$increment}/{$kodePerusahaan}-{$kodeTujuan}/{$divisi}/{$kodePerihal}/{$bulanRomawi}/{$tahun}"; // Format nomor dokumen

            // Simpan data ke database
            $validatedData['tujuan'] = $tujuan;
            $validatedData['perihal'] = $perihal;
            $validatedData['ticket_number'] = $ticket;
            $validatedData['document_number'] = $documentNumber;
            $validatedData['status'] = 'Submitted';
            $validatedData['end_date'] = now()->addDays(30);

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

        // Tanggal awal
        $createdAt = Carbon::parse($ticket->created_at);

        // Tentukan tanggal akhir (end_date atau maksimal 30 hari dari created_at)
        $endDate = $ticket->end_date ? Carbon::parse($ticket->end_date) : $createdAt->addDays(30);

        // Hitung keterlambatan hanya jika melebihi tanggal akhir
        $daysLate = now()->greaterThan($endDate) ? $endDate->diffInDays(now(), false) : 0;

        return view('surat-perjanjian.detail', compact('ticket', 'daysLate'));
    }

    public function upload(Request $request, $ticket_number)
    {

        $ticket = SuratPerjanjian::where('ticket_number', $ticket_number)->first();

        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket tidak ditemukan.');
        }

        // Validasi file upload
        $validated = $request->validate([
            'file' => $ticket->confidential == "No"
                ? 'required|file|mimes:pdf|max:2048'
                : 'nullable|file|mimes:pdf|max:2048',
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