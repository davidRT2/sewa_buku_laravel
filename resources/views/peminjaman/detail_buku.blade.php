@extends('layout.master')
@section('content')
    <div class="container">
        <h4>Detail Buku</h4>
        <p>Kode Buku : {{ $data_buku->kode_buku }}</p>
        <p>Juduk Buku : {{ $data_buku->judul_buku }}</p>
        <table class="table table-striped">
            <thead>
                <th>No</th>
                <th>Nama Peminjam</th>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($data_buku->data_peminjam as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->nama_peminjam }}</td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
