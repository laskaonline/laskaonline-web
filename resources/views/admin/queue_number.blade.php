@extends('layouts.admin.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Daftar Kunjungan</h3>
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
                        <form method="POST" action="">
                            @csrf
                            <div class="col-sm-5">
                                <div class="item form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" id="start_date" required>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="item form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" class="form-control" id="end_date" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </form>
                        <hr>
                        <div class="card-box table-responsive">
                            <table id="example1" class="table table-striped table-bordered" style="width:100%">
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
                                    @foreach ($dataAppointment as $appointment )
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
                                            <td><a href="{{ route('admin.appointment.show',['appointment'=>$appointment]) }}" type="button"
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
