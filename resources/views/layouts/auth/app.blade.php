<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laska Online | Auth</title>

    {{-- style --}}
    @stack('before-style')
    @include('components.auth.style')
    @stack('after-style')
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            {{-- content --}}
            @stack('before-content')
            @yield('content')
            @stack('after-content')
        </div>
    </div>
</body>

</html>
