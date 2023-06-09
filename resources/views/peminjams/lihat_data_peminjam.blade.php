@extends('layout.master')
@section('content')
<div id="peminjam">
    <h2>Data Peminjam</h2>
    @if(!empty($peminjam))
    <ul>
        @foreach($peminjam as $data)
        <li>{{$data}}</li>
        @endforeach
    </ul>
    @else
    <p>Data peminjam kosong</p>
    @endif
</div>
@endsection