<x-root :title="$title">
	<x-layout :pointer="6">
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue h4">Daftar Link Sosmed</h4>
				</div>
				<div class="pull-right">
					<a href="#" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="modal" 
						data-target="#cu_modal" role="button" data-url="{{ route('sosmed_tambah') }}" data-judul="Tambah Sosmed">
						<i class="fa fa-plus"></i> Tambah
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Sosmed</th>
							<th scope="col">URL</th>
							<th scope="col">Icon</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach ($sosmed as $u)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $u->nama_sosmed }}</td>
								<td>{{ $u->url }}</td>
								<td>
                                    
                                    <img style="width: 25px;" src="{{ asset('storage/'.$u->logo) }}" alt="">
                                </td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#cu_modal"
												data-id="{{ $u->id }}" data-nama="{{ $u->nama_sosmed }}" data-edit="true" 
                                                data-link="{{ $u->url }}" data-icon="{{ asset('storage/'.$u->logo) }}"
                                                data-judul="Edit Sosmed" data-url="{{ route('sosmed_edit') }}">
												<i class="dw dw-edit2"></i> Edit
											</a>
											<a class="dropdown-item" href="{{ route('sosmed_hapus', $u->id) }}" onclick="return confirm('Yakin ingin menghapus sosmed ini?')">
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
						<h4 class="modal-title" id="myLargeModalLabel">Tambah Sosmed</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<form action="{{ route('sosmed_tambah') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="modal-body">
							<div class="form-group row">
								<label class="col-md-12 col-lg-2 col-form-label">Nama Sosmed</label>
								<div class="col-md-12 col-lg-10">
									<input type="hidden" name="id">
									<input name="nama_sosmed" class="form-control" type="text" placeholder="Masukkan Nama Sosmed">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-12 col-lg-2 col-form-label">URL</label>
								<div class="col-md-12 col-lg-10">
									<input name="url" class="form-control" type="url" placeholder="Masukkan URL Sosmed">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-12 col-lg-2 col-form-label">Icon</label>
								<div class="col-md-10 col-lg-8">
									<input name="logo" class="form-control h-auto" type="file" accept=".png, .svg, .ico, .webp">
								</div>
                                <div class="col-2">
                                    <img src="" alt="Icon" width="25px">
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
				modal.find('input[name="nama_sosmed"]').val(button.data('nama'))
				modal.find('img').attr('src', button.data('icon') ? button.data('icon') : '')
				modal.find('input[name="url"]').val(button.data('link'))
			})
		</script>
	</x-layout>
</x-root>