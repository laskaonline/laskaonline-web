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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Asal Instalasi /
                                Institusi / Organisasi
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" name="last-name" required="required"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="middle-name">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="middle-name">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="middle-name">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nomor
                                Telepon</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="middle-name">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Keperluan</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="middle-name">
                            </div>
                        </div>
                        {{-- Start Open Camera --}}
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Foto
                                Pengunjung</label>
                            <div class=" col-md-6 col-sm-6" id='camcam'>
                                <a class='btn btn-block btn-outline-primary' id='open'> Open Camera</a>
                                <div id='cont'>
                                    <div id="vid" class='son'>
                                        <video id='video'></video>
                                    </div>
                                    <div id="capture" class='son'>
                                        <canvas id='canvas'></canvas>
                                        <canvas id='blank' style='display:none;'></canvas>
                                    </div>
                                    <div id="control">
                                        <div class="col-md-4"><a id='retake' class='btn btn-block m-1 hov'>Refresh</a>
                                        </div>
                                        <div class="col-md-4"><a id='snap' class='btn btn-block m-1 hov'>Picture</a>
                                        </div>
                                        <div class="col-md-4"><a id='close' class='btn btn-block m-1 hov'>Close</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Open Camera --}}
                            <div class="ln_solid"></div>

                        </div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
