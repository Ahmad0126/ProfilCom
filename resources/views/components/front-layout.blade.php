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

    .nav-scroller .nav-link {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: .875rem;
        color: #6c757d;
    }

    .nav-scroller .nav-link:hover {
        color: #007bff;
    }

    .nav-scroller .active {
        font-weight: 500;
        color: #343a40;
    }

    .blog-list ul li,
    section.card-box {
        border: 1px solid var(--bs-border-color);
    }

    section.card-box .list-group .list-group-item:last-child {
        border-radius: 0 0 10px 10px !important;
    }

    .footer {
        border-radius: 25px 25px 0 0;
    }

    .navbar {
        border-radius: 0 0 10px 10px;
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
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light border-2 border-bottom  p-2" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('base') }}">
            <img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="">
        </a>
        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse ms-2" id="offcanvasNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("profile") }}">Profil</a>
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
                <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ $search }}">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

{{ $slot }}

<footer class="footer py-5 mt-5 border-2 border-top  bg-light shadow">
    <div class="container-fluid px-lg-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5">
            <section class="col mb-3">
                <h5 class="visually-hidden">Company logo & details.</h5>
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="logo" loading="lazy">
                </a>
                <p class="text-body-secondary">
                    <small>© <script>document.write(new Date().getFullYear())</script> Company, Inc. All rights reserved.</small>
                </p>
            </section>
        
            <section class="col mb-3">
                <!-- nothing here. -->
            </section>
        
            <section class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </section>
        
            <section class="col mb-3 justify-content-start">
                <h5>Social Media</h5>
                <ul class="nav flex-column">
                    @foreach ($sosmed as $s)
                        <li class="nav-item mb-2">
                            <a href="{{ $s->url }}" class="nav-link p-0 text-body-secondary" target="_blank">
                                <img src="{{ asset('storage/'.$s->logo) }}" alt="" width="23px">
                                {{ $s->nama_sosmed }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
        
            <section class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </section>
        </div>
    </div>
</footer>

<script>
    (() => {
        'use strict'

        document.querySelector('#navbarSideCollapse').addEventListener('click', () => {
            document.getElementById('.offcanvasNavbar').classList.toggle('open');
        });
    })();
</script>