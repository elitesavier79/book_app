@extends('templates.login')
@section('title', 'Halaman Login')


@section('content')
    <div class="main d-flex justify-content-center align-items-center">
        <div class="card mt-5" style="max-width: 540px">
            <div class="text-center">
                <img src="{{URL::to('assets/images/logo/logo_sekolah.png')}}" alt="Logo">
            </div>
            <div class="card-body text-center">
                <h1 class="card-title">Form Login</h1>
                <p class="card-text">Selamat datang di aplikasi Perpustakan Sekolah Bahagia Pangkalpinang</p>
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="form-group mb-4">
                        <input type="text" class="form-control form-control-xl" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control form-control-xl" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                </form>
                <div class="text-center mt-2">
                <a href="/register" class="">Sign up</a>
                </div>
            </div>
        </div>

    </div>



@endsection
