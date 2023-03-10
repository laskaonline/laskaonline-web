@extends('layouts.users.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3> Registrasi Titip barang
            </h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Pengunjung</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li></li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama WBP
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Blok Kamar
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="last-name" name="last-name" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kasus</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="middle-name" class="form-control" type="text" name="middle-name">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Hubungan</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="middle-name" class="form-control" type="text" name="middle-name">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tanggal
                            Penitipan</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"
                                required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'"
                                onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <script>
                                function timeFunctionLong(input) {
                                    setTimeout(function() {
                                        input.type = 'text';
                                    }, 60000);
                                }
                            </script>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Perkara
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="middle-name" class="form-control" type="text" name="middle-name">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Foto Selfie + KTP
                            Penitip</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" class="form-control" id="customFile" />
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="customFile">Upload Kartu
                            Keluarga</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" class="form-control" id="customFile" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Barang</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col">
                    <a class="btn btn-primary text-white" onclick="additem(); return false"><i
                            class="fa fa-plus px-2"></i>Tambah barang</a>
                </div>
                <div class="card-box table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Foto Barang</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="itemlist">
                            <tr>
                                <td><input type="text" id="first-name" required="required" class="form-control ">
                                </td>
                                <td><input type="text" id="first-name" required="required" class="form-control ">
                                </td>
                                <td><input type="file" class="form-control" /></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button class='btn btn-block btn-success text-white'><i class="fa fa-save px-2"></i> Submit Pengajuan</button>
    </div>
@endsection
