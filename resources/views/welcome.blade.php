<x-root :title="'nama_app'">
    <x-front-layout>
        <header class="jumbotron p-5 mb-4 bg-light border border-1 border-dark border-top-0 rounded-top-0 rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                <button class="btn btn-primary btn-lg" type="button">Example button</button>
            </div>
        </header>

        <div class="container-fluid" id="content">
            <section class="section-wrapper">
                <div class="section-heading">
                    <h5 class="section-title">About Me</h5>
                </div>
                <div class="section-content">
                    <div class="row pd-ltr-20 xs-pd-20-10 aboutme-section-wrapper border-dark">
                        <div class="col-sm-4 border-1 p-3 p-md-5">
                            <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image border border-1 border-dark img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                            </svg>
                        </div>
                        <div class="col-sm-8 border-1 p-3 p-md-5">
                            <div class="d-flex align-items-center justify-content-start">
                                <section class="aboutme-section">
                                    <h1 class="display-3 fw-bold">Designed for engineers</h1>
                                    <h3 class="fw-normal text-muted mb-3">Build anything you want with Aperture</h3>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </x-front-layout>
</x-root>