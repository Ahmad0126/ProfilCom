<x-root :title="$title">
    <x-layout :pointer="4">
        <div class="blog-wrap">
            <div class="container pd-0">
                <div class="row">
                    <div class="col">
                        <style>
                            ul.wysihtml5-toolbar li::before{
                                content: '';
                            }
                            iframe.wysihtml5-sandbox, .editor{
                                height: 100vh !important;
                            }
                        </style>
                        @php
                            $konten->judul = old('judul') ?? $konten->judul;
                            $konten->id_kategori = old('id_kategori') ?? $konten->id_kategori;
                            $konten->keterangan = old('keterangan') ?? $konten->keterangan;
                        @endphp
                        <div class="blog-detail card-box overflow-hidden mb-30">
                            <form action="{{ $konten->id ? route('konten_change') : route('konten_store') }}" method="post" enctype="multipart/form-data">
                                <div class="card-header">
                                    <h4 class="text-center">Editor Berita</h4>
                                </div>
                                <div class="blog-img row">
                                    <div class="col-md-6">
                                        @csrf
                                        <img src="{{ asset($konten->gambar ? 'storage/'.$konten->gambar : 'vendors/images/img2.jpg') }}" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pl-md-0 pl-4 pt-3 pr-4">
                                            <div class="form-group">
                                                <label>Gambar Sampul</label>
                                                <input type="hidden" name="id" value="{{ $konten->id }}">
                                                <input type="file" accept="image/*" class="form-control form-control-file height-auto" name="gambar">
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select class="custom-select form-control" name="id_kategori">
                                                    @foreach ($kategori as $k)
                                                        <option value="{{ $k->id }}" @selected($k->id == $konten->id_kategori)>{{ $k->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-caption text-dark">
                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" name="judul" id="" class="form-control" placeholder="Masukkan Judul" value="{{ $konten->judul }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Isi Keterangan</label>
                                        <textarea class="textarea_editor form-control editor border-radius-0" name="keterangan" placeholder="Enter text ...">{{ $konten->keterangan }}</textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-layout>
</x-root>