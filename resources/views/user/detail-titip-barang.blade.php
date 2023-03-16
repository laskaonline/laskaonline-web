@extends('layouts.users.app')

@section('content')
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
                                <input type="text" id="first-name" required="required" class="form-control 
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
                                <input type="text" id="last-name" name="last-name" required="required"
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
                                <input id="middle-name" class="form-control 
                                @error('case')
                                    is-invalid
                                @enderror"
                                value="{{ $item_deposit->case }}" type="text" name="middle-name" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Hubungan</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control
                                    @error('relationship')
                                        is-invalid
                                    @enderror"
                                    value="{{ $item_deposit->relationship }}" type="text" name="middle-name" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tanggal
                                Penitipan</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="birthday" class="date-picker form-control
                                    @error('date_deposit')
                                        is-invalid
                                    @enderror"
                                    value="{{ $item_deposit->date_deposit }}" placeholder="dd-mm-yyyy"
                                    type="text" required="required" type="text" onfocus="this.type='date'"
                                    onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'"
                                    onmouseout="timeFunctionLong(this)" readonly>
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
                                <input id="middle-name" class="form-control 
                                    @error('problem')
                                        is-invalid
                                    @enderror"
                                    value="{{ $item_deposit->problem }}" type="text" name="middle-name" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="customFile">Kartu
                                Keluarga</label>
                            <div class="col-md-6 col-sm-6 ">
                                <a href="{{ asset('storage/' . $item_deposit->family_card) }}" target="_blank" class="btn btn-secondary"><i class="fa fa-download"></i>
                                    Download</a>
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
                        @if ($item_deposit->photo_visitor)
                            <img src="{{ asset('storage/' . $item_deposit->photo_visitor) }}" class="img-thumbnail" style="width:100%">
                        @else
                        <span class="badge badge-danger">No Foto</span>
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6">
                        {!! QrCode::size(200)->generate($item_deposit->id); !!}
                        <h2><strong>ID Transaksi : {{ $item_deposit->id }}</strong>
                    </div>
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
                                    <td><input type="text" id="first-name" required="required" class="form-control
                                        @error('problem')
                                            is-invalid
                                        @enderror"
                                        value="{{ $item->name }}"
                                            readonly>
                                    </td>
                                    <td><input type="text" id="first-name" required="required" class="form-control
                                        @error('problem')
                                            is-invalid
                                        @enderror"
                                        value="{{ $item->amount }}"
                                            readonly>
                                    </td>
                                    <td>
                                        @if ($item->photo)
                                        <img src="{{ asset('storage/' . $item->photo) }}" class="img-thumbnail" style="max-width:100px">
                                        @else
                                        <span class="badge badge-danger">No Foto</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
