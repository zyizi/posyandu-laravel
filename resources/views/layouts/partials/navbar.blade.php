<header class="p-3 bg-primary text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home.index') }}" class="nav-link px-2 text-white">Beranda</a></li>
                <li><a href="{{ route('create') }}" class="nav-link px-2 text-white">Pendaftaran</a></li>
                <li><a href="{{ route('pengukuran') }}" class="nav-link px-2 text-white">Pengukuran</a></li>
                <li><a href="{{ route('showHistory') }}" class="nav-link px-2 text-white">Riwayat</a></li>
            </ul>

            @auth
            {{auth()->user()->name}}
            <div class="text-end">
                <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
            </div>
            @endauth

            @guest
            <div class="text-end">
                <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
            </div>
            @endguest
        </div>
    </div>
</header>
