@extends('layouts.admin.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Management User</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form action="{{ route('admin.manage-user.store') }}" method="post" data-parsley-validate
        class="form-horizontal form-label-left" enctype="multipart/form-data">
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
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="name" required="required" class="form-control ">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="email" required="required" class="form-control">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="no_ktp" required="required" class="form-control ">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Handphone
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="phone" required="required" class="form-control">
            </div>
        </div>
        <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Jabatan
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input name="job_title" class="form-control" type="text">
            </div>
        </div>
        <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Password
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input name="password" class="form-control" type="password">
            </div>
        </div>
        <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ulangi Password
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input name="password_confirmation" class="form-control" type="password">
            </div>
        </div>

        <div class="ln_solid"></div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <x-honeypot />
                <button type="submit" class="btn btn-success" id="submit-btn">
                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    Submit
                </button>
            </div>
        </div>

    </form>
    <div class="ln_solid"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Admin</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>NIK</th>
                                            <th>Handphone</th>
                                            <th>Jabatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->no_ktp }}</td>
                                                <td>{{ $admin->phone }}</td>
                                                <td>{{ $admin->job_title }}</td>
                                                <td>
                                                    <a href="{{ route('admin.manage-user.show',['admin'=>$admin]) }}" type="button"
                                                        class="btn btn-outline-primary" data-mdb-ripple-color="dark">Detail</a>
                                                </td>
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
    <div class="ln_solid"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar User Visitor</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>NIK</th>
                                            <th>Handphone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visitors as $visitor)
                                            <tr>
                                                <td>{{ $visitor->name }}</td>
                                                <td>{{ $visitor->email }}</td>
                                                <td>{{ $visitor->no_ktp }}</td>
                                                <td>{{ $visitor->phone }}</td>
                                                <td>
                                                    <a href="{{ route('admin.manage-user.visitor',['visitor'=>$visitor]) }}" type="button"
                                                        class="btn btn-outline-primary" data-mdb-ripple-color="dark">Detail</a>
                                                </td>
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
    <div class="clearfix"></div>
@endsection
