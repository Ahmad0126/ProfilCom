<x-root :title="$title">
    <x-front-layout>
        <div class="container-fluid patterned" id="content">
            <div class="row pd-ltr-20 xs-pd-20-10">
                <div class="col-sm-12 border-1 overflow-hidden p-3 p-md-5 m-md-3 text-center">
                    <h1 class="display-3 fw-bold">{{ $judul }}</h1>
                    <h3 class="fw-normal text-muted mb-3">{{ $subjudul }}</h3>
                    <div class="card-box p-4">{!! $profil !!}</div>
                </div>
            </div>
        </div>
    </x-front-layout>
</x-root>