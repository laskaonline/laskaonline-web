@extends('layouts.users.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Profil Pengunjung</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Foto Pengunjung
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <form action="form_upload.html" class="dropzone"></form>
                                <br />
                                <br />
                                <br />
                                <br />
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Pengunjung
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">No KTP Pengunjung
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" name="last-name" required="required"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">No HP
                                Pengunjung</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="middle-name">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin Pengunjung</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-secondary" data-toggle-class="btn-primary"
                                        data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="male" class="join-btn"> &nbsp;
                                        Laki-laki
                                        &nbsp;
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary"
                                        data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="female" class="join-btn"> Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Pengunjung<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea id="message" required="required" class="form-control" name="address" type="text"></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
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
