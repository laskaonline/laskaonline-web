@extends('layouts.main')

@section('title', 'SINI-BANG | Lapas Sekayu')

@section('content')
    <div class="vh-100 d-grid place-items-center">
        <div class="container-lg row flex-column flex-lg-row">
            <div class="col col-lg-8 text-center">
                <img src="{{ asset('/assets/images/no-corruption.png') }}" alt="Tolak Suap, Siap WTP" class="img-fluid"
                     width="90%">
            </div>
            <div class="col col-lg-4">
                <form action="{{ url('/register') }}" method="post" class="row gap-2">
                    <center>
                        <img src="{{ asset('/assets/images/kemenkumham-auth.png') }}" alt="Logo Kemenkumham"
                             class="img-fluid img-fluid min-w-100 w-75 p-3">
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
                    <div>
                        <input name="name" type="text" class="form-control" placeholder="Nama" required/>
                    </div>
                    <div>
                        <input name="no_ktp" type="text" class="form-control" placeholder="No KTP" required/>
                    </div>
                    <div>
                        <input name="phone" type="tel" class="form-control" placeholder="Telephone" required/>
                    </div>
                    <div>
                        <input name="email" type="email" class="form-control" placeholder="Email" required/>
                    </div>
                    <div>
                        <input name="password" type="password" class="form-control" placeholder="Password" required/>
                        <div class="form-text">Password minimal 8 karakter.</div>
                    </div>
                    <div>
                        <input name="password_confirmation" type="password" class="form-control"
                               placeholder="Ulangi Password" required/>
                    </div>
                    <x-honeypot/>
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>

                    <p class="text-center">Sudah punya akun? <a href="/login">Login</a></p>
                </form>
            </div>
        </div>
    </div>
    <footer class="container-fluid py-2 bg-primary text-white d-flex align-items-center fixed-bottom">
        <div class="position-absolute d-flex gap-2">
        </div>
        <span class="mx-auto">&copy; SINI-BANG 2023</span>
    </footer>
@endsection
