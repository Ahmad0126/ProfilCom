<x-root :title="$title">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
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
            padding-top: 65px;
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
                        <a class="nav-link" href="{{ route("mapcabang") }}">Peta</a>
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

    <div class="right-sidebar" style="z-index: 1030" id="info_map">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Informasi
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Kategori</td>
                            <td id="kategori">-</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td class="tempat_info" id="nama">-</td>
                        </tr>
                        <tr>
                            <td>Kode</td>
                            <td class="tempat_info" id="kode">-</td>
                        </tr>
                        <tr class="cabang">
                            <td>Fasilitas</td>
                            <td class="tempat_info" id="fasilitas">-</td>
                        </tr>
                        <tr class="cabang">
                            <td>Alamat</td>
                            <td class="tempat_info" id="alamat">-</td>
                        </tr>
                        <tr class="bidang">
                            <td>Jenis</td>
                            <td class="tempat_info" id="jenis">-</td>
                        </tr>
                        <tr class="bidang">
                            <td>Ditambahkan Pada</td>
                            <td class="tempat_info" id="created">-</td>
                        </tr>
                        <tr class="bidang">
                            <td>Terakhir Diubah</td>
                            <td class="tempat_info" id="updated">-</td>
                        </tr>
                    </tbody>
                </table>
                <div id="tempat_alert"></div>
			</div>
		</div>
	</div>

    <div id="content" style="height: 100vh;">
        <div id="map" class="h-100"></div>
    </div>

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
    <script src="{{ asset('scripts/maps.js') }}"></script>
    <script>
        const url_lahan = '{{ route("lahan_api") }}'
        const url_jalur = '{{ route("jalur_api") }}'
        const url_cabang = '{{ route("cabang_api") }}'

        $(document).ready(function(){
            load_data('cabang', url_cabang)
            load_data('jalur', url_jalur)
            load_data('lahan', url_lahan)
        })
    </script>
</x-root>