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
            margin-top: 24px;
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
            top: 89.67px;
            bottom: 0;
            left: 100%;
            width: 100%;
            border-radius: 10px 10px 0 0;
            padding-right: 1rem;
            padding-left: 1rem;
            overflow-y: auto;
            visibility: hidden;
            background-color: #fff;
            transition: transform .3s ease-in-out, visibility .3s ease-in-out;
        }
        .offcanvas-collapse.open {
            visibility: visible;
            transform: translateX(-101%);
        }

        .blog-img {
            border-radius: 10px 10px 0 0 !important;
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
        border-radius: 0 0 5px 5px !important;
    }

    .footer {
        border-radius: 55px 55px 0 0;
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
        margin-top: 87px;
    }

    .section-wrapper .section-heading .section-title {
        border-radius: 3px 3px 0 0;
        padding: 8px;
        background-color: #ffe9bfa6;
        width: fit-content;
        color: transparent;
        font-size: 4em;
        text-emphasis: stroke;
        -webkit-text-stroke: 1px #292827a6; 
        text-transform: uppercase;
    }

    .section-wrapper:not(:last-child) {
        margin-bottom: 3rem;
    }
</style>
<!-- style custom -->

<header class="header container-fluid">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light border-2 border-bottom border-dark p-2" aria-label="Main navigation">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="p-1" src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="">
            </a>
            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse ms-2" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("profile") }}">Profile</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
                        <ul class="dropdown-menu border-dark">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex gap-1 form-horizontal" role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>

{{ $slot }}

<footer class="footer py-5 mt-5 border-2 border-top border-dark bg-light shadow">
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
            document.querySelector('.offcanvas-collapse').classList.toggle('open');
        });
    })();
</script>