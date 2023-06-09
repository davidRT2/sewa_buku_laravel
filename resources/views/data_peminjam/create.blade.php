@extends('layout.master')
@section('content')
<div class="container">
    <h4>Tambah Data Peminjam</h4>
    <form method="POST" action="{{ route('data_peminjam.store') }}">
        @csrf
    <div class="form-group">
        <label >Kode Peminjam</label>
        <input type="text" name="kode_peminjam" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Nama Peminjam</label>
        <input type="text" name="nama_peminjam" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Jenis kelamin</label><br>
        <select name="id_jenis_kelamin"  class="form-control">
            <option value="">Pilih jenis kelamin</option>
            @foreach ($list_jenis_kelamin as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Alamat</label><br>
        <textarea name="alamat" id="" cols="148" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="" >Pekerjaan</label>
        <input class="form-control" type="text" name="pekerjaan">
    </div>
    <div class="form-group">
        <label for="" >Telepon</label>
        <input class="form-control" type="text" name="telepon">
    </div>
    <div>
        <button type="submit">Simpan</button>
    </div>
    </form>
</div>
@endsection 