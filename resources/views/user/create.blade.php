@extends('layout.master')
@section('content')
<div class="container">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Buat User Baru')}}</div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Nama')}}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Alamat Email')}}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Password')}}</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            value="{{ old('password') }}" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Confirm Password')}}</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                            required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="name" class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-6">
                            <select name="level" id="level" class="form-control">
                                <option value="peminjam">Peminjam</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-0">
                            <button type="submit" class="btn btn-primary">
                                {{__('Create')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection