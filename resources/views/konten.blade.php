<x-root  :title="$title">
    <x-layout :search="$search ?? null">
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
                @foreach ($berita as $b)
                    <li class="col-lg-6">
                        <div class="blog-caption">
                            <h4><a href="{{ route('berita_detail', $b->slug) }}" target="_blank">{{ $b->judul }} <i class="icon-copy fa fa-external-link" aria-hidden="true"></i></a></h4>
                            <div class="blog-by">
                                <p>{{ substr(strip_tags($b->keterangan), 0, 160) }}...</p>
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold text-secondary"><i class="icon-copy fa fa-list" aria-hidden="true"></i> {{ $b->kategori }}</p>
                                    <p class="fw-bold text-secondary"><i class="icon-copy fa fa-calendar" aria-hidden="true"></i> {{ date('j M Y', strtotime($b->tanggal)) }}</p>
                                </div>
                                <div class="pt-10">
                                    <a href="{{ route('konten_edit', $b->id) }}" class="btn btn-outline-primary">Edit</a>
                                    <a href="{{ route('konten_hapus', $b->id) }}" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</a>
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
    </x-layout>
</x-root>