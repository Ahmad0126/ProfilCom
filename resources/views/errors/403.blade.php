<x-root :title="'Forbidden'">
    <x-front-layout>
        <div class="error-page d-flex align-items-center flex-wrap justify-content-center" style="margin-top: 8rem;">
            <div class="pd-10">
                <div class="error-page-wrap text-center">
                    <h1>403</h1>
                    <h3>Error: 403 Forbidden</h3>
                    <p>Sorry, access to this resource on the server is denied.<br>Either check the URL</p>
                    <div class="pt-20 mx-auto max-width-200 pb-5 mb-5">
                        <a href="{{ route('base') }}" class="btn btn-primary btn-block btn-lg">Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </x-front-layout>
</x-root>