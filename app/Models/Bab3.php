<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bab3 extends Model
{
    use HasFactory;

    // Nama tabel yang sesuai di database
    protected $table = 'bab3';

    // Kolom yang dapat diisi mass-assignable
    protected $fillable = [
        'nama_bab',
        'jenis_id',
        'kode_opd',
        'tahun_id',
        'permasalahan_pelayanan',
        'isu_strategis',
    ];

    // Definisikan relasi dengan model Jenis (jika ada)
    public function tahun()
    {
        return $this->belongsTo(TahunDokumen::class, 'tahun_id');
    }
    
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
    
    public function opd()
    {
        return $this->belongsTo(OPD::class, 'kode_opd', 'kode_opd'); // Adjust 'kode_opd' based on the foreign key and local key
    }
}
