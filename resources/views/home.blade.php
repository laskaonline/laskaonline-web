@extends('layouts.main')
@section('title')
    Home | Laska Online
@endsection
@section('content')
    <x-navbar/>
    <img src="{{asset('/assets/images/personnel.png')}}" alt="Personnel" class="img-fluid mx-auto d-block">
    <x-unit-info/>
    <x-testimony-box/>
    <x-gallery/>
    <div class="container-lg my-2">
        <h3 class="text-uppercase text-center">
            Form Saran dan Masukan
        </h3>
        <form action="/" method="post" class="d-flex flex-column gap-2">
            <x-honeypot/>
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
    <footer class="container-fluid py-2 bg-primary text-white d-flex align-items-center">
        <div class="d-flex gap-2">
            <i class="bi bi-facebook"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-youtube"></i>
        </div>
        <span class="mx-auto">&copy; Laksa 2023</span>
    </footer>
@endsection
