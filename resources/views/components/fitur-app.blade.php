<div class="py-4 bg-secondary text-primary" {{--         style="background-image: url('{{asset('assets/images/bg-testimony.png')}}'); background-position: center; background-repeat: no-repeat" --}}>
    <h2 class="text-uppercase text-center">Fitur Aplikasi</h2>
    <div class="grid gap-lg-2 container-fluid" >
        <div class="g-col-6 g-col-lg-3 d-flex flex-column text-center gap-3 align-items-center">
            <div class="rounded-circle p-3 text-primary border border-primary border-2 min-w-25 w-50">
                <a href="{{ route('item-deposit.index') }}">
                    <img src="{{ asset('assets/images/fitur-titip-barang.png') }}" width="100%" height="100%" fill="currentColor"
                    class="bi bi-folder2-open" viewBox="0 0 16 16" class="img-fluid img-circle">
                </a>
            </div>
            <b class="h4 text-uppercase">
                <a href="{{ route('item-deposit.index') }}">
                    Penitipan Barang
                </a>
            </b>
        </div>
        <div class="g-col-6 g-col-lg-3 d-flex flex-column text-center gap-3 align-items-center">
            <div class="rounded-circle p-3 text-primary border border-primary border-2 min-w-25 w-50">
                <a href="{{ route('appointment.index') }}" >
                    <img src="{{ asset('assets/images/fitur-antrian.png') }}" width="100%" height="100%" fill="currentColor"
                        class="bi bi-database" viewBox="0 0 16 16" class="img-fluid img-circle">
                </a>
            </div>
            <b class="h4 text-uppercase">
                <a href="{{ route('appointment.index') }}" >
                    Kunjungan
                </a>
            </b>
        </div>
        <div class="g-col-6 g-col-lg-3 d-flex flex-column text-center gap-3 align-items-center">
            <div class="rounded-circle p-3 text-primary border border-primary border-2 min-w-25 w-50">
                <a href="{{ route('guest-book.public') }}">
                    <img src="{{ asset('assets/images/fitur-guests-book.png') }}" width="100%" height="100%" fill="currentColor"
                    class="bi bi-people-fill" viewBox="0 0 16 16" class="img-fluid img-circle">
                </a>
            </div>
            <b class="h4 text-uppercase">
                <a href="{{ route('guest-book.public') }}">
                    Buku Tamu
                </a>
            </b>
        </div>
        <div class="g-col-6 g-col-lg-3 d-flex flex-column text-center gap-3 align-items-center">
            <div class="rounded-circle p-3 text-primary border border-primary border-2 min-w-25 w-50">
                <a href="{{ route('admin.wartelsuspas.index') }}" >
                    <img src="{{ asset('assets/images/fitur-wartelsuspas.png') }}" width="100%" height="100%" fill="currentColor"
                        class="bi bi-basket-fill" viewBox="0 0 16 16" class="img-fluid img-circle">
                </a>
            </div>
            <b class="h4 text-uppercase">
                <a href="{{ route('admin.wartelsuspas.index') }}">
                    Wartelsuspas
                </a>
            </b>
        </div>
    </div>
</div>
