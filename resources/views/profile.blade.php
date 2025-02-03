<x-root :title="$title">
    <x-front-layout>
        <style>
            h1{
                font-size: 4.5rem;
                line-height: 1.2;
                font-weight: 700;
            }
            h3{
                font-weight: 400;
                color: #6c757d;
                margin-bottom: 1rem;
            }
        </style>
        <div class="container-fluid" id="content">
            <div class="row pd-ltr-20 xs-pd-20-10">
                <div class="col-sm-12 border-1 overflow-hidden p-3 p-md-5 m-md-3 text-center">
                    {!! $profil !!}
                </div>
            </div>
        </div>
    </x-front-layout>
</x-root>