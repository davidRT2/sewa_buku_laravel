@extends('layout.master')
@section('content')

@if(count($data_peminjam))
<div class="container">
    <h4>Data Peminjam</h4>

    @include('_partial/flash_message')

    <p align='right'><a href="{{ route('data_peminjam.create') }}" class="btn btn-primary">Tambah Data Peminjam</a></p>
    <form action="{{ route('data_peminjam.search')  }}" method="get">@csrf
        <input type="text" name="kata" placeholder="Cari.........">
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Peminjam</th>
                <th>Nama Peminjam</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal lahir</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Nomor Telepon</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_peminjam as $peminjam)
            <tr>
                <td>{{ $peminjam->id }}</td>
                <td>{{ $peminjam->kode_peminjam }}</td>
                <td>{{ $peminjam->nama_peminjam }}</td>
                <td>{{ $peminjam->jenis_kelamin['nama_jenis_kelamin']}}</td>
                <td>{{ $peminjam->tanggal_lahir }}</td>
                <td>{{ $peminjam->alamat }}</td>
                <td>{{ $peminjam->pekerjaan }}</td>
                <td>{{ !empty($peminjam->telepon['nomor_telepon'])?
                        $peminjam->telepon['nomor_telepon'] : '-' }}</td>
                <td><a href="{{ route('data_peminjam.edit', $peminjam->id) }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{ route('data_peminjam.destroy', $peminjam->id) }}" method="POST">
                        @csrf
                            <button class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini ?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <!-- <script>
                setTimeout("location.reload(true)", 60000);
            </script> -->
        </tbody>
    </table>
    <div class="pull-left">
        <p>{{ $data_peminjam->links() }}</p>
    </div>
</div>
@else
    <div>
        <h4>Data {{ $cari }} Tidak ditemukan</h4>
        <a href="/data_peminjam">kembali</a>
    </div>
@endif
@endsection