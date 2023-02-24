@extends('layouts.main')
@section('title')
    Home | Laska Online
@endsection
@section('content')
    <x-navbar/>
    <img src="{{asset('/assets/images/personnel.png')}}" alt="Personnel" class="img-fluid">
    <div class="container-lg my-2">
        <h3 class="text-uppercase text-center">
            Informasi Unit Satuan Kerja
        </h3>
        <div class="row gap-md-2">
            <div class="col col-6 col-md-3 d-flex flex-column text-center gap-3 align-items-center">
                <div class="rounded-circle p-2 border border-secondary border-2 ratio ratio-1x1 w-50">
                    <i class="bi bi-folder2-open text-secondary"></i>
                </div>
                <b>
                    Informasi Prosedur Layanan
                </b>
                <p>
                    Berisi seluruh informasi prosedur layanan yang rnendasari pelaksanoan tugas pokok dan fungsi Lembaga
                    Pemasyarakatan
                </p>
            </div>
            <div class="col col-6 col-md-3 d-flex flex-column">
                <div class="rounded-circle p-2">
                    ICON
                </div>
            </div>
            <div class="col col-6 col-md-3 d-flex flex-column">
                <div class="rounded-circle p-2">
                    ICON
                </div>
            </div>
            <div class="col col-6 col-md-3 d-flex flex-column">
                <div class="rounded-circle p-2">
                    ICON
                </div>
            </div>
        </div>
    </div>
@endsection
