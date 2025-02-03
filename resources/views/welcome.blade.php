<x-root :title="$title">
    <x-front-layout>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <style>
            #content {
                padding-top: 30px;
            }

            .blog-carousel {
                height: auto;
                margin: 0 auto;
                padding: 20px;
            }

            .blog-card {
                background: #fff;
                padding: 20px;
                overflow: hidden;
                position: relative;
                border: var(--bs-border-width) solid var(--bs-border-color);
                transition: transform 0.3s ease;
            }

            .blog-card:hover {
                transform: translateY(-5px);
            }

            .blog-image {
                width: 100%;
                height: 300px;
                object-fit: cover;
                display: block;
            }

            .blog-title {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                padding: 15px;
                background: #fff;
                color: #333;
                font-size: 1rem;
                font-weight: 600;
                text-align: center;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                height: 70px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-top: var(--bs-border-width) solid var(--bs-border-color);
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
                background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .jumbotron .container-fluid {
                position: relative;
            }

            .jumbotron-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.256);
            }
        </style>

        <div class="jumbotron p-5 mb-4 bg-light border border-1 border-top-0 rounded-3">
            <div class="container-fluid py-5">
                <div class="jumbotron-overlay rounded-3"></div>
                <h1 class="display-5 fw-bold text-light">Custom jumbotron</h1>
                <p class="col-md-8 fs-4 text-light">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
            </div>
        </div>

        <div class="container-fluid" id="content">
            <section class="section-wrapper" id="aboutme-section">
                <div class="section-heading">
                    <h5 class="section-title rounded-4 px-4 ms-2">Visi dan Misi</h5>
                </div>
                <div class="section-content-for-blog">
                    <div class="row pd-ltr-20 xs-pd-20-10 aboutme-section-wrapper">
                        <div class="col-md-4">
                            <section class="section-image-for-blog">
                                <h1 class="visually-hidden">Image for about me section.</h1>
                                <img class="img-fluid border border-1 rounded-2" src="{{ asset('storage/'.str_replace('.jpg', '.png', 'upload/konten/default.png')) }}" alt="">
                            </section>
                        </div>
                        <div class="col-md-8">
                            <section class="section-content-for-blog">
                                <h1 class="display-3 fw-bold">Designed for engineers</h1>
                                <h3 class="fw-normal text-muted mb-3">Build anything you want with Aperture</h3>
                            </section>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-wrapper" id="berita-section">
                <div class="section-heading">
                    <h5 class="section-title rounded-4 px-4 ms-2">Berita</h5>
                </div>
                <div class="section-content">
                    <div class="blog-carousel">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <!-- Blog cards will be repeated to show the loop effect -->
                                @foreach ($berita as $b)
                                    <div class="swiper-slide">
                                        <div class="blog-card rounded-2">
                                            <img src="{{ asset('storage/'.$b->gambar) }}" alt="Gambar Berita" class="blog-image">
                                            <div class="blog-title">
                                                <h5>{{ $b->judul }}</h5>
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
                </div>
            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
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