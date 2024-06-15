@extends('layouts.main')
@section('title')
Lapas Kelas IIB Sekayu 2023
@endsection
@section('content')
    <x-navbar />
    <img src="{{ asset('/assets/images/personel.png') }}" alt="Personnel" class="img-fluid mx-auto d-block">
    <x-contact/>

    <footer class="container-fluid py-2 bg-primary text-white d-flex align-items-center">
        <div class="position-absolute d-flex gap-2">
        </div>
        <span class="mx-auto">&copy; Lapas Kelas IIB Sekayu 2023</span>
    </footer>
@endsection
