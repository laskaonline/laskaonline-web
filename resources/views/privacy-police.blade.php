@extends('layouts.main')
@section('title')
SINI-BANG | Lapas Sekayu
@endsection
@section('content')
    <x-navbar />
    <img src="{{ asset('/assets/images/personnel.png') }}" alt="Personnel" class="img-fluid mx-auto d-block">
    <x-privacy-police />    

    <footer class="container-fluid py-2 bg-primary text-white d-flex align-items-center">
        <div class="position-absolute d-flex gap-2">
            
        </div>
        <span class="mx-auto">&copy; SINI-BANG | Lapas Kelas II.B Sekayu 2023</span>
    </footer>
@endsection
