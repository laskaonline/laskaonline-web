@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detail Wartelsuspas</h2>
                    <div class="pull-right">
                        <label class="col-form-label col-md-4">Created By
                        </label>
                        <div class="row">
                            <input type="text" name="name_wbp" required="required"
                                   class="form-control
                            @error('name_wbp')
                                is-invalid
                            @enderror"
                                   value="{{ $userData->name }}" readonly>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                        
                </div>
                <div class="x_content">
                    <br/>

                    <form class="form-horizontal form-label-left"
                          enctype="multipart/form-data">
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
                        @method('PUT')
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama WBP
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="name_wbp" required="required"
                                       class="form-control
                                @error('name_wbp')
                                    is-invalid
                                @enderror"
                                       value="{{ $wartelSuspasData->name_wbp }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Bin WBP
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="bin_wbp" required="required"
                                       class="form-control
                                @error('bin_wbp')
                                    is-invalid
                                @enderror"
                                       value="{{ $wartelSuspasData->bin_wbp }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Blok & Kamar
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="block_and_room" required="required"
                                       class="form-control
                                @error('block_and_room')
                                    is-invalid
                                @enderror"
                                       value="{{ $wartelSuspasData->block_and_room }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NO HP Tujuan
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="destination_phone" required="required"
                                       class="form-control
                                @error('destination_phone')
                                    is-invalid
                                @enderror"
                                       value="{{ $wartelSuspasData->destination_phone }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Hubungan
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="relationship" required="required"
                                       class="form-control
                                @error('relationship')
                                    is-invalid
                                @enderror"
                                       value="{{ $wartelSuspasData->relationship }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="address" required="required"
                                       class="form-control
                                @error('address')
                                    is-invalid
                                @enderror"
                                       value="{{ $wartelSuspasData->address }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Informasi
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="information" required="required"
                                       class="form-control
                                @error('information')
                                    is-invalid
                                @enderror"
                                       value="{{ $wartelSuspasData->information }}" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
