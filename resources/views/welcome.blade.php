<x-root :title="$title">
    <x-front-layout>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <style>
            #content {
                padding-top: 3rem;
            }

            .blog-carousel {
                height: auto;
                margin: 0 auto;
                padding: 20px;
            }

            .blog-card {
                transform: scale(100%);
                transition: 0.3s ease-in;
            }
            .blog-card:hover {
                transform: scale(104%);
                transition: 0.3s ease-in;
            }
            .blog-img{
                height: 270px;
                width: 100%;
                object-fit: cover;
            }

            .swiper {
                height: 100%;
                padding: 20px;
            }

            .swiper-button-next,
            .swiper-button-prev {
                background: #fff;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                box-shadow: 0 2px 6px rgba(0,0,0,0.1);
                border: var(--bs-border-width) solid var(--bs-border-color);
                transition: all 0.3s ease;
            }

            .swiper-button-next:hover,
            .swiper-button-prev:hover {
                background: #f4f3f3;
            }

            .swiper-button-next:after,
            .swiper-button-prev:after {
                font-size: 18px;
                color: #333;
            }

            .swiper-pagination-bullet {
                width: 8px;
                height: 8px;
                background: #999;
                opacity: 0.5;
                border: var(--bs-border-width) solid var(--bs-border-color);
            }

            .swiper-pagination-bullet-active {
                background: #007bff;
                opacity: 1;
            }

            .jumbotron {
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .jumbotron .container-fluid {
                position: relative;
            }

            .jumbotron-overlay {
                background-color: rgba(0, 0, 0, 0.256);
            }

            ul, ol{
                list-style: auto;
                margin-left: 1.5rem;
            }
        </style>

        <div class="jumbotron p-5 mb-0 bg-light rounded-3 rounded-top-0"
            style="background-image: url({{ asset('storage/'.$konfig->breadcrumb) }}); background-attachment: fixed;">
            <div class="container-fluid py-5 jumbotron-overlay rounded-3">
                <div>
                    <h1 class="display-4 fw-bold text-light">{{ $konfig->judul }}</h1>
                    <p class="col-md-8 fs-4 text-light">{{ $konfig->subjudul }}</p>
                </div>
            </div>
        </div>

        <div class="container-fluid pb-5 patterned" id="content">
            <section class="section-wrapper" id="aboutme-section">
                <div class="section-heading text-center mb-4" id="visi-misi" data-aos="fade-up">
                    <h5 class="display-4 fw-bold"><span class="text-info">Visi</span> dan Misi</h5>
                </div>
                <div class="section-content-for-blog card-box pb-20" data-aos="fade-up">
                    <div class="row pd-ltr-20 xs-pd-20-10 aboutme-section-wrapper">
                        <div class="col-md-4 mb-4 mb-md-0 px-4 px-md-3">
                            <section class="section-image-for-blog d-flex justify-content-center d-md-block">
                                <img class="img-fluid rounded-2" src="{{ asset('storage/'.$konfig->gambar_visi) }}" alt="">
                            </section>
                        </div>
                        <div class="col-md-8 px-4 px-md-3">
                            <section class="section-content-for-blog">{!! $konfig->visi_misi !!}</section>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-wrapper mt-2" id="berita-section">
                <div class="section-heading text-center" id="visi-misi" data-aos="fade-up">
                    <h5 class="display-4 fw-bold">Berita <span class="text-info">terbaru</span> </h5>
                </div>
                <div class="section-content" data-aos="fade-up">
                    <div class="blog-carousel">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <!-- Blog cards will be repeated to show the loop effect -->
                                @foreach ($berita as $b)
                                    <div class="swiper-slide">
                                        <div class="card-box blog-card">
                                            <img src="{{ asset('storage/'.$b->gambar) }}" alt="Gambar Berita" class="card-img-top blog-img">
                                            <div class="card-body">
                                                <p class="card-text text-info fw-bold">{{ $b->kategori }}</p>
                                                <a href="{{ route('berita_detail', $b->slug) }}">
                                                    <h5 class="card-title">
                                                        {{ $b->judul }}
                                                    </h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('berita') }}" class="btn btn-light btn-rounded">Berita Lainnya <i class="icon-copy ion-arrow-right-c"></i></a>
                    </div>
                </div>
            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 1000
            });

            const swiper = new Swiper('.swiper', {
            slidesPerView: 'auto',
            speed: 800,
            
            breakpoints: {
                // Mobile
                320: {
                slidesPerView: 1,
                spaceBetween: 15,
                slidesPerGroup: 1
                },
                // Tablet
                768: {
                slidesPerView: 2,
                spaceBetween: 20,
                slidesPerGroup: 1
                },
                // Desktop
                1024: {
                slidesPerView: 3,
                spaceBetween: 30,
                slidesPerGroup: 1
                }
            },
            
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            
            loop: true,
            loopFillGroupWithBlank: true,
            
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
            });
        </script>
    </x-front-layout>
</x-root>