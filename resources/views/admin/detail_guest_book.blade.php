@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detail Buku Tamu</h2>
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="customFile">Foto
                                Pengunjung</label>
                            <div class="col-md-6 col-sm-6 ">
                                <a type="button" data-toggle="modal" data-target=".modal-photo-visitor">
                                    @if ($guest_book->photo !==null)
                                        <img src="{{ asset('storage/' . $guest_book->photo) }}" class="img-thumbnail"
                                            style="width:30%">
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
                                                @if ($guest_book->photo !==null)
                                                    <img src="{{ asset('storage/' . $guest_book->photo) }}" class="img-thumbnail"
                                                        style="width:100%">
                                                @else
                                                    <span class="badge badge-danger">No Foto</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="name" required="required"
                                       class="form-control
                                @error('name')
                                    is-invalid
                                @enderror"
                                       value="{{ $guest_book->name }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Asal Instalasi/Instansi/Organisasi
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="origin" required="required"
                                       class="form-control
                                @error('origin')
                                    is-invalid
                                @enderror"
                                       value="{{ $guest_book->origin }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="nik" required="required"
                                       class="form-control
                                @error('nik')
                                    is-invalid
                                @enderror"
                                       value="{{ $guest_book->nik }}" readonly>
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
                                       value="{{ $guest_book->address }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="email" required="required"
                                       class="form-control
                                @error('email')
                                    is-invalid
                                @enderror"
                                       value="{{ $guest_book->email }}" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Keperluan
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="necessity" required="required"
                                       class="form-control
                                @error('necessity')
                                    is-invalid
                                @enderror"
                                       value="{{ $guest_book->necessity }}" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
