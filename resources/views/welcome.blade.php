<x-root :title="'nama_app'">
    <div class="header box-shadow w-100">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="">
				</a>
			</div>
			<div class="navbar-nav d-flex flex-row" style="column-gap: 1.5rem;">
                <a class="nav-link" href="register.html">Link 1</a>
                <a class="nav-link" href="register.html">Link 2</a>
                <a class="nav-link" href="register.html">Link 3</a>
                <a class="nav-link" href="register.html">Link 4</a>
			</div>
		</div>
	</div>
    <style>
        #content{
            padding-top: 80px;
        }
        @media (max-width: 1024px){
            #content{
                padding-top: 10px;
            }
        }
    </style>
    <div class="container" id="content">
        <div class="row pd-ltr-20 xs-pd-20-10">
            <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="blog-list">
                    <ul>
                        <li>
                            <div class="row no-gutters">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="blog-img">
                                        <img src="{{ asset('vendors/images/img2.jpg') }}" alt="" class="bg_img">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="blog-caption">
                                        <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
                                        <div class="blog-by">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                            <div class="pt-10">
                                                <a href="#" class="btn btn-outline-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="blog-img">
                                        <img src="{{ asset('vendors/images/img3.jpg') }}" alt="" class="bg_img">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="blog-caption">
                                        <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
                                        <div class="blog-by">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                            <div class="pt-10">
                                                <a href="#" class="btn btn-outline-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="blog-img">
                                        <img src="{{ asset('vendors/images/img4.jpg') }}" alt="" class="bg_img">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="blog-caption">
                                        <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
                                        <div class="blog-by">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                            <div class="pt-10">
                                                <a href="#" class="btn btn-outline-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="blog-img">
                                        <img src="{{ asset('vendors/images/img5.jpg') }}" alt="" class="bg_img">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="blog-caption">
                                        <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
                                        <div class="blog-by">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                            <div class="pt-10">
                                                <a href="#" class="btn btn-outline-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="blog-pagination">
                    <div class="btn-toolbar justify-content-center mb-15">
                        <div class="btn-group">
                            <a href="#" class="btn btn-outline-primary prev"><i class="fa fa-angle-double-left"></i></a>
                            <a href="#" class="btn btn-outline-primary">1</a>
                            <a href="#" class="btn btn-outline-primary">2</a>
                            <span class="btn btn-primary current">3</span>
                            <a href="#" class="btn btn-outline-primary">4</a>
                            <a href="#" class="btn btn-outline-primary">5</a>
                            <a href="#" class="btn btn-outline-primary next"><i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="card-box mb-30">
                    <h5 class="pd-20 h5 mb-0">Categories</h5>
                    <div class="list-group">
                        <a href="#" class="list-group-item d-flex align-items-center justify-content-between">HTML <span class="badge badge-primary badge-pill">7</span></a>
                        <a href="#" class="list-group-item d-flex align-items-center justify-content-between">Css <span class="badge badge-primary badge-pill">10</span></a>
                        <a href="#" class="list-group-item d-flex align-items-center justify-content-between active">Bootstrap <span class="badge badge-primary badge-pill">8</span></a>
                        <a href="#" class="list-group-item d-flex align-items-center justify-content-between">jQuery <span class="badge badge-primary badge-pill">15</span></a>
                        <a href="#" class="list-group-item d-flex align-items-center justify-content-between">Design <span class="badge badge-primary badge-pill">5</span></a>
                    </div>
                </div>
                <div class="card-box mb-30">
                    <h5 class="pd-20 h5 mb-0">Latest Post</h5>
                    <div class="latest-post">
                        <ul>
                            <li>
                                <h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></h4>
                                <span>HTML</span>
                            </li>
                            <li>
                                <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
                                <span>Css</span>
                            </li>
                            <li>
                                <h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></h4>
                                <span>jQuery</span>
                            </li>
                            <li>
                                <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
                                <span>Bootstrap</span>
                            </li>
                            <li>
                                <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
                                <span>Design</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-box overflow-hidden">
                    <h5 class="pd-20 h5 mb-0">Archives</h5>
                    <div class="list-group">
                        <a href="#" class="list-group-item d-flex align-items-center justify-content-between">January 2020</a>
                        <a href="#" class="list-group-item d-flex align-items-center justify-content-between">February 2020</a>
                        <a href="#" class="list-group-item d-flex align-items-center justify-content-between">March 2020</a>
                        <a href="#" class="list-group-item d-flex align-items-center justify-content-between">April 2020</a>
                        <a href="#" class="list-group-item d-flex align-items-center justify-content-between">May 2020</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Tambahin footer di sini --}}
</x-root>