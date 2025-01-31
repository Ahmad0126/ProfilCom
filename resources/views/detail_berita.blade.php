<x-root :title="$title">
    <x-front-layout>
        <div class="container-fluid" id="content">
            <div class="row pd-ltr-20 xs-pd-20-10 g-3">
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="blog-detail card-box overflow-hidden mb-30">
                        <div class="blog-img">
                            <img src="{{ asset('storage/'.$berita->gambar) }}" class="w-100" alt="{{ $berita->slug }}">
                        </div>
                        <div class="blog-caption">
                            <h4 class="mb-10">{{ $berita->judul }}</h4>
                            <div class="d-flex justify-content-between">
                                <p class="fw-bold text-secondary"><i class="icon-copy fa fa-user" aria-hidden="true"></i> {{ $berita->user }}</p>
                                <p class="fw-bold text-secondary"><i class="icon-copy fa fa-calendar" aria-hidden="true"></i> {{ date('j M Y', strtotime($berita->tanggal)) }}</p>
                            </div>
                            {!! $berita->keterangan !!}
                        </div>
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