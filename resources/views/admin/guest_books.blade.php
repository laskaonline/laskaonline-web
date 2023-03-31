@extends('layouts.admin.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Daftar Buku Tamu</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Buku Tamu</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="POST" action="{{ route('admin.guest-book.filter') }}">
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
                            <div class="col-sm-5">
                                <div class="item form-group">
                                    <label for="start_date">Start Date</label>
                                    <input id="start_date" name="start_date" class="date-picker form-control" placeholder="dd-mm-yyyy"
                                        type="text" required onfocus="this.type='date'" onmouseover="this.type='date'"
                                        onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="item form-group">
                                    <label for="end_date">End Date</label>
                                    <input id="end_date" name="end_date" class="date-picker form-control" placeholder="dd-mm-yyyy"
                                        type="text" required onfocus="this.type='date'" onmouseover="this.type='date'"
                                        onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary" id="submit-btn">
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    Filter
                                </button>
                            </div>
                        </form>
                        <hr>
                        <div class="card-box table-responsive">
                            <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Asal Instalasi/Institusi/Organisasi</th>
                                        <th>NIK</th>
                                        <th>Email</th>
                                        <th>Tanggal</th>
                                        <th>Acction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataGuestBook as $guestbook)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $guestbook->name }}</td>
                                            <td>{{ $guestbook->origin }}</td>
                                            <td>{{ $guestbook->nik }}</td>
                                            <td>{{ $guestbook->email }}</td>
                                            <td>{{ $guestbook->created_at }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.guest-book.show',['guest_book'=>$guestbook]) }}"
                                                    type="button"
                                                    class="btn btn-outline-primary"
                                                    data-mdb-ripple-color="dark">
                                                    Detail</a>
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
    <div class="clearfix"></div>
@endsection
