@extends('layouts.users.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Profil Pengunjung</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    <form method="POST" action="{{ route('profile.update') }}" class="form-horizontal form-label-left"
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
                                @if (auth()->user()->photo)
                                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" class="img-thumbnail"
                                        style="width:30%">
                                @else
                                    <span class="badge badge-danger">No Foto</span>
                                @endif

                                <input type="file" name="photo"
                                    class="form-control @error('photo')
                                is-invalid
                                @enderror"
                                    value="{{ auth()->user()->photo }}" accept="photo/*" />
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Pengunjung
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="hidden" name="name" required="required"
                                    class="form-control 
                                @error('name')
                                    is-invalid
                                @enderror"
                                    value="{{ auth()->user()->id }}">
                                <input type="text" name="name" required="required"
                                    class="form-control 
                                @error('name')
                                    is-invalid
                                @enderror"
                                    value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">No KTP Pengunjung
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="no_ktp" required="required"
                                    class="form-control 
                                    @error('no_ktp')
                                        is-invalid
                                    @enderror"
                                    value="{{ auth()->user()->no_ktp }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">No HP
                                Pengunjung</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="phone"
                                    class="form-control 
                                @error('phone')
                                    is-invalid
                                @enderror"
                                    value="{{ auth()->user()->phone }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin Pengunjung</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    @if (auth()->user()->gender = 'Laki-Laki')
                                        <label class="btn btn-secondary active focus" data-toggle-class="btn-primary"
                                            data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="Laki-Laki" class="join-btn"> &nbsp;
                                            Laki-laki
                                            &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary"
                                            data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="Perempuan" class="join-btn">
                                            Perempuan
                                        </label>
                                    @else
                                        <label class="btn btn-secondary " data-toggle-class="btn-primary"
                                            data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="Laki-Laki" class="join-btn"> &nbsp;
                                            Laki-laki
                                            &nbsp;
                                        </label>
                                        <label class="btn btn-primary active focus" data-toggle-class="btn-primary"
                                            data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="Perempuan" class="join-btn">
                                            Perempuan
                                        </label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Pengunjung
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea required="required" name="address" type="text"
                                    class="form-control @error('address')
                                is-invalid
                                @enderror">{{ auth()->user()->address }}</textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <x-honeypot />
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
