<x-root  :title="$title">
    <x-layout :pointer="5">
        <form action="{{ route('konfigurasi_update') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-30 row">
                <div class="col-12 mb-20">
                    <div class="card-box pd-20">
                        <div class="clearfix mb-20 border-bottom border-1">
                            <div class="pull-left">
                                <h4 class="text-blue h4 mb-3">Identitas</h4>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama-website" class="form-label">Nama Website</label>
                                    <input name="nama_website" type="text" class="form-control" id="nama-website" value="{{ $konfig->nama_website }}" placeholder="Masukkan Nama Website">
                                </div>
                                <div class="mb-3">
                                    <label for="nomor-telepon" class="form-label">Nomor Telepon</label>
                                    <input name="telepon" type="text" class="form-control" id="nomor-telepon"  value="{{ $konfig->telepon }}" placeholder="(Opsional)">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="email"  value="{{ $konfig->email }}" placeholder="(Opsional)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 row g-3">
                                    <div class="col-md-6">
                                        <label for="logo" class="form-label d-block">Logo</label>
                                        <img src="{{ asset('storage/'.$konfig->logo) }}" style="max-height: 75px" alt="Logo" class="img-fluid mb-2">
                                        <input name="logo" type="file" class="form-control h-auto" id="logo">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="favicon" class="form-label d-block">Favicon</label>
                                        <img src="{{ asset('storage/'.$konfig->favicon) }}" style="max-height: 75px" alt="Favicon" class="img-fluid mb-2">
                                        <input name="favicon" type="file" class="form-control h-auto" id="favicon">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control h-auto" id="alamat" placeholder="(Opsional)">{{ $konfig->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 mb-20">
                    <div class="card-box pd-20">
                        <div class="clearfix mb-20 border-bottom border-1">
                            <div class="pull-left">
                                <h4 class="text-blue h4 mb-3">Kalimat Depan</h4>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input name="judul" type="text" class="form-control" id="judul" value="{{ $konfig->judul }}" placeholder="Masukkan Judul">
                                </div>
                                <div class="mb-3">
                                    <label for="subjudul" class="form-label">Subjudul</label>
                                    <textarea name="subjudul" class="form-control" id="subjudul" rows="3" cols="30" placeholder="Masukkan Subjudul">{{ $konfig->subjudul }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="gambar-sambutan" class="form-label d-block">Gambar Background</label>
                                    <img src="{{ asset('storage/'.$konfig->breadcrumb) }}" alt="Background" class="img-fluid mb-2" style="max-height: 225px">
                                    <input name="breadcrumb" type="file" class="form-control h-auto" id="gambar-sambutan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 mb-20">
                    <div class="card-box pd-20">
                        <div class="clearfix mb-20 border-bottom border-1">
                            <div class="pull-left">
                                <h4 class="text-blue h4 mb-3">Visi Misi</h4>
                            </div>
                        </div>
                        <div class="row g-3">
                            <style>
                                ul.wysihtml5-toolbar li::before{
                                    content: '';
                                }
                                iframe.wysihtml5-sandbox, .editor{
                                    height: 300px !important;
                                }
                            </style>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="">Visi Misi</label>
                                    <textarea name="visi_misi" class="textarea_editor editor form-control border-radius-0" name="keterangan" placeholder="Buat Visi Misi ...">{{ $konfig->visi_misi }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="gambar-samping" class="form-label d-block">Gambar Visi Misi</label>
                                    <img src="{{ asset('storage/'.$konfig->gambar_visi) }}" alt="Logo" class="img-fluid mb-2" style="max-height: 355px">
                                    <input name="gambar_visi" type="file" class="form-control h-auto" id="gambar-samping">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-12">
                    <div class="card-box pd-20">
                        <div class="clearfix mb-20 border-bottom border-1">
                            <div class="pull-left">
                                <h4 class="text-blue h4 mb-3">Profil</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Judul</label>
                                    <input name="judul_profil" type="text" class="form-control" value="{{ $konfig->judul_profil }}" placeholder="Masukkan Judul">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Subjudul</label>
                                    <input name="subjudul_profil" type="text" class="form-control" value="{{ $konfig->subjudul_profil }}" placeholder="Masukkan Subjudul">
                                </div>
                            </div>
                        </div>
                        <label for="">Konten</label>
                        <textarea name="profil" class="profil form-control editor border-radius-0" placeholder="Buat Profil ...">{{ $konfig->profil }}</textarea>
                    </div>
                </div>
            </div>
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4 class="pb-0">Simpan Perubahan</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <button class="btn btn-primary" type="submit">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <script>
            jQuery(window).on("load",function() {
                "use strict";
                // bootstrap wysihtml5
                $('.profil').wysihtml5({
                    html: true
                });
            });
        </script>
    </x-layout>
</x-root>
