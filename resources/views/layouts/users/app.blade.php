<!DOCTYPE html>
<html lang="en">

<head>
    {{-- style --}}
    @stack('before-style')
    @include('components.users.style')
    @stack('after-style')

    <title>
        @yield('title')
    </title>
</head>

<body class="nav-md">
    @include('sweetalert::alert')
    <div class="container body">
        <div class="main_container">
            {{-- sidebar --}}
            @include('components.users.sidebar')

            {{-- navbar --}}
            @include('components.users.navbar')

            <!-- page content -->
            <div class="right_col" role="main">
                @stack('before-content')
                @yield('content')
                @stack('after-content')

            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer class="container-fluid py-2 text-white d-flex align-items-center" style="background-color:#002858">
                <span class="mx-auto">&copy; SINI-BANG | Lapas Kelas II.B Sekayu 2023</span>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    {{-- script --}}
    @stack('prepend-script')
    @include('components.users.script')
    @stack('addon-script')
</body>

</html>
