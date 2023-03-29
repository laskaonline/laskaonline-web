@extends('layouts.admin.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Titipan Barang</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>History Titipan Barang</h2>
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
                                            <th>Tanggal Penitipan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataItemDeposit as $item_deposit)
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
                                                <td><a href="{{ route('admin.item-deposit.show',['item_deposit'=>$item_deposit]) }}" type="button"
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
