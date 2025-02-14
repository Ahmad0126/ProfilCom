<x-root>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <x-layout>
        <style>
            .header{
                z-index: 2000;
            }
        </style>
        <div class="page-header">
            <div class="title">
                <h4 class="pb-0">Tambah Data Cabang</h4>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <form action="{{ route('cabang_store') }}" method="post">
                <div class="row">
                    <div class="col-5">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama Cabang</label>
                            <input type="hidden" name="latitude" value="{{ old('latitude') }}">
                            <input type="hidden" name="longitude" value="{{ old('longitude') }}">
                            <input type="text" name="nama" id="" class="form-control" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="4" class="form-control" placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Kode Cabang</label>
                            <input type="text" name="kode" id="" class="form-control" placeholder="Masukkan Kode" value="{{ old('kode') }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Fasilitas</label>
                            <input type="text" name="fasilitas" id="" class="form-control" placeholder="Masukkan Fasilitas" value="{{ old('fasilitas') }}">
                        </div>
                    </div>
                    <div class="col-7">
                        <label for="">Pilih Lokasi</label>
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

            var map = L.map('map').setView([-7.597343575775382, 110.94985662865446], 13)
            baseMaps.Satelit.addTo(map)

            var mark = L.marker();
            map.on('click', function(e){
                console.log(`Point: ${e.latlng.lat}, ${e.latlng.lng}`);
                mark.setLatLng(e.latlng).addTo(map)
                $('input[name="latitude"]').val(e.latlng.lat)
                $('input[name="longitude"]').val(e.latlng.lng)
            })

            var layerControl = L.control.layers(baseMaps).addTo(map);
        </script>
    </x-layout>
</x-root>