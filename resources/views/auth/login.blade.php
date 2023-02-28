@extends('layouts.main')

@section('title','Login | Laska Online')

@section('content')
    <div class="vh-100 d-grid place-items-center">
        <div class="container-lg row flex-column flex-lg-row">
            <div class="col col-lg-8 text-center">
                <img src="{{asset('/assets/images/no-corruption-psa.png')}}" alt="Tolak Suap, Siap WTP"
                     class="img-fluid">
            </div>
            <div class="col col-lg-4">
                <form action="{{route('/login')}}" method="post" class="row gap-2">
                    <img src="{{asset('/assets/images/kemenkumham-logo.png')}}" alt="Logo Kemenkumham"
                         class="img-fluid">
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
                </form>
            </div>
        </div>
    </div>
    <footer class="container-fluid py-2 bg-primary text-white d-flex align-items-center fixed-bottom">
        <div class="position-absolute d-flex gap-2">
            <i class="bi bi-facebook"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-youtube"></i>
        </div>
        <span class="mx-auto">&copy; Laksa 2023</span>
    </footer>
@endsection
