@extends('layouts.main')

@section('title', 'Lupa Password | Lapas Sekayu')

@section('content')
    <div class="vh-100 d-grid place-items-center">
        <div class="container-lg row flex-column flex-lg-row">
            <div class="col col-lg-8 text-center">
                <img src="{{ asset('/assets/images/no-corruption.png') }}" alt="Tolak Suap, Siap WTP" class="img-fluid"
                     width="80%">
            </div>
            <div class="col col-lg-4">
                <form action="{{ route('password.update') }}" method="post" class="row gap-2">
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
                            <input type="hidden" name="email" class="form-control" value="{{$email}}">
                        </div>

                        <div>
                            <label for="password" class="form-label">
                                Password
                            </label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div>
                            <label for="password_confirmation" class="form-label">
                               Konfirmasi Password
                            </label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <x-honeypot/>
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
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
