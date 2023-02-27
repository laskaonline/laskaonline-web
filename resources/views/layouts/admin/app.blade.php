<!DOCTYPE html>
<html lang="en">

<head>
    {{-- style --}}
    @stack('before-style')
    @include('components.admin.style')
    @stack('after-style')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            {{-- sidebar --}}
            @include('components.admin.sidebar')

            {{-- navbar --}}
            @include('components.admin.navbar')

            <!-- page content -->
            <div class="right_col" role="main">
                @stack('before-content')
                @yield('content')
                @stack('after-content')

            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Admin | Lapas Sekayu
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    {{-- script --}}
    @stack('prepend-script')
    @include('components.admin.script')
    @stack('addon-script')
</body>

</html>
