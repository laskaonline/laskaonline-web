@extends('layouts.main')
@section('title')
    Home | SINI-BANG
@endsection
@section('content')
    <x-navbar />
    <img src="{{ asset('/assets/images/personnel.png') }}" alt="Personnel" class="img-fluid mx-auto d-block">
    <x-contact/>

    <footer class="container-fluid py-2 bg-primary text-white d-flex align-items-center">
        <div class="position-absolute d-flex gap-2">
        </div>
        <span class="mx-auto">&copy; SINI-BANG 2023</span>
    </footer>
@endsection
