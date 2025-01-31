<x-root :title="'Login | nama_app'">
	<x-front-layout>
		<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light border-2 border-bottom  p-2" aria-label="Main navigation">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{ route('base') }}">
					<img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="">
				</a>
				
				<button class="btn btn-outline-primary" type="button">Register</button>
			</div>
		</nav>

		<div class="container-fluid" id="content">
			<div class="login-wrap h-100 d-flex align-items-center flex-wrap justify-content-center">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-6">
							<img src="{{ asset('vendors/images/login-page-img.png') }}" alt="">
						</div>
						<div class="col-md-6">
							<div class="login-box bg-white box-shadow border-radius-10">
								<div class="login-title">
									<h2 class="text-center text-primary">Login To DeskApp</h2>
								</div>
								<form action="{{ route('user_login') }}" method="POST">
									@csrf
									<div class="input-group custom">
										<input type="text" name="username" class="form-control form-control-lg" placeholder="Username" value="{{ old('username') }}">
										<div class="input-group-append custom">
											<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
										</div>
									</div>
									<div class="input-group custom">
										<input type="password" name="password" class="form-control form-control-lg" placeholder="**********">
										<div class="input-group-append custom">
											<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="input-group mb-0">
												<button class="btn btn-primary btn-lg btn-block" type="submit">Masuk</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</x-front-layout>
</x-root>