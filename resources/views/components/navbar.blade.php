<nav class="navbar bg-secondary  navbar-expand-lg">
    <div class="container-fluid">
        <br>
        <a href="/" class="navbar-brand">
            <img src="{{ asset('assets/images/SINI-BANG-Kanan-Biru.png') }}" alt="Logo Kemenkumham" class="img-fluid"  width="600px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-lg-auto mb-2 mb-lg-0">
                {{-- //TODO: Active Link --}}
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        Home
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        Sekilas Laksa
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('item-deposit.index') }}">
                        Titipan Barang
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('appointment.index') }}">
                        Kunjungan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">
                        Contact
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/faq">
                        FAQ
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="/login">
                        Administrator
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
