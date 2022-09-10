@extends('componens.main')


@section('container')
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="img/main-image-2.png" width="100%" alt="">
            </div>
            <div class="col shadow-lg p-3 mb-5 rounded">
                <h1 class="main-text mb-4">Registrasi</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="input1" class="form-label">Nama Depan</label>
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name')
                            is-invalid @enderror" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                        </div>
                        <div class="col">
                            <label for="input1" class="form-label">Nama Tengah</label>
                            <input type="text" name="midle_name" id="midle_name" class="form-control @error('midle_name')
                            is-invalid @enderror" value="{{ old('midle_name') }}" required>
                            @error('midle_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Nama Belakang</label>
                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name')
                            is-invalid @enderror" value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control @error('email')
                            is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                      @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control @error('password')
                            is-invalid @enderror" id="password" maxlength="18" name="password" value="{{ old('password') }}" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      
                    </div>
                <button type="submit" id="btn" name="register" class="btn-main mt-4">Daftar</button>
                </form>
            </div>
        </div>
    </div>
@endsection