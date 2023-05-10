@extends('layouts.users.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Profil Pengunjung</h2>
                    <div class="pull-right">
                        <!-- Change Password -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Change Password</button>
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('app.password.update') }}">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Change Password</h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="old_password" class="form-label">Old Password</label>
                                                    <input type="password" name="old_password" class="form-control" id="old_password">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="new_password" class="form-label">New Password</label>
                                                    <input type="password" name="new_password" class="form-control" id="new_password">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                                    <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
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
                                @if ($user->photo !== null)
                                    <img src="{{ asset('storage/' . $user->photo) }}" class="img-thumbnail"
                                         style="width:30%">
                                @else
                                    <span class="badge badge-danger">No Foto</span>
                                @endif
                                <input type="file" name="photo"
                                       class="form-control @error('photo')
                                is-invalid
                                @enderror"
                                       value="{{ old('photo', $user->photo) }}" accept="image/*"/>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Pengunjung
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="name" required="required"
                                       class="form-control
                                @error('name')
                                    is-invalid
                                @enderror"
                                       value="{{ old('name',$user->name )}}">
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
                                       value="{{old('no_ktp', $user->no_ktp) }}">
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
                                       value="{{ old('phone', $user->phone) }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-sm-3 label-align">Jenis Kelamin </label>
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input type="radio" class="flat" name="gender" id="Laki-laki"
                                           value="Laki-Laki" @checked(old('gender',  $user->gender === 'Laki-Laki'))/>
                                    Laki-Laki:
                                    <input type="radio" class="flat" name="gender" id="Perempuan" value="Perempuan"
                                           @checked(old('gender', $user->gender === 'Perempuan')) required/>
                                    Perempuan:
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
                                @enderror">{{old('address', $user->address )}}</textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <x-honeypot/>
                                <button type="submit" class="btn btn-success" id="submit-btn">
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
