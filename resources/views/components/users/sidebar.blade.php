<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('dashboard') }}" class="site_title">
                <img src="{{ asset('/assets/images/logo-sini-bang-right-color-white-no-background-small-size.png') }}"
                    class="img-fluid " style="max-width:70%;" alt=" Responsive image">
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <br>
            <div class="profile_pic col">
                @if (auth()->check())
                @if (auth()->user()->photo)
                <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="..." class="img-thumbnail profile_img"
                    style="width:100%">
                @else
                <span class="badge badge-danger">No Foto</span>
                @endif
                @else
                <p>Anda Belum Login</p>
                @endif

            </div>
            <div class="col-md-1">
                <span>Welcome,</span>
                @if (auth()->check())
                <p><strong>{{ auth()->user()->name }}</strong></p>
                @else
                <p>Anda Belum Login</p>
                @endif
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>

                <ul class="nav side-menu">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.index') }}"><i class="fa fa-user"></i> Profil </a>
                    </li>
                    <li><a href="{{ route('item-deposit.index') }}"><i class="fa fa-cubes"></i> Titipan Barang </a>
                    </li>
                    <li><a href="{{ route('appointment.index') }}"><i class="fa fa-table"></i> Nomor Antrian </a>
                    </li>
                    <li><a href="{{ route('guest-book.public') }}"><i class="fa fa-book"></i> Buku Tamu </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>