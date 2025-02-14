<x-root :title="$title">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <x-layout>
        <style>
            .header{
                z-index: 2000;
            }
        </style>
        <div class="pd-20 card-box mb-30">
            <div class="clearfix border-bottom border-1">
                <h4 class="text-blue h4 mb-3 text-center">Peta Cabang</h4>
            </div>
            <div class="row">
                <div class="col-5">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2" class="text-center">INFORMASI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nama Cabang</td>
                                <td>Nama Cabang</td>
                            </tr>
                            <tr>
                                <td>Koordinat Lat</td>
                                <td>Koordinat Lat</td>
                            </tr>
                            <tr>
                                <td>Koordinat Long</td>
                                <td>Koordinat Long</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
                <div class="col-7">
                    <div style="height: 375px; overflow: hidden;" id="map"></div>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="clearfix border-bottom border-1">
                <div class="pull-left">
                    <h4 class="text-blue h4 mb-3">Daftar Cabang</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('cabang_tambah') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Cabang</th>
							<th scope="col">Kode Cabang</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Fasilitas</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach ($cabang as $u)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $u->nama }}</td>
								<td>{{ $u->kode }}</td>
								<td>{{ $u->alamat }}</td>
								<td>{{ $u->fasilitas }}</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#">
                                                <i class="dw dw-edit2"></i> Lihat
                                            </a>
											<a class="dropdown-item" href="#">
												<i class="dw dw-edit2"></i> Edit
											</a>
											<a class="dropdown-item" href="{{ route('kategori_hapus', 0) }}" onclick="return confirm('Yakin ingin menghapus cabang ini?')">
												<i class="dw dw-delete-3"></i> Hapus
											</a>
										</div>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
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

            var optionMarker = {
                radius: 7,
                fillColor: '#F72C5B',
                color: '#F72C5B',
                weight: 1,
                opacity: 1,
                fillOpacity: 0.8
            }
            
            var overlayMaps = {
                "Cabang": L.layerGroup([
                    @foreach($cabang as $c)
                        L.circleMarker([{{ $c->latitude }}, {{ $c->longitude }}], optionMarker),
                    @endforeach
                ])
            };

            var map = L.map('map').setView([-7.597343575775382, 110.94985662865446], 13)
            baseMaps.Satelit.addTo(map)
            overlayMaps.Cabang.addTo(map)

            var radius = L.circle()
            overlayMaps.Cabang.eachLayer(function(layer){
                layer.on('click', function(e){
                    // console.log(e);
                    map.flyTo(e.latlng, 19)
                    radius.setLatLng(e.latlng)
                    radius.setRadius(30).addTo(map)
                    console.log(`Point: ${e.latlng.lat}, ${e.latlng.lng}`);
                    // mark.setLatLng(e.latlng).addTo(map)
                })
            })

            var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);
        </script>
    </x-layout>
</x-root>