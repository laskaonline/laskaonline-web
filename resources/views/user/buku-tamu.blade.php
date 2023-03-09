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
                            <div class="col-md-6 col-sm-6 row">
                                <div class="col">
                                    <a class='btn btn-block btn-primary text-white' data-toggle="collapse" id='open'
                                        data-target="#my_camera"><i class="fa fa-camera px-2"></i> Open cam</a>
                                </div>
                                <div class="row collapse" id="my_camera">
                                    <div class="col-md-6">
                                        <video id="video" width="100%" height="auto"></video>
                                    </div>
                                    <div class="col-md-6 border border-dark">
                                        <canvas id="canvas"></canvas>
                                    </div>
                                    <div class="row x_content">
                                        <a class='btn btn-app h6' id='snap' value="Take Snapshot"
                                            onClick="take_snapshot()"><i class="fa fa-camera"></i>Camera</a>
                                        <input type="hidden" name="image" class="image-tag">
                                        <a class='btn btn-app' id='show'><i class="fa fa-eye"></i>Open Cam</a>
                                        <a class='btn btn-app' id='close'><i class="fa fa-eye-slash"></i>Hide Cam</a>
                                        <a class='btn btn-app' data-toggle="collapse" data-target="#cam" id='exit'><i
                                                class="fa fa-close"></i> close</a>
                                    </div>
                                </div>
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
                                <input name="origin" type="text"required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" type="text" name="nik">
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
                                <input class="form-control" type="text" name="email">
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
