@php
    $jalur->nama = old('nama') ?? $jalur->nama;
    $jalur->kode = old('kode') ?? $jalur->kode;
    $jalur->id_jenis = old('id_jenis') ?? $jalur->id_jenis;
    $jalur->posisi = old('posisi') ?? $jalur->posisi;
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
                <h4 class="pb-0">{{ $jalur->id == null ? 'Tambah' : 'Edit'}} Data Jalur</h4>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <form action="{{ $jalur->id == null ? route('jalur_store') : route('jalur_update') }}" method="post">
                <div class="row">
                    <div class="col-12 col-md-5">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama Jalur</label>
                            <input type="hidden" name="id" value="{{ $jalur->id }}">
                            <input type="text" name="nama" id="" class="form-control" placeholder="Masukkan Nama" value="{{ $jalur->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Kode Jalur</label>
                            <input type="text" name="kode" id="" class="form-control" placeholder="Masukkan Kode" value="{{ $jalur->kode }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Jenis</label>
                            <select name="id_jenis" id="" class="form-control">
                                @foreach ($jenis as $c)
                                    <option value="{{ $c->id }}" @selected($jalur->id_jenis == $c->id)>{{ $c->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Pilih Garis</label>
                            <div class="input-group">
                                <select name="" id="select_garis" class="form-control">
                                    <option value="0">Garis 1</option>
                                </select>
                                <span class="input-group-btn input-group-append">
                                    <button class="btn btn-primary" type="button" id="tambah_garis">+</button>
                                </span>
                                <button type="button" id="reset_single" class="ms-3 btn btn-secondary">Reset</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="button" id="reset_all" class="btn btn-danger btn-block">Reset Semua</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <label for="">Buat Garis</label>
                        <input type="hidden" name="posisi" value="{{ $jalur->posisi }}">
                        <div style="height: 375px; overflow: hidden;" id="map"></div>
                        <div class="mt-3">
                            <button class="btn btn-primary btn-block" id="simpan" type="submit">Simpan</button>
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
            var layerControl = L.control.layers(baseMaps).addTo(map);

            var markers = [[]];
            var current_garis = markers[0];
            var polyline = L.polyline([], {color: 'blue'}).addTo(map);

            map.on('click', function(e){
                var marker = buat_marker(e.latlng)
                let i = $('#select_garis').val()
                current_garis = markers[i];
                current_garis.push(marker);

                update_garis()
            })

            $('#tambah_garis').on('click', function(e){
                let m = markers.push([])
                current_garis = markers[m-1];

                update_select(m - 1)
            })
            
            $('#select_garis').on('change', function(e){
                let i = $(this).val()
                current_garis = markers[i];
            })

            $('#reset_single').on('click', function(e){
                if(confirm('Reset garis yang dipilih?')){
                    current_garis.forEach(function(marker){
                        map.removeLayer(marker)
                    })

                    let i = $('#select_garis').val()
                    markers[i] = []
                    current_garis = markers[i];
                    update_garis()
                }
            })

            $('#reset_all').on('click', function(e){
                if(confirm('Reset semua garis yang ada?')){
                    markers.forEach(function(m){
                        m.forEach(function(layer){
                            map.removeLayer(layer)
                        })
                    })

                    markers = [[]]
                    current_garis = markers[0];
                    update_garis()
                    update_select()
                }
            })

            function update_garis(){
                var coords = markers.map(i => i.map(m => m.getLatLng()));
                polyline.setLatLngs(coords);
                $('input[name="posisi"]').val(JSON.stringify(coords))
            }

            function update_select(active = 0) {
                let options = markers.map(function(layer, index){
                    return `<option value="${index}">Garis ${index+1}</option>`
                }).join('')

                $('#select_garis').html(options)
                $('#select_garis').val(active)
            }

            function buat_marker(koor){
                var marker = L.marker(koor).addTo(map);
                
                marker.on('click', function(e) {
                    markers = markers.map(g => g.filter(m => m !== marker))
                    if (confirm("Hapus titik ini?")) {
                        map.removeLayer(marker);
                    }
                    update_garis()
                });

                return marker
            }

            function init_data(data){
                data.forEach(function(val, i){
                    if (i > 0) {
                        markers.push([])
                    }
                    val.forEach(function(koor){
                        var marker = buat_marker(koor)
                        current_garis = markers[i];
                        current_garis.push(marker);

                    })
                })
                update_select()
                update_garis()
            }

            @if($jalur->posisi != null)
                const jalur = {!! $jalur->posisi !!}
                init_data(jalur)
                map.fitBounds(polyline.getBounds());
            @endif
        </script>
    </x-layout>
</x-root>