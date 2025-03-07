@php
    $lahan->nama = old('nama') ?? $lahan->nama;
    $lahan->kode = old('kode') ?? $lahan->kode;
    $lahan->id_jenis = old('id_jenis') ?? $lahan->id_jenis;
    $lahan->posisi = old('posisi') ?? $lahan->posisi;
@endphp
<x-root :title="$title">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <x-layout :pointer="9">
        <style>
            .header{
                z-index: 1001;
            }
        </style>
        <div class="page-header">
            <div class="title">
                <h4 class="pb-0">{{ $lahan->id == null ? 'Tambah' : 'Edit'}} Data Lahan</h4>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <form action="{{ $lahan->id == null ? route('lahan_store') : route('lahan_update') }}" method="post">
                <div class="row">
                    <div class="col-12 col-md-5">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama Lahan</label>
                            <input type="hidden" name="id" value="{{ $lahan->id }}">
                            <input type="text" name="nama" id="" class="form-control" placeholder="Masukkan Nama" value="{{ $lahan->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Kode Lahan</label>
                            <input type="text" name="kode" id="" class="form-control" placeholder="Masukkan Kode" value="{{ $lahan->kode }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Jenis</label>
                            <select name="id_jenis" id="" class="form-control">
                                @foreach ($jenis as $c)
                                    <option value="{{ $c->id }}" @selected($lahan->id_jenis == $c->id)>{{ $c->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Pilih Area</label>
                            <div class="input-group">
                                <select name="" id="select_area" class="form-control">
                                    <option value="0">Area 1</option>
                                </select>
                                <span class="input-group-btn input-group-append">
                                    <button class="btn btn-primary" type="button" id="tambah_area">+</button>
                                </span>
                                <button type="button" id="reset_single" class="ms-3 btn btn-secondary">Reset</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="button" id="reset_all" class="btn btn-danger btn-block">Reset Semua</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <label for="">Buat Area</label>
                        <input type="hidden" name="posisi" value="{{ $lahan->posisi }}">
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

            var markers = [[[],[]]];
            var current_area = markers[0][0];
            var polygon = L.polygon([], {color: 'red'}).addTo(map);

            map.on('click', function(e){
                var marker = buat_marker(e.latlng)
                let i = $('#select_area').val()
                current_area = markers[i][0];
                current_area.push(marker);

                update_area()
            })

            $('#tambah_area').on('click', function(e){
                let m = markers.push([[],[]])
                current_area = markers[m-1][0];

                update_select(m - 1)
            })
            
            $('#select_area').on('change', function(e){
                let i = $(this).val()
                current_area = markers[i][0];
            })

            $('#reset_single').on('click', function(e){
                if(confirm('Reset area yang dipilih?')){
                    current_area.forEach(function(marker){
                        map.removeLayer(marker)
                    })

                    let i = $('#select_area').val()
                    markers[i] = [[],[]]
                    current_area = markers[i][0];
                    update_area()
                }
            })

            $('#reset_all').on('click', function(e){
                if(confirm('Reset semua area yang ada?')){
                    markers.forEach(function(j){
                        j.forEach(function(i){
                            i.forEach(function(layer){
                                map.removeLayer(layer)
                            })
                        })
                    })

                    markers = [[[],[]]]
                    current_area = markers[0][0];
                    update_area()
                    update_select()
                }
            })

            function update_area(){
                var coords = markers.map(i => i.map(c => c.map(a => a.getLatLng())));
                polygon.setLatLngs(coords);
                $('input[name="posisi"]').val(JSON.stringify(coords))
            }

            function update_select(active = 0) {
                let options = markers.map(function(layer, index){
                    return `<option value="${index}">Area ${index+1}</option>`
                }).join('')

                $('#select_area').html(options)
                $('#select_area').val(active)
            }

            function buat_marker(koor){
                var marker = L.marker(koor).addTo(map);
                
                marker.on('click', function(e) {
                    markers = markers.map(g => g.map(j => j.filter(m => m !== marker)))
                    if (confirm("Hapus titik ini?")) {
                        map.removeLayer(marker);
                    }
                    update_area()
                });

                return marker
            }

            function init_data(data){
                console.log(data);
                data.forEach(function(val, i){
                    if (i > 0) {
                        markers.push([])
                    }
                    val.forEach(function(val, j){
                        if (i > 0) {
                            markers[i].push([])
                        }
                        val.forEach(function(koor){
                            var marker = buat_marker(koor)
                            current_area = markers[i][j];
                            current_area.push(marker);
                        })
                    })
                })
                update_select()
                update_area()
            }

            @if($lahan->posisi != null)
                const lahan = {!! $lahan->posisi !!}
                init_data(lahan)
                map.fitBounds(polygon.getBounds());
            @endif
        </script>
    </x-layout>
</x-root>