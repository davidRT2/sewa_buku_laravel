@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Peminjam</h4>
    <p align="right"><a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah Data Peminjam</a></p>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Nama Peminjaman</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_peminjaman as $peminjaman)
            <tr>
                <td>{{ $peminjaman->id }}</td>
                <td>{{ $peminjaman->kode_transaksi }}</td>
                <td><a href="{{ route('peminjaman.detail_peminjam', $peminjaman->data_peminjam['id']) }}">{{ $peminjaman->data_peminjam['nama_peminjam'] }}</a></td>
                <td><a href="{{ route('peminjaman.detail_buku', $peminjaman->data_buku['id']) }}">{{ $peminjaman->data_buku['judul_buku'] }}</a></td>
                <td>{{ $peminjaman->tgl_peminjaman }}</td>
                <td>{{ $peminjaman->tgl_pengembalian }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-left">
        <strong>
            Jumlah Peminjaman : {{ $jumlah_peminjaman }}
        </strong>
    </div>
</div>
@endsection