<x-root  :title="$title">
    <x-layout :search="$search ?? null">
        <div class="mb-30 row">
            <div class="col-12 mb-20">
                <div class="card-box pd-20">
                    <div class="clearfix mb-20 pb-20 border-bottom border-1">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Konfigurasi</h4>
                        </div>
                        <div class="pull-right">
                            <button type="button" class="btn btn-primary btn-sm scroll-click" rel="content-y">
                                <i class="fa fa-plus"></i> Simpan
                            </button>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3 row g-3">
                                <div class="col-md-7">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="logo">
                                </div>
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/'.str_replace('.jpg', '.png', 'upload/konten/default.png')) }}" alt="Logo" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="mb-3 row g-3">
                                <div class="col-md-7">
                                    <label for="favicon" class="form-label">Favicon</label>
                                    <input type="file" class="form-control" id="favicon">
                                </div>
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/'.str_replace('.jpg', '.png', 'upload/konten/default.png')) }}" alt="Logo" class="img-thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama-website" class="form-label">Nama Website</label>
                                <input type="text" class="form-control" id="nama-website" placeholder="Masukkan Nama Website">
                            </div>
                            <div class="mb-3">
                                <label for="nomor-telepon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor-telepon" placeholder="Masukkan Nomor Telepon">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Masukkan Email">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="3" cols="30" placeholder="Masukkan Alamat"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card-box pd-20">
                    <div class="clearfix mb-20 pb-20 border-bottom border-1">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Sanjungan</h4>
                        </div>
                        <div class="pull-right">
                            <button type="button" class="btn btn-primary btn-sm scroll-click" rel="content-y">
                                <i class="fa fa-plus"></i> Simpan
                            </button>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-5">
                            <img src="{{ asset('storage/'.str_replace('.jpg', '.png', 'upload/konten/default.png')) }}" alt="Logo" class="img-thumbnail">
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="gambar-sambutan" class="form-label">Gambar Sambutan</label>
                                <input type="file" class="form-control" id="gambar-sambutan">
                            </div>
                            <div class="mb-3">
                                <label for="sambutan" class="form-label">Sambutan</label>
                                <input type="text" class="form-control" id="sambutan" placeholder="Masukkan Sambutan">
                            </div>
                            <div class="mb-3">
                                <label for="testimoni" class="form-label">Testimoni</label>
                                <textarea class="form-control" id="testimoni" rows="3" cols="30" placeholder="Masukkan Testimoni"></textarea>
                            </div>
                        </div>

                        <style>
                            ul.wysihtml5-toolbar li::before{
                                content: '';
                            }
                            iframe.wysihtml5-sandbox{
                                height: 300px !important;
                            }
                        </style>
                        <div class="col-md-5">
                            <img src="{{ asset('storage/'.str_replace('.jpg', '.png', 'upload/konten/default.png')) }}" alt="Logo" class="img-thumbnail">
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="gambar-samping" class="form-label">Gambar Samping</label>
                                <input type="file" class="form-control" id="gambar-samping">
                            </div>
                            <div class="mb-3">
                                <textarea class="textarea_editor form-control border-radius-0" name="keterangan" placeholder="Enter text ..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-layout>
</x-root>