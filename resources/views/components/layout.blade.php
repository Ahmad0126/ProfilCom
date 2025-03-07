<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="header-search">
            <form action="{{ route('konten') }}" method="GET">
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input type="text" name="search" class="form-control search-input" placeholder="Search Here">
                </div>
            </form>
        </div>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ asset('vendors/images/photo1.jpg') }}" alt="">
                    </span>
                    <span class="user-name">{{ auth()->user()->nama }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{ route('password') }}"><i class="dw dw-key1"></i> Password</a>
                    <form action="{{ route('user_logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit">
                            <i class="dw dw-logout"></i> Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('base') }}">
            <img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
            <img src="{{ asset('vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>    
                    <a href="{{ url('home') }}" @class(["dropdown-toggle", "no-arrow", "active" => $pointer == 1])>
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user') }}" @class(["dropdown-toggle", "no-arrow", "active" => $pointer == 2])>
                        <span class="micon dw dw-user2"></span><span class="mtext">User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('konten') }}" @class(["dropdown-toggle", "no-arrow", "active" => $pointer == 4])>
                        <span class="micon dw dw-newspaper-1"></span><span class="mtext">Berita</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-option="off">
                        <span class="micon dw dw-map2"></span><span class="mtext"> Peta </span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('cabang') }}" @class(["active" => $pointer == 7])>
                                Cabang
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('jalur') }}" @class(["active" => $pointer == 8])>
                                Jalur
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('lahan') }}" @class(["active" => $pointer == 9])>
                                Lahan
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('kategori') }}" @class(["dropdown-toggle", "no-arrow", "active" => $pointer == 3])>
                        <span class="micon dw dw-list3"></span><span class="mtext">Kategori & Jenis</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('konfigurasi') }}" @class(["dropdown-toggle", "no-arrow", "active" => $pointer == 5])>
                        <span class="micon dw dw-settings2"></span><span class="mtext">Konfigurasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sosmed') }}" @class(["dropdown-toggle", "no-arrow", "active" => $pointer == 6])>
                        <span class="micon dw dw-chat-11"></span><span class="mtext">Link Sosmed</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            {{ $slot }}
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>