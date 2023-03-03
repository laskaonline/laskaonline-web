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
        <div class="x_panel">
            <div class="card-box table-responsive">

                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Foto Barang</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><input type="text" id="first-name" required="required" class="form-control "></td>
                            <td><input type="text" id="first-name" required="required" class="form-control "></td>
                            <td><input type="file" class="form-control" id="customFile" /></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
