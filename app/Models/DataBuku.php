<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBuku extends Model
{
    use HasFactory;

    protected $table = "data_buku";

    public function data_peminjam()
    {
        return $this->belongsToMany('App\Models\DataPeminjam', 'peminjaman',  'id_buku', 'id_peminjam');
    }

    public function peminjaman()
    {
        return $this->hasMany('App\Models\Peminjaman', 'id_buku');
    }
}
