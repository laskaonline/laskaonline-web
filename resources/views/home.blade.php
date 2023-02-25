@extends('layouts.main')
@section('title')
    Home | Laska Online
@endsection
@section('content')
    <x-navbar/>
    <img src="{{asset('/assets/images/personnel.png')}}" alt="Personnel" class="img-fluid mx-auto d-block">
    <x-unit-info/>
    <x-testimony-box/>
    <div class="my-2 container-lg">
        <h2 class="text-center text-uppercase">Galeri Laksa</h2>
        <div class="grid">
            <div class="g-col-6 g-col-md-4 g-col-lg-3 bg-primary text-white">1</div>
            <div class="g-col-6 g-col-md-4 g-col-lg-3 bg-primary text-white">1</div>
            <div class="g-col-6 g-col-md-4 g-col-lg-3 bg-primary text-white">1</div>
            <div class="g-col-6 g-col-md-4 g-col-lg-3 bg-primary text-white">1</div>
            <div class="g-col-6 g-col-md-4 g-col-lg-3 bg-primary text-white">1</div>
        </div>
    </div>
@endsection
