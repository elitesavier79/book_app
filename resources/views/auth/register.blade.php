@extends('templates.login')
@section('title', 'Halaman register')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-3">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Create Account</h3>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                
                            @endif
                            <form action="" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="name" type="text"
                                        placeholder="nama lengkap" required />
                                    <label for="name">Full Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" name="email" type="email" required
                                        placeholder="name@example.com" />
                                    <label for="email">Email address</label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="password" name="password" type="password"
                                                placeholder="Create a password" required />
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPasswordConfirm" type="password"
                                                placeholder="Confirm password" required />
                                            <label for="inputPasswordConfirm">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="phone" name="phone" type="text"
                                        placeholder="phone number" />
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="address" name="address" type="text"
                                        placeholder="address" required />
                                    <label for="address">Address</label>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small">Have an account? Go to<a href="/login"> login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
