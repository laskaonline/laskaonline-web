@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detail admin</h2>
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
                                @if ($admin->photo !==null)
                                    <img src="{{ asset('storage/' . $admin->photo) }}" class="img-thumbnail"
                                         style="width:30%">
                                @else
                                    <span class="badge badge-danger">No Foto</span>
                                @endif
                                <input type="file" name="photo"
                                       class="form-control @error('photo')
                                is-invalid
                                @enderror"
                                       value="{{ $admin->photo }}" accept="image/*"/>
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
                                       value="{{ $admin->name }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="email" name="email" required
                                       class="form-control
                                    @error('email')
                                        is-invalid
                                    @enderror"
                                       value="{{ $admin->email }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">No KTP
                                Pengunjung
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="no_ktp" required
                                       class="form-control
                                    @error('no_ktp')
                                        is-invalid
                                    @enderror"
                                       value="{{ $admin->no_ktp }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">No HP</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="phone"
                                       class="form-control
                                @error('phone')
                                    is-invalid
                                @enderror"
                                       value="{{ $admin->phone }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-sm-3 label-align">Jenis Kelamin </label>
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input type="radio" class="flat" name="gender" id="Laki-laki"
                                               value="Laki-Laki" @checked($admin->gender === 'Laki-Laki')/>
                                        Laki-Laki:
                                        <input type="radio" class="flat" name="gender" id="Perempuan" value="Perempuan"
                                               @checked($admin->gender === 'Perempuan') required/>
                                        Perempuan:
                                    </div>
                                </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="job_title"
                                       class="form-control
                                @error('job_title')
                                    is-invalid
                                @enderror"
                                       value="{{ $admin->job_title }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea required="required" name="address" type="text"
                                          class="form-control @error('address')
                                is-invalid
                                @enderror">{{ $admin->address }}</textarea>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
