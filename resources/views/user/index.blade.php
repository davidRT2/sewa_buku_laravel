@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data User</h4>
    <p align="right"><a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Data User</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Level</td>
                <td>Edit</td>
                <td>Hapus</td>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach($user_list as $user)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->level}}</td>
                <td><a href="{{  route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                <td>
                    <form action="{{  route('user.destroy', $user->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-warning btn-sm" onclick="return confirm('Anda yakin ingin hapus data ini?')">
                        Hapus
                    </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-left">
        <strong>
            Jumlah Peminjam : {{ $jumlah_user }}
        </strong>
        <p>{{ $user_list->links() }}</p>
    </div>
</div>
@endsection