@extends('layouts.main')

@section('title', 'SINI-BANG | Lapas Sekayu')

@section('content')
    <div class="vh-100 d-grid place-items-center">
        <div class="container-lg row flex-column flex-lg-row">
            <div class="col col-lg-8 text-center">
                <img src="{{ asset('/assets/images/no-corruption.png') }}" alt="Tolak Suap, Siap WTP" class="img-fluid"
                     width="80%">
            </div>
            <div class="col col-lg-4">
                <form action="{{ url('/login') }}" method="post" class="row gap-2">
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
                    <center>
                        <a href="/"><img src="{{ asset('/assets/images/kemenkumham-auth.png') }}" alt="Logo Kemenkumham"
                                         class="img-fluid min-w-100 w-75 p-3"></a>
                    </center>

                    @csrf
                    <div>
                        <label for="email" class="form-label">
                            Email
                        </label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div>
                        <label for="password" class="form-label">
                            Password
                        </label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <x-honeypot/>
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                    <br>
                    <p class="text-center">Lupa Password? <a href="{{route('password.request')}}">Lupa Password</a></p>
                    <p class="text-center">Belum punya akun? <a href="/register">Register</a></p>
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
