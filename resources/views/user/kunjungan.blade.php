@extends('layouts.users.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Daftar Kunjungan</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a href="{{ route('appointment.create') }}">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus pr-2"></i>Kunjungan</button>
                </a>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>History Kunjungan</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li></li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id Transaksi</th>
                                        <th>Nama WBP</th>
                                        <th>Blok Kamar</th>
                                        <th>Kasus</th>
                                        <th>Hubungan</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($dataAppointment as $appointment )
                                        <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td><a href="{{ route('appointment.show',['appointment'=>$appointment]) }}" type="button"
                                                class="btn btn-outline-primary" data-mdb-ripple-color="dark">
                                                Detail</a></td>
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
