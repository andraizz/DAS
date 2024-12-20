<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingMail extends Model
{
    use HasFactory;

    protected $table = 'incoming_mail';

    protected $fillable = [
        'judul',
        'nomor_surat',
        'pengirim',
        'perusahaan',
        'tujuan',
        'perihal',
        'disposisi',
        'tanggal_diterima',
        'tanggal_surat',
        'end_date',
        'confidential',
        'file_path',
        'ticket_number',
        'document_number',
        'status',
    ];

    public function getRemainingDaysAttribute()
    {
        if ($this->status === 'Closed') {
            return null; // Tidak ada sisa hari jika sudah closed
        }

        return now()->diffInDays($this->end_date, false); // Hitung selisih hari
    }

    // Menghapus atau menandai end_date jika status adalah 'Closed'
    public function setEndDateAttribute($value)
    {
        if ($this->status === 'Closed') {
            $this->attributes['end_date'] = null; // Menghapus end_date jika status closed
        } else {
            $this->attributes['end_date'] = $value; // Menyimpan end_date jika status tidak closed
        }
    }

    // Menambahkan accessor untuk status closed
    public function getIsClosedAttribute()
    {
        return $this->status === 'Closed';
    }
}
