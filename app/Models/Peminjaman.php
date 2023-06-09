<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    public function data_peminjam()
    {
        return $this->belongsTo('App\Models\DataPeminjam', 'id_peminjam');
    }

    public function data_buku()
    {
        return $this->belongsTo('App\Models\DataBuku', 'id_buku');
    }
}
