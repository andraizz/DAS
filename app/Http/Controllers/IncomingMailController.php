<?php

namespace App\Http\Controllers;

use App\Models\IncomingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class IncomingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mails = IncomingMail::select(
        //     'judul',
        //     'nomor_surat',
        //     'tujuan',
        //     'perihal',
        //     'ticket_number',
        //     'document_number',
        //     'created_at',
        //     'status',
        //     'end_date'
        // )->where('status', 'Submitted')->get();

        // return view('incoming-mail.index', compact('mails'));

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
        $tujuan = $divisiMapping[$userDivision] ?? null;

        if (!$tujuan) {
            // Jika divisi tidak ditemukan dalam mapping, tampilkan kosong
            $mails = collect(); // Empty collection
        } else {
            // Filter tiket berdasarkan tujuan
            $mails = IncomingMail::select(
                'ticket_number',
                'judul',
                'nomor_surat',
                'tujuan',
                'perihal',
                'document_number',
                'created_at',
                'end_date',
                'status',
            )->where('status', 'Submitted')
                ->where('tujuan', $tujuan)
                ->get();
        }

        return view('incoming-mail.index', compact('mails'));
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
        $tujuan = $divisiMapping[$userDivision] ?? null;

        if (!$tujuan) {
            // Jika divisi tidak ditemukan dalam mapping, tampilkan kosong
            $mails = collect(); // Empty collection
        } else {
            // Filter tiket berdasarkan tujuan
            $mails = IncomingMail::select(
                'ticket_number',
                'judul',
                'nomor_surat',
                'tujuan',
                'perihal',
                'document_number',
                'created_at',
                'end_date',
                'status',
            )->where('status', 'Closed')
                ->where('tujuan', $tujuan)
                ->get();
        }

        return view('incoming-mail.history', compact('mails'));
    }

    public function form()
    {
        return view('incoming-mail.form');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'nomor_surat' => 'required|string|max:255',
            'pengirim' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'disposisi' => 'required|string|max:255',
            'tanggal_diterima' => 'required|date',
            'tanggal_surat' => 'required|date',
            'confidential' => 'required|string|max:3',
        ]);

        try {
            // Generate nomor tiket
            $dateNow = now()->format('ymd');
            $jenisSurat = 'INM';

            // Cek jumlah tiket bulan ini
            $currentMonth = now()->format('Y-m');
            $lastTicket = DB::table('incoming_mail')
                ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$currentMonth]) // Filter berdasarkan bulan ini
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
            $bulanRomawi = $this->convertToRoman(now()->month); // Konversi bulan ke angka romawi
            $tahun = now()->year;

            // Cek jumlah dokumen bulan ini untuk perusahaan terkait
            $lastDocument = DB::table('incoming_mail')
                ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$currentMonth]) // Filter berdasarkan bulan ini
                ->where('perusahaan', $kodePerusahaan)
                ->orderBy('id', 'desc')
                ->first();

            if ($lastDocument) {
                // Ambil nomor terakhir di bulan ini dan increment
                $lastIncrementDoc = (int) substr($lastDocument->document_number, 0, 3); // Ambil 3 digit pertama
                $incrementDoc = str_pad($lastIncrementDoc + 1, 3, '0', STR_PAD_LEFT);
            } else {
                // Reset ke 001 jika belum ada dokumen bulan ini untuk perusahaan ini
                $incrementDoc = str_pad(1, 3, '0', STR_PAD_LEFT);
            }

            $documentNumber = "{$incrementDoc}/{$kodePerusahaan}/{$tujuan}/{$bulanRomawi}/{$tahun}"; // Format nomor dokumen

            // Simpan data ke database
            $validatedData['ticket_number'] = $ticket;
            $validatedData['document_number'] = $documentNumber;
            $validatedData['status'] = 'Submitted';
            $validatedData['end_date'] = now()->addDays(5);


            IncomingMail::create($validatedData);

            return redirect()->route('incoming-mail.index')->with('success', 'Data berhasil disimpan!');
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
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_number)
    {
        $ticket = IncomingMail::where('ticket_number', $ticket_number)->firstOrFail();

        return view('incoming-mail.detail', [
            'ticket' => $ticket
        ]);
    }

    public function upload(Request $request, $ticket_number)
    {

        $ticket = IncomingMail::where('ticket_number', $ticket_number)->first();

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
            $filePath = $request->file('file')->store('incoming-mails', 'public');
            $ticket->file_path = $filePath;
        }

        $ticket->status = 'Closed';
        $ticket->save();

        return redirect()->route('incoming-mail.index')->with('success', 'Success!');
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomingMail $incomingMail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomingMail $incomingMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomingMail  $incomingMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomingMail $incomingMail)
    {
        //
    }
}
