@extends('layouts.main')
@section('title')
    Home | SINI-BANG
@endsection
@section('content')
    <x-navbar />
    <img src="{{ asset('/assets/images/personnel.png') }}" alt="Personnel" class="img-fluid mx-auto d-block">
    <x-fitur-app />
    <x-gallery />
    <x-unit-info />
    {{-- <x-testimony-box /> --}}
    
    {{-- <div class="bg-secondary">
        <div class="container-lg my-2 ">
            <br>
            <h3 class="text-uppercase text-center">
                Form Saran dan Masukan
            </h3>
            <form action="/" method="post" class="d-flex flex-column gap-2">
                <x-honeypot />
                <div>
                    <label class="form-label">Nama (required)</label>
                    <input name="full_name" class="form-control">
                </div>
                <div>
                    <label class="form-label">Email (required)</label>
                    <input name="email" type="email" class="form-control">
                </div>
                <div>
                    <label class="form-label">Pesan</label>
                    <textarea name="message" class="form-control" rows="3"></textarea>
                </div>
                <button class="btn btn-primary w-100 w-lg-auto" type="submit">
                    Submit
                </button>
            </form>
        </div>
    </div> --}}

    <footer class="container-fluid py-2 bg-primary text-white d-flex align-items-center">
        <div class="position-absolute d-flex gap-2">
            
        </div>
        <span class="mx-auto">&copy; SINI-BANG 2023</span>
    </footer>
@endsection
