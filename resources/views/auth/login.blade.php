@extends('templates.login')
@section('title', 'Halaman Login')


@section('content')
    <div class="main d-flex justify-content-center align-items-center">
        <div class="card mt-5" style="max-width: 540px">
            <div class="text-center">
                <img src="{{ URL::to('assets/images/logo/logo_sekolah.png') }}" style="width:30%" alt="Logo">
            </div>
            <div class="card-body text-center">
                <h1 class="card-title">Login</h1>
                <p class="card-text">Selamat datang di aplikasi Perpustakan Sekolah Bahagia Pangkalpinang</p>
                @if (session('status'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="text" name="email" placeholder="email"
                            required />
                        <label for="email">Email Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" type="password" name="password" placeholder="password"
                            required />
                        <label for="password">Password</label>
                    </div>

                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                        </div>
                    </div>
                </form>
                <div class="text-center mt-2">
                    <div class="small">Need an Account?<a href="/register"> Sign up!</a></div>
                </div>
            </div>
        </div>

    </div>



@endsection
