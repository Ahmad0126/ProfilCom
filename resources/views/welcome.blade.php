<x-root :title="$title">
    <x-front-layout>
        <style>
            #content {
                padding-top: 30px;
            }
            .section-content-for-blog .section-image-for-blog img {
                border: var(--bs-border-width) solid var(--bs-border-color);    
                border-radius: 8px;
            }
            .blog-content {
                display: flex;
                flex-direction: column;
                position: relative;
                border-radius: 8px;
                border: var(--bs-border-width) solid var(--bs-border-color);
                width: 100%;
                height: 100%;
                background-color: #fff;
                overflow: hidden;
            }
            .blog-image {
                flex-grow: 1;
                background-size: cover;
                background-position: center;
            }
            .blog-caption {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: #fff;
                text-align: start;
                padding: 15px;
                border-top: var(--bs-border-width) solid var(--bs-border-color);
            }
            @media (min-width: 576px) {
                .blog-content {
                    height: 420px;
                }
            }
            @media (min-width: 768px) {
                .blog-content {
                    height: 390px;
                }
            }
        </style>

        <div class="jumbotron p-5 mb-4 bg-light border border-1 border-top-0 rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
            </div>
        </div>

        <div class="container-fluid" id="content">
            <section class="section-wrapper" id="aboutme-section">
                <div class="section-heading">
                    <h5 class="section-title rounded-4 px-4 ms-3">Visi dan Misi</h5>
                </div>
                <div class="section-content-for-blog">
                    <div class="row pd-ltr-20 xs-pd-20-10 aboutme-section-wrapper">
                        <div class="col-md-4">
                            <section class="section-image-for-blog">
                                <h1 class="visually-hidden">Image for about me section.</h1>
                                <img src="{{ asset('storage/'.str_replace('.jpg', '.png', 'upload/konten/default.png')) }}" alt="">
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
                    <h5 class="section-title rounded-4 px-4 ms-3">Berita</h5>
                </div>
                <div class="section-content">
                    <div class="row g-4 pd-ltr-20 xs-pd-20-10 berita-section-wrapper">
                        @foreach ($berita as $b)
                            <div class="col-md-4">
                                <div class="blog-content">
                                    <div class="blog-image">
                                        <img src="{{ asset('storage/'.$b->gambar) }}" alt="">
                                    </div>
                                    <div class="blog-caption">
                                        <a href="{{ route('berita_detail', $b->slug) }}">
                                            <h5 class="mb-10">{{ $b->judul }}</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </x-front-layout>
</x-root>