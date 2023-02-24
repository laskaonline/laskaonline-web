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
        <div class="row gap-md-2 flex-lg-nowrap">
            <x-info-box
                icon="bi bi-folder2-open"
                title="Informasi Prosedur Layanan"
                description="Berisi seluruh informasi prosedur layanan yang rnendasari pelaksanoan tugas pokok dan fungsi Lembaga Pemasyarakatan"
            />
            <x-info-box
                icon="bi bi-database"
                title="Informasi Publik"
                description="Berisi informasi tentang seluruh kegiatan program pembinaan WBP yang dilaksanakan pada I-Init Pelaksana Teknis Pemasyarakatan"
            />
            <x-info-box
                icon="bi bi-people-fill"
                title="Informasi Prosedur Layanan"
                description="Berisi seluruh informasi prosedur layanan yang rnendasari pelaksanoan tugas pokok dan fungsi Lembaga Pemasyarakatan"
            />
            <x-info-box
                icon="bi bi-basket"
                title="Informasi Prosedur Layanan"
                description="Berisi seluruh informasi prosedur layanan yang rnendasari pelaksanoan tugas pokok dan fungsi Lembaga Pemasyarakatan"
            />
        </div>
    </div>
@endsection
