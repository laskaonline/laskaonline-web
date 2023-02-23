<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a href="/" class="navbar-brand">
            <img src="{{asset('assets/images/navbar-logo.png')}}" alt="Logo Kemenkumham">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-lg-auto mb-2 mb-lg-0">
                {{--//TODO: Active Link--}}
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Sekilas Laksa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/titip">
                        Titipan Barang
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Kunjungan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">
                        Contact
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/faq">
                        FAQ
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
