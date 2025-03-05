<x-root :title="$title">
	<x-layout :pointer="3">
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue h4">Kategori Berita</h4>
				</div>
				<div class="pull-right">
					<a href="#" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="modal" data-kategori="true"
						data-target="#cu_modal" role="button" data-url="{{ route('kategori_tambah') }}" data-judul="Tambah Kategori Berita">
						<i class="fa fa-plus"></i> Tambah
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Kategori</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach ($kategori as $u)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $u->nama }}</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#cu_modal"
												data-id="{{ $u->id }}" data-nama="{{ $u->nama }}" data-edit="true" 
                                                data-judul="Edit Kategori" data-url="{{ route('kategori_edit') }}">
												<i class="dw dw-edit2"></i> Edit
											</a>
											<a class="dropdown-item" href="{{ route('kategori_hapus', $u->id) }}" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
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
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue h4">Fasilitas Cabang</h4>
				</div>
				<div class="pull-right">
					<a href="#" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="modal" 
						data-target="#cu_modal" role="button" data-url="{{ route('jenis_tambah', 'cabang') }}" data-judul="Tambah Fasilitas Cabang">
						<i class="fa fa-plus"></i> Tambah
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Fasilitas</th>
							<th scope="col">Warna label</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach ($cabang as $u)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $u->label }}</td>
								<td>
									<span class="py-1 px-3 mr-2" style="background-color: {{ $u->warna }}"> </span>
									{{ $u->warna }}
								</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#cu_modal"
												data-id="{{ $u->id }}" data-nama="{{ $u->label }}" data-edit="true" data-warna="{{ $u->warna }}"
                                                data-judul="Edit Fasilitas Cabang" data-url="{{ route('jenis_edit', 'cabang') }}">
												<i class="dw dw-edit2"></i> Edit
											</a>
											<a class="dropdown-item" href="{{ route('jenis_hapus', ['cabang', $u->id]) }}" onclick="return confirm('Yakin ingin menghapus fasilitas ini?')">
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
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue h4">Jenis Lahan</h4>
				</div>
				<div class="pull-right">
					<a href="#" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="modal" 
						data-target="#cu_modal" role="button" data-url="{{ route('jenis_tambah', 'lahan') }}" data-judul="Tambah Jenis Lahan">
						<i class="fa fa-plus"></i> Tambah
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Jenis</th>
							<th scope="col">Warna label</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach ($lahan as $u)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $u->label }}</td>
								<td>
									<span class="py-1 px-3 mr-2" style="background-color: {{ $u->warna }}"> </span>
									{{ $u->warna }}
								</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#cu_modal"
												data-id="{{ $u->id }}" data-nama="{{ $u->label }}" data-edit="true" data-warna="{{ $u->warna }}"
                                                data-judul="Edit Jenis Lahan" data-url="{{ route('jenis_edit', 'lahan') }}">
												<i class="dw dw-edit2"></i> Edit
											</a>
											<a class="dropdown-item" href="{{ route('jenis_hapus', ['lahan', $u->id]) }}" onclick="return confirm('Yakin ingin menghapus jenis ini?')">
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
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue h4">Jenis Jalur</h4>
				</div>
				<div class="pull-right">
					<a href="#" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="modal" 
						data-target="#cu_modal" role="button" data-url="{{ route('jenis_tambah', 'jalur') }}" data-judul="Tambah Jenis Jalur">
						<i class="fa fa-plus"></i> Tambah
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Jenis</th>
							<th scope="col">Warna label</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach ($jalur as $u)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $u->label }}</td>
								<td>
									<span class="py-1 px-3 mr-2" style="background-color: {{ $u->warna }}"> </span>
									{{ $u->warna }}
								</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#cu_modal"
												data-id="{{ $u->id }}" data-nama="{{ $u->label }}" data-edit="true" data-warna="{{ $u->warna }}"
                                                data-judul="Edit Jenis Jalur" data-url="{{ route('jenis_edit', 'jalur') }}">
												<i class="dw dw-edit2"></i> Edit
											</a>
											<a class="dropdown-item" href="{{ route('jenis_hapus', ['jalur', $u->id]) }}" onclick="return confirm('Yakin ingin menghapus jenis ini?')">
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
		<div class="modal fade" id="cu_modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myLargeModalLabel">Tambah Kategori</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<form action="{{ route('kategori_tambah') }}" method="POST">
						@csrf
						<div class="modal-body">
							<div class="form-group row">
								<label class="col-md-12 col-lg-2 col-form-label">Nama</label>
								<div class="col-md-12 col-lg-10">
									<input type="hidden" name="id">
									<input name="label" class="form-control" type="text" placeholder="Masukkan Nama/Label">
								</div>
							</div>
							<div class="form-group row" id="warna">
								<label class="col-md-12 col-lg-2 col-form-label">Warna label</label>
								<div class="col-md-12 col-lg-10">
									<div class="input-group">
										<span class="border input-group-text" id="warna_text">#000000</span>
										<input name="warna" class="form-control" id="warna_input" type="color">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
			$('#cu_modal').on('show.bs.modal', function(event){
				var modal = $(this)
				var button = $(event.relatedTarget)

				//change form data
				modal.find('form').attr('action', button.data('url'));
            	modal.find('h4.modal-title').html(button.data('judul'));
				modal.find('input[name="id"]').val(button.data('id'))
				modal.find('input[name="label"]').val(button.data('nama'))
				modal.find('input[name="warna"]').val(button.data('warna'))
				modal.find('#warna_text').html(button.data('warna'))
				if(button.data('kategori')){
					modal.find('#warna').hide()
				}else{
					modal.find('#warna').show()
				}
			})
			$('#warna_input').on('change', function(event){
				$('#warna_text').html($(this).val())
			})
		</script>
	</x-layout>
</x-root>