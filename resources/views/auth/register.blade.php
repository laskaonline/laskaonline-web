@extends('layouts.auth.app')

@section('content')
    <div id="register" class="animate form login_form">
        <section class="login_content">
            <img src="{{ asset('/assets/images/personnel.png') }}" alt="Personnel" class="img-fluid mx-auto d-block">
            <form>
                <h1>Register Laska</h1>
                <div>
                    <input type="text" class="form-control" placeholder="Nama" required="" />
                </div>
                <div>
                    <input type="email" class="form-control" placeholder="No KTP" required="" />
                </div>
                <div>
                    <input type="email" class="form-control" placeholder="No HP" required="" />
                </div>
                <div>
                    <input type="email" class="form-control" placeholder="Email" required="" />
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Password" required="" />
                </div>
                <div>
                    <input type="email" class="form-control" placeholder="Ulangi Password" required="" />
                </div>
                <div>
                    <a class="btn btn-default submit" href="index.html"><strong>Register</strong></a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">Already a member ?
                        <a href="/login" class="to_register"> Log in </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <p>©2023 Laska Online</p>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
