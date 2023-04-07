@extends('layouts.users.app')

@section('content')
    <a href="https://survei.balitbangham.go.id/ly/K1C9pQsg" type="button" class="btn btn-warning text-red col-md-12 col-sm-12"
        target="_blank">Beri Rating Penilaian</a>
    <div class="page-title">
        <div class="title_left">
            <h3> Detail Titip barang
            </h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 ">
        <div class="col-md-6 col-sm-6 ">
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
                                <input type="text" name="name_wbp" required="required"
                                    class="form-control 
                                @error('name_wbp')
                                    is-invalid
                                @enderror"
                                    value="{{ $item_deposit->name_wbp }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Blok Kamar
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="room_block" required="required"
                                    class="form-control 
                                    @error('room_block')
                                        is-invalid
                                    @enderror"
                                    value="{{ $item_deposit->room_block }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kasus</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input
                                    class="form-control 
                                @error('case')
                                    is-invalid
                                @enderror"
                                    value="{{ $item_deposit->case }}" type="text" name="case" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Hubungan</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input
                                    class="form-control
                                    @error('relationship')
                                        is-invalid
                                    @enderror"
                                    value="{{ $item_deposit->relationship }}" type="text" name="relationship" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tanggal
                                Penitipan</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="deposit_date"
                                    class="date-picker form-control
                                    @error('deposit_date')
                                        is-invalid
                                    @enderror"
                                    value="{{ $item_deposit->deposit_date }}" placeholder="dd-mm-yyyy" type="text"
                                    onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'"
                                    onblur="this.type='text'" onmouseout="timeFunctionLong(this)" readonly>
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
                                <input
                                    class="form-control 
                                    @error('problem')
                                        is-invalid
                                    @enderror"
                                    value="{{ $item_deposit->problem }}" type="text" name="problem" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="customFile">Kartu
                                Keluarga</label>
                            <div class="col-md-6 col-sm-6 ">
                                <a href="{{ asset('storage/' . $item_deposit->family_card) }}" target="_blank"
                                    class="btn btn-secondary"><i class="fa fa-download"></i>
                                    Download</a>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Status Kunjungan
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="state" class="custom-select" id="kategori_project" disabled>
                                    <option @php if($item_deposit->state=="0"){echo "selected";} @endphp value="0">
                                        Waiting</option>
                                    <option @php if($item_deposit->state=="1"){echo "selected";} @endphp value="1">
                                        Done</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Pengunjung</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-6 col-sm-6">
                        <a type="button" data-toggle="modal" data-target=".modal-photo-visitor">
                            @if ($item_deposit->photo_visitor)
                                <img src="{{ asset('storage/' . $item_deposit->photo_visitor) }}" class="img-thumbnail"
                                    style="width:100%">
                            @else
                                <span class="badge badge-danger">No Foto</span>
                            @endif
                        </a>
                        <div class="modal fade modal-photo-visitor" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Foto Pengunjung</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($item_deposit->photo_visitor)
                                            <img src="{{ asset('storage/' . $item_deposit->photo_visitor) }}" class="img-thumbnail"
                                                style="width:100%">
                                        @else
                                            <span class="badge badge-danger">No Foto</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        {!! QrCode::size(200)->generate(json_encode(['item_deposit_id' => $item_deposit->id])) !!}
                        <h2><strong>ID Transaksi : {{ $item_deposit->id }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
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
                <div class="card-box table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Foto Barang</th>
                            </tr>
                        </thead>
                        <tbody id="itemlist">
                            @foreach ($item_deposit->items()->get() as $item)
                                <tr>
                                    <td><input type="text" name="name" required="required"
                                            class="form-control
                                        @error('name')
                                            is-invalid
                                        @enderror"
                                            value="{{ $item->name }}" readonly>
                                    </td>
                                    <td><input type="text" name="amount" required="required"
                                            class="form-control
                                        @error('amount')
                                            is-invalid
                                        @enderror"
                                            value="{{ $item->amount }}" readonly>
                                    </td>
                                    <td>
                                        <a type="button" data-toggle="modal" data-target=".modal-photo-deposit<?php echo $item->id; ?>">
                                            @if ($item->photo)
                                                <img src="{{ asset('storage/' . $item->photo) }}" class="img-thumbnail"
                                                    style="max-width:100px">
                                            @else
                                                <span class="badge badge-danger">No Foto</span>
                                            @endif
                                        </a>
                                        <div class="modal fade modal-photo-deposit<?php echo $item->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Foto Barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($item->photo)
                                                            <img src="{{ asset('storage/' . $item->photo) }}" class="img-thumbnail"
                                                                style="max-width:100%">
                                                        @else
                                                            <span class="badge badge-danger">No Foto</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 pb-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Status Validasi Barang</h2>
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
                                <th>Divalidasi Oleh</th>
                                <th>Foto Kondisi Barang</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="itemlist">
                            @foreach ($dataApproveItemDeposit as $ApproveItemDeposit)
                                <tr>
                                    <td><input type="text" name="name_user" required="required"
                                            class="form-control
                                        @error('name_user')
                                            is-invalid
                                        @enderror"
                                            value="{{ $ApproveItemDeposit->user->name }}" readonly>
                                    </td>
                                    <td>
                                        <a type="button" data-toggle="modal" data-target=".modal-photo-deposit-approve<?php echo $ApproveItemDeposit->id; ?>">
                                            @if ($ApproveItemDeposit->photo)
                                                <img src="{{ asset('storage/' . $ApproveItemDeposit->photo) }}"
                                                    class="img-thumbnail" style="max-width:100px">
                                            @else
                                                <span class="badge badge-danger">No Foto</span>
                                            @endif
                                        </a>
                                        <div class="modal fade modal-photo-deposit-approve<?php echo $ApproveItemDeposit->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Foto Kondisi Barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($ApproveItemDeposit->photo)
                                                            <img src="{{ asset('storage/' . $ApproveItemDeposit->photo) }}"
                                                                class="img-thumbnail" style="max-width:100px">
                                                        @else
                                                            <span class="badge badge-danger">No Foto</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ "Approve $loop->iteration" }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
