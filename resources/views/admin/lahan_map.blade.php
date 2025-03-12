<x-root :title="$title">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <x-layout :pointer="9">
        <style>
            .header{
                z-index: 1001;
            }
        </style>
        <div class="pd-20 card-box mb-30">
            <div class="clearfix border-bottom border-1">
                <h4 class="text-blue h4 mb-3 text-center">Peta Lahan</h4>
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
                                <td>Nama Lahan</td>
                                <td class="tempat_info" id="nama">-</td>
                            </tr>
                            <tr>
                                <td>Kode Lahan</td>
                                <td class="tempat_info" id="kode">-</td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td class="tempat_info" id="jenis">-</td>
                            </tr>
                            <tr>
                                <td>Ditambahkan Pada</td>
                                <td class="tempat_info" id="created">-</td>
                            </tr>
                            <tr>
                                <td>Terakhir Diubah</td>
                                <td class="tempat_info" id="updated">-</td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="tempat_alert"></div>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="clearfix border-bottom border-1">
                <div class="pull-left">
                    <h4 class="text-blue h4 mb-3">Daftar Lahan</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('lahan_tambah') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Lahan</th>
							<th scope="col">Kode Lahan</th>
                            <th scope="col">Jenis</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach ($lahan as $u)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $u->nama }}</td>
								<td>{{ $u->kode }}</td>
								<td>{{ $u->jenis }}</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item lihat_btn" href="javascript:void(0)" data-id="{{ $u->id }}">
                                                <i class="icon-copy dw dw-eye"></i> Lihat
                                            </a>
											<a class="dropdown-item" href="{{ route('lahan_edit', $u->id) }}">
												<i class="dw dw-edit2"></i> Edit
											</a>
											<a class="dropdown-item" href="{{ route('lahan_hapus', $u->id) }}" onclick="return confirm('Yakin ingin menghapus lahan ini?')">
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
            var url = '{{ route("lahan_api") }}'

            var overlayMaps = {
                "Lahan": L.layerGroup([
                    @foreach($lahan as $c)
                        L.polygon({!! $c->posisi !!}, {color: '{{ $c->warna ?? "blue" }}', id: {{ $c->id }}}),
                    @endforeach
                ])
            };

            var map = L.map('map').setView([-7.597343575775382, 110.94985662865446], 13)
            baseMaps.Satelit.addTo(map)
            overlayMaps.Lahan.addTo(map)

            overlayMaps.Lahan.eachLayer(function(layer){
                layer.on({
                    mouseover: (event) => {
                    let layer = event.target;

                    layer.setStyle({
                        weight: 6,
                        opacity: 0.8
                    });

                    layer.bringToFront();
                    },
                    mouseout: (event) => {
                        let layer = event.target;
                        layer.setStyle({
                            weight: 3,
                            opacity: 1
                        });

                        layer.bringToBack();
                    },
                    click: function(e){
                        var id = e.target.options.id;
                        $('#tempat_alert').html('')
                        add_info(id)
                    }
                })
            })

            var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);
          

            $('.lihat_btn').click(function(event){
                let id = $(this).data('id')

                window.scrollTo(0, 0)
                add_info(id)
            })

            function add_info(id){
                //loading
                $('.tempat_info').html('Loading...')

                let data = get_info(id)
                //set
                data.then(function(w){
                    set_info(w)
                })
            }
            async function get_info(id){
                try {
                    let fetchURL = `${url}?id=${id}`
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

                let lahan = data.payload
                if(!lahan){
                    show_alert('warning', data.message)
                    return
                }

                $('#nama').html(lahan.nama)
                $('#kode').html(lahan.kode)
                $('#jenis').html(lahan.jenis)
                $('#created').html(lahan.created_at)
                $('#updated').html(lahan.updated_at)

                let pos = JSON.parse(lahan.posisi)
                map.fitBounds(L.latLngBounds(pos))
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
        </script>
    </x-layout>
</x-root>