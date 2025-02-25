<x-root :title="$title">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <x-layout :pointer="7">
        <style>
            .header{
                z-index: 1001;
            }
        </style>
        <div class="pd-20 card-box mb-30">
            <div class="clearfix border-bottom border-1">
                <h4 class="text-blue h4 mb-3 text-center">Peta Cabang</h4>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-7">
                    <div style="height: 375px; overflow: hidden;" id="map"></div>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2" class="text-center">INFORMASI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nama Cabang</td>
                                <td class="tempat_info" id="nama">-</td>
                            </tr>
                            <tr>
                                <td>Kode Cabang</td>
                                <td class="tempat_info" id="kode">-</td>
                            </tr>
                            <tr>
                                <td>Fasilitas</td>
                                <td class="tempat_info" id="fasilitas">-</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td class="tempat_info" id="alamat">-</td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="tempat_alert"></div>
                    <a href="javascript:void(0)" data-url="{{ route('cabang_edit', '') }}" class="action_info btn btn-primary">Edit</a>
                    <a href="javascript:void(0)" data-url="{{ route('cabang_hapus', '') }}" class="action_info btn btn-danger" onclick="return confirm('Yakin ingin menghapus cabang ini?')">Hapus</a>
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
                                            <a class="dropdown-item lihat_btn" href="javascript:void(0)" data-lat="{{ $u->latitude }}"
                                                data-long="{{ $u->longitude }}">
                                                <i class="dw dw-edit2"></i> Lihat
                                            </a>
											<a class="dropdown-item" href="{{ route('cabang_edit', $u->id) }}">
												<i class="dw dw-edit2"></i> Edit
											</a>
											<a class="dropdown-item" href="{{ route('cabang_hapus', $u->id) }}" onclick="return confirm('Yakin ingin menghapus cabang ini?')">
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
            var url = '{{ route("cabang_api") }}'

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
                    add_info(e.latlng.lat, e.latlng.lng)
                })
            })

            var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);

            $('.lihat_btn').click(function(event){
                let lat = $(this).data('lat')
                let long = $(this).data('long')

                window.scrollTo(0, 0)
                add_info(lat, long)
            })

            function add_info(lat, long){
                map.flyTo([lat, long], 19)
                radius.setLatLng([lat, long])
                radius.setRadius(30).addTo(map)
                //loading
                $('.tempat_info').html('Loading...')

                let data = get_info(lat, long)
                //set
                data.then(function(w){
                    set_info(w)
                })
            }
            async function get_info(lat, long){
                try {
                    let fetchURL = `${url}?lat=${lat}&long=${long}`
                    const response = await fetch(fetchURL);
                    if (!response.ok) {
                        show_alert('danger', response.statusText)
                        return
                    }
    
                    const json = await response.json();
                    return json;
                } catch (error) {
                    show_alert('danger', error.message)
                    return
                }
            }
            function set_info(data){
                if(!data.status) return;
                if(data.status == 500){
                    show_alert('danger', data.message)
                    return
                }

                let cabang = data.payload
                if(!cabang){
                    show_alert('warning', data.message)
                    return
                }

                $('#nama').html(cabang.nama)
                $('#kode').html(cabang.kode)
                $('#alamat').html(cabang.alamat)
                $('#fasilitas').html(cabang.fasilitas)
                set_href(cabang.id)
            }
            function show_alert(warna, message){
                //reset
                $('.tempat_info').html('-')
                $('.action_info').each(function(i, element){
                    let button = $(element)
                    button.attr('href', 'javascript:void(0)')
                })

                let html = `<div class="alert alert-${warna} alert-dismissable">${message}</div>`
                $('#tempat_alert').html(html)
            }
            function set_href(id){
                $('.action_info').each(function(i, element){
                    let button = $(element)
                    let act_url = button.data('url')+'/'+id
                    button.attr('href', act_url)
                })
            }
        </script>
    </x-layout>
</x-root>