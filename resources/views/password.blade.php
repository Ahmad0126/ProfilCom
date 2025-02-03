<x-root :title="'Reset Password'">
    <x-layout>
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <img src="{{ asset('vendors/images/forgot-password.png') }}" alt="password">
            </div>
            <div class="col-md-6">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Reset Password</h2>
                    </div>
                    <form action="{{ route('password_reset') }}" method="POST">
                        @csrf
                        <div class="input-group custom">
                            <input type="password" name="password_lama" class="form-control form-control-lg" placeholder="Password Lama">
                            <div class="input-group-append custom">
                                <span class="input-group-text">
                                    <i class="dw dw-padlock1">
                                        <input type="hidden" name="id" value="{{ auth()->id() }}">
                                    </i>
                                </span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" name="password_baru" class="form-control form-control-lg" placeholder="Password Baru" value="{{ old('password_baru') }}">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" name="password_konfirmasi" class="form-control form-control-lg" placeholder="Konfirmasi Password Baru">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-5">
                                <div class="input-group mb-0">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-layout>
</x-root>