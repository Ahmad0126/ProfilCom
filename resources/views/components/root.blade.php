<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>{{ $title }}</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/apple-touch-icon.png') }}">
	<link rel="icon" href="{{ $favicon }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="{{ asset('vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>

</head>

<body>
    {{-- Child Content --}}
    {{ $slot }}

    {{-- Notification Center --}}
    <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content bg-success text-white">
                <div class="modal-body text-center">
                    <h3 class="text-white mb-15"><i class="icon-copy fa fa-check"></i> OK</h3>
                    @if (session('alert'))
                        <p>{{ session('alert') }}</p>
                    @endif
                    <button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    @isset($errors)
        <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content bg-danger text-white">
                    <div class="modal-body text-center">
                        <h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Error</h3>
                        @foreach ($errors->all() as $e)
                            <p>{{ $e }}</p>
                        @endforeach
                        <button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <script>
                $('#error').modal('show')
            </script>
        @endif
    @endisset
    @if (session('alert'))
        <script>
            $('#success').modal('show')
        </script>
    @endif
</body>
</html>