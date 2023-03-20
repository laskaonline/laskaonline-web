@extends('layouts.admin.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Dashboard Admin</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="tile_count">
                <div class="x_panel">
                    <div class="col-sm-3  tile_stats_count">
                        <span class="count_top d-flex justify-content-center"><i class="fa fa-table px-2"></i> Jumlah
                            Kunjungan</span>
                        <div class="count d-flex justify-content-center">{{ $count_appointment }}</div>
                    </div>
                    <div class=" col-sm-3  tile_stats_count">
                        <span class="count_top d-flex justify-content-center"><i class="fa fa-cubes px-2"></i> Jumlah Penitipan
                            Barang</span>
                        <div class="count d-flex justify-content-center">{{ $count_item_deposit }}</div>
                    </div>
                    <div class="col-sm-3  tile_stats_count">
                        <span class="count_top d-flex justify-content-center"><i class="fa fa-phone px-2"></i> Jumlah Wartelsuspas</span>
                        <div class="count d-flex justify-content-center">{{ $count_wartelsuspas }}</div>
                    </div>
                    <div class="col-sm-3  tile_stats_count">
                        <span class="count_top d-flex justify-content-center"><i class="fa fa-book px-2"></i> Jumlah Buku Tamu</span>
                        <div class="count d-flex justify-content-center">{{ $count_guest_book }}</div>
                    </div>
                </div>
            </div>
            <div class="tile_count">
                <div class="x_panel">
                    <div class="col-sm-3  tile_stats_count">
                        <span class="count_top d-flex justify-content-center"><i class="fa fa-table px-2"></i> Jumlah
                            Kunjungan Hari Ini</span>
                        <div class="count d-flex justify-content-center">{{ $count_date_appointment }}</div>
                    </div>
                    <div class=" col-sm-3  tile_stats_count">
                        <span class="count_top d-flex justify-content-center"><i class="fa fa-cubes px-2"></i> Jumlah Penitipan
                            Barang Hari Ini</span>
                        <div class="count d-flex justify-content-center">{{ $count_date_item_deposit }}</div>
                    </div>
                    <div class="col-sm-3  tile_stats_count">
                        <span class="count_top d-flex justify-content-center"><i class="fa fa-phone px-2"></i> Jumlah Wartelsuspas Hari Ini</span>
                        <div class="count d-flex justify-content-center">{{ $count_date_wartelsuspas }}</div>
                    </div>
                    <div class="col-sm-3  tile_stats_count">
                        <span class="count_top d-flex justify-content-center"><i class="fa fa-book px-2"></i> Jumlah Buku Tamu Hari Ini</span>
                        <div class="count d-flex justify-content-center">{{ $count_date_guest_book }}</div>
                    </div>
                </div>
                
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Nomor Antrian {{ now()->toDateString() }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <div class="pull-right">
                            <a href="{{ route('appointment.index') }}">
                                <button type="submit" class="btn btn-primary">View All</button>
                            </a>
                        </div>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">

                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Transaksi</th>
                                            <th>Nama WBP</th>
                                            <th>Blok Kamar</th>
                                            <th>Kasus</th>
                                            <th>Hubungan</th>
                                            <th>Tanggal Kunjungan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_appointment as $appointment )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>  
                                                <td>{{ $appointment->id }}</td>
                                                <td>{{ $appointment->name_wbp }}</td>
                                                <td>{{ $appointment->room_block }}</td>
                                                <td>{{ $appointment->case }}</td>
                                                <td>{{ $appointment->relationship }}</td>
                                                <td>{{ $appointment->visit_date }}</td>
                                                <td>
                                                    @if($appointment->state=="0")
                                                        <b>Waiting</b>
                                                    @elseif($appointment->state=="1")
                                                        <b>Done</b>
                                                    @endif
                                                </td>
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
            <div class="x_panel">

                <div class="x_title">
                    <h2>Daftar Titipan Barang {{ now()->toDateString() }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <div class="pull-right">
                            <a href="{{ route('item-deposit.index') }}">
                                <button type="submit" class="btn btn-primary">View All</button>
                            </a>
                        </div>
                    </ul>
                    <div class="clearfix">
                    </div>
                    <hr />
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">

                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Transaksi</th>
                                            <th>Nama WBP</th>
                                            <th>Blok Kamar</th>
                                            <th>Kasus</th>
                                            <th>Hubungan</th>
                                            <th>Tanggal Penitipan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_item_deposit as $item_deposit)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item_deposit->id }}</td>
                                                <td>{{ $item_deposit->name_wbp }}</td>
                                                <td>{{ $item_deposit->room_block }}</td>
                                                <td>{{ $item_deposit->case }}</td>
                                                <td>{{ $item_deposit->relationship }}</td>
                                                <td>{{ $item_deposit->date_deposit }}</td>
                                                <td>
                                                    @if($item_deposit->state=="0")
                                                        <b>Waiting</b>
                                                    @elseif($item_deposit->state=="1")
                                                        <b>Done</b>
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('item-deposit.show',['item_deposit'=>$item_deposit]) }}" type="button"
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
    </div>
@endsection
