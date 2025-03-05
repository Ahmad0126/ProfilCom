@php
    $cabang->latitude = old('latitude') ?? $cabang->latitude;
    $cabang->longitude = old('longitude') ?? $cabang->longitude;
    $cabang->nama = old('nama') ?? $cabang->nama;
    $cabang->kode = old('kode') ?? $cabang->kode;
    $cabang->id_jenis = old('id_jenis') ?? $cabang->id_jenis;
    $cabang->alamat = old('alamat') ?? $cabang->alamat;
@endphp
<x-root :title="$title">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <x-layout :pointer="7">
        <style>
            .header{
                z-index: 1001;
            }
        </style>
        <div class="page-header">
            <div class="title">
                <h4 class="pb-0">{{ $cabang->id == null ? 'Tambah' : 'Edit'}} Data Cabang</h4>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <form action="{{ $cabang->id == null ? route('cabang_store') : route('cabang_update') }}" method="post">
                <div class="row">
                    <div class="col-12 col-md-5">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama Cabang</label>
                            <input type="hidden" name="id" value="{{ $cabang->id }}">
                            <input type="text" name="nama" id="" class="form-control" placeholder="Masukkan Nama" value="{{ $cabang->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="4" class="form-control" placeholder="Masukkan Alamat">{{ $cabang->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Kode Cabang</label>
                            <input type="text" name="kode" id="" class="form-control" placeholder="Masukkan Kode" value="{{ $cabang->kode }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Fasilitas</label>
                            <select name="id_jenis" id="" class="form-control">
                                @foreach ($fasilitas as $c)
                                    <option value="{{ $c->id }}" @selected($cabang->id_jenis == $c->id)>{{ $c->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <label for="">Pilih Lokasi</label>
                        <input type="hidden" name="latitude" value="{{ $cabang->latitude }}">
                        <input type="hidden" name="longitude" value="{{ $cabang->longitude }}">
                        <div style="height: 375px; overflow: hidden;" id="map"></div>
                        <div class="mt-3">
                            <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            var baseMaps = {
                "Satelit": L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                    attribution: 'Map data &copy; <a href="https://google.com/maps/">Google Maps</a>'
                }),
                "Terrain": L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                    attribution: 'Map data &copy; <a href="https://google.com/maps/">Google Maps</a>'
                }),
            };
            var baseLat = {{ $cabang->latitude ?? -7.597343575775382 }}
            var baseLong = {{ $cabang->longitude ?? 110.94985662865446 }}

            var map = L.map('map').setView([baseLat, baseLong], {{ $cabang->id == null ? 13 : 19}})
            baseMaps.Satelit.addTo(map)

            var mark = L.marker();
            @if($cabang->id != null)
            mark.setLatLng([baseLat, baseLong]).addTo(map);
            @endif

            map.on('click', function(e){
                mark.setLatLng(e.latlng).addTo(map)
                $('input[name="latitude"]').val(e.latlng.lat)
                $('input[name="longitude"]').val(e.latlng.lng)
            })

            var layerControl = L.control.layers(baseMaps).addTo(map);
        </script>
    </x-layout>
</x-root>