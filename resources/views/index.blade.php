
@extends('componens.main')


@section('container')


    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="main-text">Make Your Day Happy, <br> With Hot Wheels</h1>

                <p class="normal-text pt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum eaque quisquam culpa totam vel molestiae? Natus unde cum sit velit distinctio consequatur fuga consequuntur quod ipsum, porro sapiente quidem autem asperiores culpa quaerat voluptas dolor suscipit minus sunt? Molestias optio voluptatibus sunt sit accusantium alias nemo sed officia quae veniam commodi earum placeat quibusdam voluptatum assumenda aut ut enim.</p>
            </div>
            <div class="col">
                {{-- session error --}}

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                {{-- end session errorr --}}


                <h1 class="main-text mb-4">Login</h1>
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control @error('email')
                          is-invalid
                      @enderror" name="email" id="email" value="{{ old('email') }}"  required>
                      @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn-main">Login</button>
                </form>
            </div>
        </div>
    </div>


@endsection 