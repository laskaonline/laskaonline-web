@extends('layouts.admin.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3> Detail Kunjungan
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
                                value="{{ $appointment->name_wbp }}" readonly>
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
                                    value="{{ $appointment->room_block }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kasus</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" type="text" name="case" class="form-control
                                    @error('case')
                                        is-invalid
                                    @enderror"
                                    value="{{ $appointment->case }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Hubungan</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" type="text" name="relationship" class="form-control
                                    @error('relationship')
                                        is-invalid
                                    @enderror"
                                    value="{{ $appointment->relationship }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tanggal
                                Kunjungan</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="visit_date" class="date-picker form-control
                                    @error('visit_date')
                                        is-invalid
                                    @enderror"
                                    value="{{ $appointment->visit_date }}" placeholder="dd-mm-yyyy"
                                    type="text" onfocus="this.type='date'"
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
                                <input id="middle-name" type="text" name="problem" class="form-control
                                    @error('problem')
                                        is-invalid
                                    @enderror"
                                    value="{{ $appointment->problem }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="customFile">Kartu
                                Keluarga</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <a href="{{ asset('file/' . $appointment->family_card) }}" target="_blank" class="btn btn-secondary"><i class="fa fa-download"></i>
                                        Download</a>
                                </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Status Kunjungan
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="state" class="custom-select" id="kategori_project" disabled>
                                    <option @php if($appointment->state=="0"){echo "selected";} @endphp value="0">Waiting</option>
                                    <option
                                        @php if($appointment->state=="1"){echo "selected";} @endphp value="1">
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
                    <h2>Data Barang</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-6 col-sm-6">
                        @if ($appointment->photo_visitor)
                            <img src="{{ asset('file/' . $appointment->photo_visitor) }}" class="img-thumbnail" style="width:100%">
                        @else
                        <span class="badge badge-danger">No Foto</span>
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div>
                            <div class="border border-dark rounded p-3 bg-secondary text-white bg-gradient">
                                <center>
                                    <h4>Nomor Antrian :</h4>
                                    <h1 class="display-1"><strong>{{ $appointment->queue }}</strong></h1>
                                    <h4>Tanggal Kunjungan :</h4>
                                    <h4>{{ $appointment->visit_date }}</h4>
                                </center>
                            </div>
                            <p>Note :</p>
                            <p>Nomor Antrian <= 20 : <br> Jam Kunjungan 08.00 s/d 11.30</p>
                            <p>Nomor Antrian >= 20 : <br> Jam Kunjungan 12.30 s/d 15.30</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
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
                                <td><input type="text" name="male_followers" required="required" class="form-control 
                                        @error('male_followers')
                                            is-invalid
                                        @enderror"
                                        value="{{ $appointment->male_followers }}"
                                        readonly>
                                </td>
                                <td><input type="text" name="female_followers" required="required" class="form-control 
                                    @error('female_followers')
                                        is-invalid
                                    @enderror"
                                    value="{{ $appointment->female_followers }}"
                                        readonly>
                                </td>
                                <td><input type="text" name="child_followers" required="required" class="form-control 
                                    @error('child_followers')
                                        is-invalid
                                    @enderror"
                                    value="{{ $appointment->child_followers }}"
                                        readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                            @foreach ($appointment->items()->get() as $item)
                                <tr>
                                    <td><input type="text" name="name" required="required" class="form-control
                                        @error('name')
                                            is-invalid
                                        @enderror"
                                        value="{{ $item->name }}"
                                            readonly>
                                    </td>
                                    <td><input type="text" name="amount" required="required" class="form-control
                                        @error('amount')
                                            is-invalid
                                        @enderror"
                                        value="{{ $item->amount }}"
                                            readonly>
                                    </td>
                                    <td>
                                        @if ($item->photo)
                                        <img src="{{ asset('file/' . $item->photo) }}" class="img-thumbnail" style="max-width:100px">
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
    <div class="col-md-12 col-sm-12 pb-4">
        <div class="x_panel">
            @if ($appointment->state == "0")
            <form method="POST" action="{{ route('admin.appointment.approve',['appointment'=>$appointment]) }}">
                @csrf
                <x-honeypot />
                <button type="submit" class='btn btn-block btn-success text-white'><i class="fa fa-save px-2"></i> Validasi Kedatangan</button>    
            </form>
            @else
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Status Kedatangan</h2>
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
                                        <th>Valdasi Kedatangan Oleh</th>
                                        <th>Jam Kedatangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="female_followers" required="required" class="form-control 
                                            @error('female_followers')
                                                is-invalid
                                            @enderror"
                                            value="{{ $appointment->user->name }}"
                                                readonly>
                                        </td>
                                        <td><input type="text" name="child_followers" required="required" class="form-control 
                                            @error('child_followers')
                                                is-invalid
                                            @enderror"
                                            value="{{ $appointment->approve_date }}"
                                                readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        @endif
        </div>
        
        
    </div>
@endsection
