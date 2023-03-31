@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detail Wartelsuspas</h2>
                    
                    <div class="clearfix"></div>
                        
                </div>
                <div class="x_content">
                    <br/>

                    <form method="POST" action="{{ route('admin.wartelsuspas.store') }}" class="form-horizontal form-label-left"
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
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama WBP
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="name_wbp" required="required"
                                       class="form-control" >
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Bin WBP
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="bin_wbp" required="required"
                                       class="form-control" >
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Blok & Kamar
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="block_and_room" required="required"
                                       class="form-control" >
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NO HP Tujuan
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="destination_phone" required="required"
                                       class="form-control" >
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Hubungan
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="relationship" required="required"
                                       class="form-control" >
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="address" required="required"
                                       class="form-control" >
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Informasi
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="information" required="required"
                                       class="form-control" >
                            </div>
                        </div>
                        <x-honeypot />
                        <button type="submit" class='btn btn-block btn-success text-white' id="submit-btn">
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            <i class="fa fa-save px-2"></i> 
                            Submit Wartelsuspas
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
