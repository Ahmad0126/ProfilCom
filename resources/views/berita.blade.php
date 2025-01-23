<x-root :title="$title">
    <x-front-layout :kategori="$kategori" :search="$search ?? null">
        <div class="container-fluid" id="content">
            <div class="row pd-ltr-20 xs-pd-20-10 g-3">
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="blog-list">
                        <ul>
                            @foreach ($berita as $b)
                                <li class="">
                                    <div class="row no-gutters">
                                        <div class="col-lg-5 col-md-12 col-sm-12">
                                            <div class="blog-img">
                                                <img src="{{ asset('storage/'.str_replace('.jpg', '.png', $b->gambar)) }}" alt="" class="bg_img">
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-12 col-sm-12">
                                            <div class="blog-caption">
                                                <h4><a href="{{ route('berita_detail', $b->slug) }}">{{ $b->judul }}</a></h4>
                                                <p class="text-secondary"><i class="icon-copy fa fa-user" aria-hidden="true"></i> {{ $b->user }}</p>
                                                <div class="blog-by">
                                                    <p>{{ substr(strip_tags($b->keterangan), 0, 160) }}...</p>
                                                    <div class="d-flex justify-content-between">
                                                        <p class="fw-bold text-secondary"><i class="icon-copy fa fa-list" aria-hidden="true"></i> {{ $b->kategori }}</p>
                                                        <p class="fw-bold text-secondary"><i class="icon-copy fa fa-calendar" aria-hidden="true"></i> {{ date('j M Y', strtotime($b->tanggal)) }}</p>
                                                    </div>
                                                    <div class="pt-10">
                                                        <a href="{{ route('berita_detail', $b->slug) }}" class="btn btn-outline-primary">Read More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog-pagination" style="overflow-x: scroll">
                        {{ $berita->onEachSide(1)->links('pagination.custom') }}
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12">
                    <section class="card-box  mb-30">
                        <h5 class="pd-20 h5 mb-0">Categories</h5>
                        <div class="list-group">
                            @foreach ($kategori_sidebar as $d)
                                <a href="{{ route('berita_kategori', $d->nama) }}" class="list-group-item rounded-0 
                                    d-flex align-items-center justify-content-between {{ $kategori_active == $d->nama ? 'active' : '' }}">
                                    {{ $d->nama }} 
                                    <span class="badge badge-primary badge-pill">{{ $d->jumlah }} </span>
                                </a>
                            @endforeach
                        </div>
                    </section>
                    <section class="card-box  mb-30">
                        <h5 class="pd-20 h5 mb-0">Latest Post</h5>
                        <div class="latest-post">
                            <ul>
                                @foreach ($latest_berita as $d)
                                    <li>
                                        <h4><a href="{{ route('berita_detail', $d->slug) }}">{{ $d->judul }}</a></h4>
                                        <span>{{ $d->kategori }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                    <section class="card-box  overflow-hidden">
                        <h5 class="pd-20 h5 mb-0">Archives</h5>
                        <div class="list-group">
                            <a href="#" class="list-group-item rounded-0 d-flex align-items-center justify-content-between">January 2020</a>
                            <a href="#" class="list-group-item rounded-0 d-flex align-items-center justify-content-between">February 2020</a>
                            <a href="#" class="list-group-item rounded-0 d-flex align-items-center justify-content-between">March 2020</a>
                            <a href="#" class="list-group-item rounded-0 d-flex align-items-center justify-content-between">April 2020</a>
                            <a href="#" class="list-group-item rounded-0 d-flex align-items-center justify-content-between">May 2020</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </x-front-layout>
</x-root>