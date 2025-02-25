<!-- style custom -->
<style>
    html,
    body {
        box-sizing: border-box
        overflow-x: hidden; /* Prevent scroll on narrow devices */
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    #content{
        flex-grow: 1;
        padding-top: 90px;
    }

    .bg-light {
        background-color: #fff !important;
    }

    @media (min-width: 992px) {
        .navbar-collapse .navbar-nav .nav-item.dropdown .dropdown-menu.show {
            margin-top: 12px;
            border-radius: 0 0 3px 3px;
        }
    }

    @media (max-width: 992px) {
        .navbar-collapse .navbar-nav .nav-item.dropdown .dropdown-menu.show {
            position: static;
            box-shadow: none !important;
            border-radius: 3px !important;
            border: var(--bs-border-width) solid var(--bs-border-color) !important;
        }
        .offcanvas-collapse {
            position: fixed;
            top: 58px;
            bottom: 0;
            left: 100%;
            width: 100%;
            border-radius: 10px 10px 0 0;
            padding: 1rem;
            border: var(--bs-border-width) solid var(--bs-border-color);
            overflow-y: auto;
            visibility: hidden;
            background-color: #fff;
            transition: transform .3s ease-in-out, visibility .3s ease-in-out;
        }
        .blog-img {
            border-radius: 10px 10px 0 0 !important;
        }
    }

    @media (min-width: 479px) and (max-width: 992px) {
        .offcanvas-collapse.open {
            top: 64px;
            visibility: visible;
            transform: translateX(-101%);
        }
    }

    @media screen and (max-width: 478px) {
        .offcanvas-collapse.open {
            visibility: visible;
            transform: translateX(-102%);
        }
    }

    .nav-scroller .nav {
        color: rgba(255, 255, 255, .75);
    }

    .nav-link {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1.09rem;
    }

    .nav-link:hover, .nav-link.show {
        color: #007bff !important;
    }
    .nav-link:focus {
        color: #6c757d !important;
    }

    .blog-list ul li,
    section.card-box {
        border: 1px solid var(--bs-border-color);
    }

    section.card-box .list-group .list-group-item:last-child {
        border-radius: 0 0 10px 10px !important;
    }

    /* .footer {
        border-radius: 25px 25px 0 0;
    } */

    .navbar {
        border-bottom: 1px solid #d4d4d4;
    }

    .bg-nav{
        background-color: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(5px);
    }

    .footer .container-fluid .row .col {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 1rem;
    }

    .footer .container-fluid .row .col ul li {
        display: block;
        position: relative;
        transition: all .3s cubic-bezier(0.175, 0.885, 0.32, 1.275);

        &:hover {
            padding-left: 15px;
        }

        &::after {
            position: absolute;
            content: "";
            top: 7px;
            left: 0;
            width: 5px;
            height: 5px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            background-color: #343a40;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
            opacity: 0;
            visibility: hidden;
        }

        &:hover::after {
            opacity: 1;
            visibility: visible;
        }
    }

    .blog-caption h4 a:visited {
        color: #1b00ff;

        &:hover {
            color: #131e22;
        }
    }

    .patterned {
        background-image: linear-gradient(0deg, #17a2b8, transparent, transparent);
    }

    .jumbotron {
        margin-top: 66px;
    }

    .section-wrapper .section-heading .section-title {
        padding: 8px;
        background: linear-gradient(to right, #0077ff, #0091ff, #0077ff);
        width: fit-content;
        color: #fff;
        font-size: 1.8em; 
        text-transform: uppercase;
        border: var(--bs-border-width) solid #fff;
    }

    .section-wrapper:not(:last-child) {
        margin-bottom: 40px;
    }

    .navbar-brand img {
        max-width: 180px;
    }

    @media screen and (max-width: 767px) {
        .offcanvas-collapse.open {
            top: 58px;
        }
        .navbar-brand img {
            max-width: 150px;
        }

        .jumbotron {
            margin-top: 59px;
        }
    }
</style>
<!-- style custom -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-nav p-2" id="navbar" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('base') }}">
            <img src="{{ asset('storage/'.$konfig->logo) }}" alt="Brand Logo">
        </a>
        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse ms-2" id="offcanvasNavbar">
            <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("base") }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("profile") }}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("mapcabang") }}">Cabang</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Berita</a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="{{ route('berita') }}">Semua</a></li>
                        @foreach ($kategori as $k)
                            <li><a class="dropdown-item" href="{{ route('berita_kategori', $k->nama) }}">{{ $k->nama }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <form class="d-flex gap-1 form-horizontal" action="{{ route('berita') }}" method="get" role="search">
                <input class="form-control form-control-info" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ $search }}">
                <button class="btn btn-outline-info" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

{{ $slot }}

<footer class="footer py-5 shadow bg-info" style="border-top: 5px solid #21b7ce;" id="contact">
    <div class="container-fluid px-lg-5">
        <div class="row" data-aos="fade-up">
            <section class="col-12 col-sm-6 col-md-4 mb-3">
                <div class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <img src="{{ asset('storage/'.$konfig->logo) }}" alt="Brand Logo" loading="lazy">
                </div>
                <p class="text-light">
                    <small>© <script>document.write(new Date().getFullYear())</script> {{ $konfig->nama_website }}. <br> All rights reserved.</small>
                </p>
            </section>
            <section class="col-6 col-sm-3 col-md-2 mb-3">
                <h5 class="mb-3 text-light">Quick Links</h5>
                <ul class="nav ms-0 flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('base') }}" class="nav-link p-0 text-light">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('profile') }}" class="nav-link p-0 text-light">About</a></li>
                </ul>
            </section>
        
            <section class="col-6 col-sm-3 col-md-2 mb-3 justify-content-start">
                <h5 class="mb-3 text-light">Social Media</h5>
                <ul class="nav ms-0 flex-column">
                    @foreach ($sosmed as $s)
                        <li class="nav-item mb-2">
                            <a href="{{ $s->url }}" class="nav-link p-0 text-light" target="_blank">
                                <img src="{{ asset('storage/'.$s->logo) }}" alt="" width="23px">
                                {{ $s->nama_sosmed }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
        
            <section class="col-12 col-md-4 mb-3 justify-content-start">
                <h5 class="mb-3 text-light">Contact Us</h5>
                <ul class="nav ms-0 flex-column">
                    @if ($konfig->telepon)
                        <li class="nav-item mb-2 text-light"><i class="icon-copy fa fa-phone" aria-hidden="true"></i> {{ $konfig->telepon }}</li>    
                    @endif
                    @if ($konfig->email)
                        <li class="nav-item mb-2 text-light"><i class="icon-copy fa fa-envelope" aria-hidden="true"></i> {{ $konfig->email }}</li>
                    @endif
                    @if ($konfig->alamat)
                        <li class="nav-item mb-2 text-light">{{ $konfig->alamat }}</li>
                    @endif
                </ul>
            </section>
        </div>
    </div>
</footer>

<script>
    (() => {
        'use strict'

        document.getElementById('navbarSideCollapse').addEventListener('click', () => {
            document.getElementById('offcanvasNavbar').classList.toggle('open');
            document.getElementById('navbar').classList.toggle('bg-light');
            document.getElementById('navbar').classList.toggle('bg-nav');
        });
    })();
</script>