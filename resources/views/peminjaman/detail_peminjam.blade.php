@extends('layout.master')
@section('content')
    <div class="container">
        <h4>Detail Peminjam</h4>
        <p>Kode Peminjam : {{ $data_peminjam->kode_peminjam }}</p>
        <p>Kode Peminjam : {{ $data_peminjam->nama_peminjam }}</p>
        <table class="table table-striped">
            <thead>
                <th>No</th>
                <th>Judul Buku Yang Dipinjam</th>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($data_peminjam->data_buku as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->judul_buku }}</td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
