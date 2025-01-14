<x-root :title="$title">
	<x-layout>
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue h4">Daftar User</h4>
				</div>
				<div class="pull-right">
					<a href="#" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="modal" 
						data-target="#cu_modal" role="button" data-url="{{ route('user_tambah') }}" data-judul="Tambah User">
						<i class="fa fa-plus"></i> Tambah
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 1; @endphp
						@foreach ($user as $u)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $u->nama }}</td>
								<td>{{ $u->username }}</td>
								<td>{{ $u->email }}</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#cu_modal"
												data-id="{{ $u->id }}" data-nama="{{ $u->nama }}" data-email="{{ $u->email }}"
												data-username="{{ $u->username }}" data-edit="true" data-judul="Edit User"
												data-url="{{ route('user_edit') }}">
												<i class="dw dw-edit2"></i> Edit
											</a>
											<a class="dropdown-item" href="{{ route('user_hapus', $u->id) }}" onclick="return confirm('Yakin ingin menghapus user ini?')">
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
						<h4 class="modal-title" id="myLargeModalLabel">Tambah User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<form action="{{ route('user_tambah') }}" method="POST">
						@csrf
						<div class="modal-body">
							<div class="form-group row">
								<label class="col-md-12 col-lg-2 col-form-label">Nama</label>
								<div class="col-md-12 col-lg-10">
									<input type="hidden" name="id">
									<input name="nama" class="form-control" type="text" placeholder="Masukkan Nama">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-12 col-lg-2 col-form-label">Username</label>
								<div class="col-md-12 col-lg-10">
									<input name="username" class="form-control" type="text" placeholder="Buat Username">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-12 col-lg-2 col-form-label">Email</label>
								<div class="col-md-12 col-lg-10">
									<input name="email" class="form-control" placeholder="Masukkan Email" type="email">
								</div>
							</div>
							<div class="form-group row" id="password">
								<label class="col-md-12 col-lg-2 col-form-label">Password</label>
								<div class="col-md-12 col-lg-10">
									<input name="password" class="form-control" placeholder="Buat Password" type="password">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
			$('#cu_modal').on('show.bs.modal', function(event){
				var modal = $(this)
				var button = $(event.relatedTarget)
				var password_field = modal.find('#password')

				//password field handler
				password_field.show()
				if(button.data('edit')){
					password_field.hide()
				}

				//change form data
				modal.find('form').attr('action', button.data('url'));
            	modal.find('h4.modal-title').html(button.data('judul'));
				modal.find('input[name="id"]').val(button.data('id'))
				modal.find('input[name="nama"]').val(button.data('nama'))
				modal.find('input[name="username"]').val(button.data('username'))
				modal.find('input[name="email"]').val(button.data('email'))
			})
		</script>
	</x-layout>
</x-root>