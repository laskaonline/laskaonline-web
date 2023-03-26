<div class="py-5 px-1 bg-secondary text-primary" {{--         style="background-image: url('{{asset('assets/images/bg-testimony.png')}}'); background-position: center; background-repeat: no-repeat" --}}>
    <h2 class="pb-3 text-uppercase text-center"><strong>Fitur Aplikasi</strong> </h2>
    <div class="grid gap-lg-2 container-fluid" >
        <div class="g-col-6 g-col-lg-3 d-flex flex-column text-center gap-2 align-items-center">
            <div class="min-w-25 w-50">
                <a href="{{ route('item-deposit.index') }}">
                    <img src="{{ asset('assets/images/fitur-titip-barang.png') }}" width="120px"  fill="currentColor"
                    class="img-fluid img-circle">
                </a>
            </div>
            <b class="h5 text-uppercase">
                <a href="{{ route('item-deposit.index') }}">
                    <strong> Penitipan Barang </strong>
                </a>
            </b>
        </div>
        <div class="g-col-6 g-col-lg-3 d-flex flex-column text-center gap-2 align-items-center">
            <div class="min-w-25 w-50">
                <a href="{{ route('appointment.index') }}" >
                    <img src="{{ asset('assets/images/fitur-antrian.png') }}" width="120px" fill="currentColor"
                        class="img-fluid img-circle">
                </a>
            </div>
            <b class="h5 text-uppercase">
                <a href="{{ route('appointment.index') }}" >
                    <strong>Kunjungan</strong> 
                </a>
            </b>
        </div>
        <div class="g-col-6 g-col-lg-3 d-flex flex-column text-center gap-2 align-items-center">
            <div class="min-w-25 w-50">
                <a href="{{ route('guest-book.public') }}">
                    <img src="{{ asset('assets/images/fitur-guests-book.png') }}" width="120px" fill="currentColor"
                    class="img-fluid img-circle">
                </a>
            </div>
            <b class="h5 text-uppercase">
                <a href="{{ route('guest-book.public') }}">
                    <strong>Buku Tamu</strong> 
                </a>
            </b>
        </div>
        <div class="g-col-6 g-col-lg-3 d-flex flex-column text-center gap-2 align-items-center">
            <div class="min-w-25 w-50">
                <a href="{{ route('admin.wartelsuspas.index') }}" >
                    <img src="{{ asset('assets/images/fitur-wartelsuspas.png') }}" width="120px" fill="currentColor"
                         class="img-fluid img-circle">
                </a>
            </div>
            <b class="h5 text-uppercase">
                <a href="{{ route('admin.wartelsuspas.index') }}">
                    <strong>Wartelsuspas</strong> 
                </a>
            </b>
        </div>
    </div>
</div>
