<style>
    .banner-img {
        width: 100%;
        max-width: 300px;
    }

    @media screen and (max-width: 576px) {
        .banner-img {
            max-width: 200px;
        }
    }
</style>
<nav class="navbar bg-secondary  navbar-expand-lg">
    <div class="container-fluid">
        <a href="/" class="navbar-brand align-self-start">
            <img src="{{ asset('assets/images/logo-sini-bang-right-no-background.png') }}" alt="Logo Kemenkumham"
                class="img-fluid banner-img" style="max-width:170px; padding-left:20px;" alt="Responsive image">
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
                <li class="nav-item">
                    <a href="https://play.google.com/store/apps/details?id=com.kemenkumham.sini_bang_app"
                        target="_blank">
                        <button class="btn btn-primary rounded-pill">
                            <i class="bi bi-android2"></i>
                            Download Sekarang
                            <i class="bi bi-box-arrow-up-right"></i>
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>