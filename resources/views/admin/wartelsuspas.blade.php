@extends('layouts.admin.app') @section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Daftar Wartelsuspas</h3>
    </div>
    <div class="title_right">
        <div class="pull-right">
            <a href="{{ route('admin.wartelsuspas.create') }}">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-plus pr-2"></i>Add Wartelsuspas</button>
            </a>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Daftar Wartelsuspas</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <table
                            id="example1"
                            class="table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama WBP</th>
                                    <th>BIN WBP</th>
                                    <th>Blok & Kamar</th>
                                    <th>NO HP Tujuan</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataWartelsuspas as $wartelsuspas)
                                <tr>
                                    <td>{{ $wartelsuspas->id }}</td>
                                    <td>{{ $wartelsuspas->name_wbp }}</td>
                                    <td>{{ $wartelsuspas->bin_wbp }}</td>
                                    <td>{{ $wartelsuspas->block_and_room }}</td>
                                    <td>{{ $wartelsuspas->destination_phone }}</td>
                                    <td>{{ $wartelsuspas->information }}</td>
                                    <td>{{ $wartelsuspas->created_at }}</td>
                                    <td>{{ $wartelsuspas->address }}</td>
                                    <td>
                                        <a
                                            href="{{ route('admin.wartelsuspas.show',['wartelsuspas'=>$wartelsuspas]) }}"
                                            type="button"
                                            class="btn btn-outline-primary"
                                            data-mdb-ripple-color="dark">
                                            Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection