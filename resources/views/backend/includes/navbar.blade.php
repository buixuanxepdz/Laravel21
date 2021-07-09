<nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('backend.dashboard') }}" class="nav-link">Trang chủ</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        {{-- <form class="form-inline ml-3" action="{{ route('backend.product.search') }}" method="POST">
            @csrf
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form> --}}

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
            </li>
        </ul>
    </nav>