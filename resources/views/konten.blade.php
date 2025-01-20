<x-root>
    <x-layout>
        <div class="page-header">
            <div class="row align-items-center ">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4 class="pb-0">Daftar Berita</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-primary" href="{{ route('konten_tambah') }}">
                        Tambah
                    </a>
                </div>
            </div>
        </div>
        <div class="blog-list">
            <ul class="row">
                <li class="col-lg-6">
                    @foreach ($berita as $b)
                        <div class="blog-caption">
                            <h4><a href="#">{{ $b->judul }} <i class="icon-copy fa fa-external-link" aria-hidden="true"></i></a></h4>
                            <div class="blog-by">
                                <p>{{ substr(strip_tags($b->keterangan), 0, 160) }}...</p>
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold text-secondary"><i class="icon-copy fa fa-list" aria-hidden="true"></i> {{ $b->kategori }}</p>
                                    <p class="fw-bold text-secondary"><i class="icon-copy fa fa-calendar" aria-hidden="true"></i> {{ $b->tanggal }}</p>
                                </div>
                                <div class="pt-10">
                                    <a href="#" class="btn btn-outline-primary">Edit</a>
                                    <a href="#" class="btn btn-outline-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </li>
            </ul>
        </div>
        <div class="blog-pagination">
            <div class="btn-toolbar justify-content-center mb-15">
                <div class="btn-group">
                    <a href="#" class="btn btn-outline-primary prev"><i class="fa fa-angle-double-left"></i></a>
                    <a href="#" class="btn btn-outline-primary">1</a>
                    <a href="#" class="btn btn-outline-primary">2</a>
                    <span class="btn btn-primary current">3</span>
                    <a href="#" class="btn btn-outline-primary">4</a>
                    <a href="#" class="btn btn-outline-primary">5</a>
                    <a href="#" class="btn btn-outline-primary next"><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </x-layout>
</x-root>