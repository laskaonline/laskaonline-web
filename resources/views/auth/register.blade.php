@extends('layouts.main')

@section('title', 'SINI-BANG | Lapas Sekayu')

@section('content')
    <div class="vh-100 d-grid place-items-center">
        <div class="container-lg row flex-column flex-lg-row">
            <div class="col col-lg-8 text-center">
                <img src="{{ asset('/assets/images/background-login.png') }}" alt="Tolak Suap, Siap WTP" class="img-fluid"
                    width="90%">
            </div>
            <div class="col col-lg-4">
                <form action="{{ url('/register') }}" method="post" class="row gap-2">
                    <center>
                        <a href="/"><img src="{{ asset('/assets/images/logo-sini-bang-right-no-background.png') }}"
                                alt="Logo Kemenkumham" class="img-fluid min-w-100 w-75 p-1"></a>
                    </center>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    <div class="row mt-2">
                        <input name="name" type="text" class="form-control" placeholder="Nama" required />
                    </div>
                    <div class="row mt-2">
                        <input name="no_ktp" type="text" class="form-control" placeholder="No KTP" required />
                    </div>
                    <div class="row mt-2">
                        <input name="phone" type="tel" class="form-control" placeholder="Telephone" required />
                    </div>
                    <div class="row mt-2">
                        <input name="password" type="password" class="form-control" placeholder="Password" required />
                        <div class="form-text">Password minimal 8 karakter.</div>
                    </div>
                    <div class="row mt-2">
                        <input name="password_confirmation" type="password" class="form-control"
                            placeholder="Ulangi Password" required />
                    </div>
                    <x-honeypot />
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            Register
                        </button>
                    </div>

                    <div class="row mt-3">
                        <p class="text-center">Sudah punya akun? <a href="/login">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="container-fluid py-2 bg-primary text-white d-flex align-items-center fixed-bottom">
        <div class="position-absolute d-flex gap-2">
        </div>
        <span class="mx-auto">&copy; Lapas Kelas IIB Sekayu</span>
    </footer>
@endsection
