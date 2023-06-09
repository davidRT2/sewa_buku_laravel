@extends('layout.master')
@section('content')
<div class="container">
    <h4>Edit data peminjam</h4>
    <form method="POST" action="{{ route('data_peminjam.update', $peminjam->id) }}">
        @csrf
        <div class="form-group">
            <label for="">Kode Peminjam</label>
            <input type="text" name="kode_peminjam" readonly class="form-control" value="{{ $peminjam->kode_peminjam }}">
        </div>
        <div class="form-group">
            <label for="">Nama Peminjam</label>
            <input type="text" name="nama_peminjam" class="form-control" value="{{ $peminjam->nama_peminjam }}">
        </div>
        <div class="form-group">
        <label for="">Jenis Kelamin</label><br>
            <select name="id_jenis_kelamin" id="">
                <option value="">Pilih Jenis Kelamin</option>
                @foreach ($list_jenis_kelamin as $key => $value)
                <option value="{{ $key }}" {{ $peminjam->id_jenis_kelamin == $key ? 'selected' : ''}}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $peminjam->tanggal_lahir }}">
        </div>
        <div class="form-group">
            <label for="">Alamat</label><br>
            <textarea name="alamat" id="" cols="173" rows="3">{{ $peminjam->alamat }}</textarea>
        </div>
        <div class="form-group">
            <label for="">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" value="{{ $peminjam->pekerjaan }}">
        </div>
        <div class="form-group">
            <label for="">Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" value="{{ $peminjam->nomor_telepon }}">
        </div>
        <div class="form-group">
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection