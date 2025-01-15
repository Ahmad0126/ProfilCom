<!-- style custom -->
<style>
    html,
    body {
        overflow-x: hidden; /* Prevent scroll on narrow devices */
    }
    #content{
        padding-top: 90px;
    }

    .bg-light {
        background-color: #fff !important;
    }

    @media (max-width: 991.98px) {
        .navbar-collapse .navbar-nav .nav-item.dropdown .dropdown-menu {
            position: static;
            box-shadow: none !important;
            border-radius: 3px !important;
            border: var(--bs-border-width) solid var(--bs-border-color) !important;
        }
        .offcanvas-collapse {
            position: fixed;
            top: 56px; /* Height of navbar */
            bottom: 0;
            left: 100%;
            width: 100%;
            padding-right: 1rem;
            padding-left: 1rem;
            overflow-y: auto;
            visibility: hidden;
            background-color: #fff;
            transition: transform .3s ease-in-out, visibility .3s ease-in-out;
        }
        .offcanvas-collapse.open {
            visibility: visible;
            transform: translateX(-100%);

            /* Ajust the margin top to match the height of the navbar */
            margin-top: calc(89.67px - 56px);
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
        border: 2px solid var(--bs-border-color);
    }

    section.card-box .list-group .list-group-item:last-child {
        border-radius: 0 0 5px 5px !important;
    }
</style>
<!-- style custom -->

<header class="header container-fluid">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light border-2 border-bottom p-2" aria-label="Main navigation">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="p-1" src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="">
            </a>
            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("profile") }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Switch account</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex gap-1 form-horizontal" role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>

<div class="container" id="content">
    {{ $slot }}
</div>

<footer class="footer py-5 mt-5 border-2 border-top bg-light shadow">
    <div class="container-fluid px-lg-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="logo" loading="lazy">
                </a>
                <p class="text-body-secondary">
                    <small>© 2023 Company, Inc. All rights reserved.</small>
                </p>
            </div>
        
            <div class="col mb-3">
                <!-- nothing here. -->
            </div>
        
            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>
        
            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>
        
            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>
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