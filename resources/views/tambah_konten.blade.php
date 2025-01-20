<x-root>
    <x-layout>
        <div class="blog-wrap">
            <div class="container pd-0">
                <div class="row">
                    <div class="col">
                        <style>
                            ul.wysihtml5-toolbar li::before{
                                content: '';
                            }
                            iframe.wysihtml5-sandbox{
                                height: 100vh !important;
                            }
                        </style>
                        <div class="blog-detail card-box overflow-hidden mb-30">
                            <form action="{{ route('konten_store') }}" method="post">
                                <div class="card-header">
                                    <h4 class="text-center">Editor Berita</h4>
                                </div>
                                <div class="blog-img row">
                                    <div class="col-md-6">
                                        @csrf
                                        <img src="{{ asset('vendors/images/img2.jpg') }}" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pl-md-0 pl-4 pt-3 pr-4">
                                            <div class="form-group">
                                                <label>Gambar Sampul</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="gambar">
                                                    <label class="custom-file-label">Pilih File</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select class="custom-select form-control" name="id_kategori">
                                                    @foreach ($kategori as $k)
                                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-caption text-dark">
                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" name="judul" id="" class="form-control" placeholder="Masukkan Judul">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Isi Keterangan</label>
                                        <textarea class="textarea_editor form-control border-radius-0" name="keterangan" placeholder="Enter text ..."></textarea>
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