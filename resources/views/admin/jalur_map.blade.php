<x-root :title="$title">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <x-layout :pointer="8">
        <style>
            .header{
                z-index: 1001;
            }
        </style>
        <div class="pd-20 card-box mb-30">
            <div class="clearfix border-bottom border-1">
                <h4 class="text-blue h4 mb-3 text-center">Peta Jalur</h4>
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
                                <td>Nama Jalur</td>
                                <td class="tempat_info" id="nama">-</td>
                            </tr>
                            <tr>
                                <td>Kode Jalur</td>
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
                    <h4 class="text-blue h4 mb-3">Daftar Jalur</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('jalur_tambah') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Jalur</th>
							<th scope="col">Kode Jalur</th>
                            <th scope="col">Jenis</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = $jalur->firstItem(); @endphp
						@foreach ($jalur as $u)
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
											<a class="dropdown-item" href="{{ route('jalur_edit', $u->id) }}">
												<i class="dw dw-edit2"></i> Edit
											</a>
											<a class="dropdown-item" href="{{ route('jalur_hapus', $u->id) }}" onclick="return confirm('Yakin ingin menghapus jalur ini?')">
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
            <div class="blog-pagination" style="overflow-x: scroll">
                {{ $jalur->onEachSide(1)->links('pagination.custom') }}
            </div>
        </div>

        <script src="{{ asset('scripts/maps.js') }}"></script>
        <script>
            const url = '{{ route("jalur_api") }}'
            $('.lihat_btn').click(function(event){
                let id = $(this).data('id')
                window.scrollTo(0, 0)
                state = 'jalur'
                add_info(id, 'bounds')
            })
            $(document).ready(function(){
                load_data('jalur', url)
            })
        </script>
    </x-layout>
</x-root>