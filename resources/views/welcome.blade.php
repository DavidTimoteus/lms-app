@extends('layout.template')

@section('content')
    <div class="container" id="Home">
        <div class="row gy-4 gy-md-5 gy-lg-0 align-items-center" id="Home">
            <div class="col-12 col-lg-7">
                <div class="row">
                    <div class="col-12 col-xl-11">
                        <img src="{{ asset('assets/images/people-working.svg') }}" alt="People working"
                            class="img-fluid svg-image">
                        <h2 class="mt-3 text-center">Build Skill for Today, Tomorrow, and Beyond</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 overflow-hidden">
                <div class="row gy-4">
                    <div class="col-12 col-sm-6">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body text-center px-4 p-xxl-5">
                                <i class="fas fa-laptop-code fa-2x mb-4"></i>
                                <h4>Web <br> Developer</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body text-center px-4 p-xxl-5">
                                <i class="fas fa-laptop-code fa-2x mb-4"></i>
                                <h4>Internet of Things</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body text-center px-4 p-xxl-5">
                                <i class="fas fa-laptop-code fa-2x mb-4"></i>
                                <h4>Data <br> Analyst</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body text-center px-4 p-xxl-5">
                                <i class="fas fa-laptop-code fa-2x mb-4"></i>
                                <h4>Business Intelligence</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body text-center px-4 p-xxl-5">
                                <i class="fas fa-laptop-code fa-2x mb-4"></i>
                                <h4>UI/UX Designer</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body text-center px-4 p-xxl-5">
                                <i class="fas fa-laptop-code fa-2x mb-4"></i>
                                <h4>Cloud Engineer</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Page 2 - Content --}}
        <section class="bsb-blog-5 py-3 py-md-5 py-xl-8">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <h2 class="display-5 mb-4 mb-md-5 text-center">List of Courses</h2>
                        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                    </div>
                </div>
            </div>

            <div class="container overflow-hidden">
                <div class="row gy-4 gy-md-5 gx-xl-6 gy-xl-6 gx-xxl-9 gy-xxl-9">
                    <div class="col-12 col-lg-4">
                        <article>
                            <div class="card border">
                                <figure class="card-img-top mb-0 overflow-hidden bsb-overlay-hover">
                                    <a href="#!">
                                        <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy"
                                            src="{{ asset('assets/images/ExampleCourse.png') }}" alt="Web Developer">
                                    </a>
                                    <figcaption>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-eye text-white bsb-hover-fadeInLeft"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>
                                        <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
                                    </figcaption>
                                </figure>
                                <div class="card-body border p-4">
                                    <div class="entry-header mb-3">
                                        <ul class="entry-meta list-unstyled d-flex mb-2">
                                            <li>
                                                <a class="link-primary text-decoration-none" href="#!">Web
                                                    Developer</a>
                                            </li>
                                        </ul>
                                        <h2 class="card-title entry-title h4 m-0">
                                            <a class="text-decoration-none" href="#!">HTML, CSS, and Javascript for Web
                                                Developers</a>
                                        </h2>
                                    </div>
                                    <p class="card-text entry-summary text-secondary">
                                        HTML, CSS, and Javascript for Web Developers mengajarkan dasar pengembangan web.
                                    </p>
                                </div>
                                <div class="card-footer border-0 bg-transparent p-4">
                                    <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                                        <li>
                                            <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center"
                                                href="#!">
                                                <i class="fas fa-user"></i>
                                                <span class="ms-2 fs-7">36</span>
                                            </a>
                                        </li>
                                        <li>
                                            <span class="px-3"></span>
                                        </li>
                                        <li>
                                            <a class="link-secondary text-decoration-none d-flex align-items-center"
                                                href="#!">
                                                <i class="fas fa-book"></i>
                                                <span class="ms-2 fs-7">12</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-lg-4">
                        <article>
                            <div class="card border">
                                <figure class="card-img-top mb-0 overflow-hidden bsb-overlay-hover">
                                    <a href="#!">
                                        <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy"
                                            src="{{ asset('assets/images/ExampleCourse.png') }}" alt="Web Developer">
                                    </a>
                                    <figcaption>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-eye text-white bsb-hover-fadeInLeft"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>
                                        <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
                                    </figcaption>
                                </figure>
                                <div class="card-body border p-4">
                                    <div class="entry-header mb-3">
                                        <ul class="entry-meta list-unstyled d-flex mb-2">
                                            <li>
                                                <a class="link-primary text-decoration-none" href="#!">UI/UX
                                                    Designer</a>
                                            </li>
                                        </ul>
                                        <h2 class="card-title entry-title h4 m-0">
                                            <a class="text-decoration-none" href="#!">Basic Fundamentals of Interior
                                                &
                                                Graphics Design</a>
                                        </h2>
                                    </div>
                                    <p class="card-text entry-summary text-secondary">
                                        Basic Fundamentals of Interior & Graphics Design mengajarkan dasar desain interior
                                        dan grafis untuk pemula.
                                    </p>
                                </div>
                                <div class="card-footer border-0 bg-transparent p-4">
                                    <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                                        <li>
                                            <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center"
                                                href="#!">
                                                <i class="fas fa-user"></i>
                                                <span class="ms-2 fs-7">36</span>
                                            </a>
                                        </li>
                                        <li>
                                            <span class="px-3"></span>
                                        </li>
                                        <li>
                                            <a class="link-secondary text-decoration-none d-flex align-items-center"
                                                href="#!">
                                                <i class="fas fa-book"></i>
                                                <span class="ms-2 fs-7">12</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-lg-4">
                        <article>
                            <div class="card border">
                                <figure class="card-img-top mb-0 overflow-hidden bsb-overlay-hover">
                                    <a href="#!">
                                        <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy"
                                            src="{{ asset('assets/images/ExampleCourse.png') }}" alt="Web Developer">
                                    </a>
                                    <figcaption>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-eye text-white bsb-hover-fadeInLeft"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>
                                        <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
                                    </figcaption>
                                </figure>
                                <div class="card-body border p-4">
                                    <div class="entry-header mb-3">
                                        <ul class="entry-meta list-unstyled d-flex mb-2">
                                            <li>
                                                <a class="link-primary text-decoration-none" href="#!">Business
                                                    Intelligence</a>
                                            </li>
                                        </ul>
                                        <h2 class="card-title entry-title h4 m-0">
                                            <a class="text-decoration-none" href="#!">Marketing 2024: Complete Guide
                                                To Instagram Growth</a>
                                        </h2>
                                    </div>
                                    <p class="card-text entry-summary text-secondary">
                                        Marketing 2024: Complete Guide To Instagram Growth mengajarkan strategi peningkatan
                                        pengikut di Instagram.
                                    </p>
                                </div>
                                <div class="card-footer border-0 bg-transparent p-4">
                                    <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                                        <li>
                                            <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center"
                                                href="#!">
                                                <i class="fas fa-user"></i>
                                                <span class="ms-2 fs-7">36</span>
                                            </a>
                                        </li>
                                        <li>
                                            <span class="px-3"></span>
                                        </li>
                                        <li>
                                            <a class="link-secondary text-decoration-none d-flex align-items-center"
                                                href="#!">
                                                <i class="fas fa-book"></i>
                                                <span class="ms-2 fs-7">12</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <a href="#!" class="btn bsb-btn-2xl btn-primary rounded-pill mt-2 mt-xl-10">Load More</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="row justify-content-center" id="ContactUs">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="row gy-5 justify-content-center">
                    <div class="col-12 col-lg-5">
                        <div class="d-flex gap-2 flex-column w-100 ">
                            <h2>CONTACT US</h2>
                            <h5>Jl. Soekarno Hatta No. 9 Malang</h5>
                            <button class="btn btn-primary py-2">
                                <i class="fab fa-whatsapp"></i> Hubungi Kami
                            </button>
                            <button class="btn btn-primary py-2">
                                <i class="fas fa-envelope"></i> Kirimkan Pesan
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 d-flex align-items-center justify-content-center gap-3 flex-lg-column">
                        <div class="bg-dark h-100 d-none d-lg-block" style="width: 1px; --bs-bg-opacity: .1;"></div>
                        <div class="bg-dark w-100 d-lg-none" style="height: 1px; --bs-bg-opacity: .1;"></div>
                        <div class="bg-dark h-100 d-none d-lg-block" style="width: 1px; --bs-bg-opacity: .1;"></div>
                        <div class="bg-dark w-100 d-lg-none" style="height: 1px; --bs-bg-opacity: .1;"></div>
                    </div>
                    <div class="col-12 col-lg-5 d-flex">
                        <div class="d-flex flex-column w-100">
                            <h2>GET SOCIAL</h2>
                            <div class="social-media-wrapper">
                                <ul class="nav">
                                    <li class="nav-item me-3">
                                        <a class="nav-link link-primary bg-primary rounded" href="#!">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="text-white bi bi-facebook"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="nav-item me-3">
                                        <a class="nav-link link-primary bg-primary rounded" href="#!">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="text-white bi bi-twitter-x"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link-primary bg-primary rounded" href="#!">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="text-white bi bi-instagram"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-animation/bsb-animation.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-overlay/bsb-overlay.css">
    <style>
        .svg-image {
            width: 100%;
            height: auto;
            max-width: 100%;
        }

        .icon-box {
            background-color: #5a73a6;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .icon-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
