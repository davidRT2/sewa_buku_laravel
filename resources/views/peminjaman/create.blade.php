@extends('layout.master')

@section('content')
<div class="container">
    <h4>Tambah Transaksi Peminjaman</h4>
    <form method="POST" action="{{ route('peminjaman.store') }}">
        @csrf
        <div class="form-group">
            <label for="">Kode Peminjaman</label>
            <input type="text" name="kode_transaksi" class="form-control">
            <input type="hidden" name="tgl_peminjaman" class="form-control" value="{{ date('Y-m-d') }}">
            <input type="hidden" name="tgl_pengembalian" class="form-control" value="{{ date('Y-m-d', strtotime('+15 day', strtotime(date('Y-m-d')))) }}">
        </div>
        <div class="form-group">
            <label for="">Nama Peminjam</label>
            <select name="id_peminjam" id="" class="form-control">
                <option value="">Pilih Nama Peminjam</option>
                @foreach ($list_data_peminjam as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Judul Buku</label>
            <select name="id_buku" class="form-control" id="">
                <option value="">Pilih Judul Buku</option>
                @foreach ($list_data_buku as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection
