@extends('layouts.users.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Buku Tamu</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form action="{{ route('guest-book.store') }}" method="post" data-parsley-validate
                        class="form-horizontal form-label-left" enctype="multipart/form-data">
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
                        @csrf
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Foto Selfie + KTP
                                Penitip</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="file" class="form-control" name="photo" />
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="name" type="text" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Asal Instalasi /
                                Institusi / Organisasi
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="origin" type="text" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="number" name="nik">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" name="address">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="email" name="email">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor
                                Telepon</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" name="phone">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Keperluan</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" name="necessity">
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <x-honeypot />
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
