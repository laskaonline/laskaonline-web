@extends('layouts.users.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3> Registrasi Kunjungan
            </h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 ">
        <form method="POST" action="{{ route('appointment.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
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

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama WBP
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="name_wbp" class="form-control" required>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Blok Kamar
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="room_block" class="form-control" required>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kasus</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" type="text" name="case" required>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Hubungan</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" type="text" name="relationship" required>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tanggal
                            Kunjungan</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="visit_date" class="date-picker form-control" placeholder="dd-mm-yyyy"
                                type="text" required onfocus="this.type='date'" onmouseover="this.type='date'"
                                onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" min="<?php echo date("Y-m-d"); ?>">
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
                            <input class="form-control" type="text" name="problem" required>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Foto Selfie + KTP
                            Penitip</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" class="form-control" name="photo_visitor" required/>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="customFile">Upload Kartu
                            Keluarga</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" class="form-control" name="family_card" required/>
                        </div>
                    </div>

                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Jumlah Pengikut</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="card-box table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Laki-laki</th>
                                    <th>Perempuan</th>
                                    <th>Anak</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><input type="number" name="male_followers" required class="form-control ">
                                    </td>
                                    <td><input type="number" name="female_followers" required class="form-control ">
                                    </td>
                                    <td><input type="number" name="child_followers" required class="form-control ">
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                                    
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <x-honeypot />
            <button class='btn btn-block btn-success text-white'><i class="fa fa-save px-2"></i> Submit Pengajuan</button>
        </form>
    </div>
@endsection
