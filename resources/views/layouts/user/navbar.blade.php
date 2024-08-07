<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                        class="text-white">Jl. Soekarno Hatta Jl. Leuwi Panjang No.211, Situsaeur, Kec. Bojongloa Kidul, Kota Bandung</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                        class="text-white">asikSlalu@gmail.com</a></small>
            </div>
            <div class="top-link pe-2">
                {{-- <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a> --}}
                {{-- <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a> --}}
                <a href="#" class="text-white">
                    <small class="text-white ms-2">
                        @auth
                            {{ Auth::user()->name }}
                        @endauth
                    </small>
                </a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.html" class="navbar-brand">
                <h1 class="text-primary display-6">asikSelalu</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                </div>
                <div class="d-flex m-3 me-0">
                    {{-- @if (Auth::check()) --}}
                        
                    <a href="#" class="position-relative me-4 my-auto" data-bs-toggle="modal" data-bs-target="#searchCart">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span id="cart-count" class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                            {{ count(Session::get('cart', [])) }}
                        </span>
                    </a>
                    {{-- @endif --}}

                    @guest
                        <a href="{{ route('login') }}" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    @endguest


                    @auth
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();" class="my-auto">
                            <i class="fas fa-sign-out-alt fa-2x"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ url('admin/product') }}" class="my-auto ms-3">
                                <i class="fas fa-cog fa-2x"></i>
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

@include('user.cart')


<script>
document.addEventListener('DOMContentLoaded', function () {
    const cartCount = '{{ session('cartCount') }}';
    if (cartCount) {
        document.getElementById('cart-count').innerText = cartCount;
    }
});
</script>
