@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                            <div class="stats-icon purple mb-2">
                                <i class="fas fa-book"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-9">
                            <h6 class="text-muted font-semibold">Course Contributions</h6>
                            <h6 class="font-extrabold mb-0">112.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                            <div class="stats-icon blue mb-2">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-9">
                            <h6 class="text-muted font-semibold">Pending Assignment</h6>
                            <h6 class="font-extrabold mb-0">183.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                            <div class="stats-icon green mb-2">
                                <i class="fas fa-calendar-times"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-9">
                            <h6 class="text-muted font-semibold">Assignment Overdue</h6>
                            <h6 class="font-extrabold mb-0 text-warning">The feature is under development.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                            <div class="stats-icon red mb-2">
                                <i class="fas fa-file-contract"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-9">
                            <h6 class="text-muted font-semibold">Unattempted Quiz</h6>
                            <h6 class="font-extrabold mb-0 text-warning">The feature is under development.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-heading" bis_skin_checked="1">
        <h3>Recently Accessed Course</h3>
    </div>

    <h6 class="font-extrabold mb-0 text-warning text-center">The feature is under development.</h6>
    {{-- <div class="row gy-4 gy-md-5 gx-xl-6 gy-xl-6 gx-xxl-9 gy-xxl-9">
        <div class="col-12 col-lg-4">
            <article>
                <div class="card border">
                    <figure class="card-img-top mb-0 overflow-hidden bsb-overlay-hover">
                        <a href="#!">
                            <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy"
                                src="{{ asset('assets/images/ExampleCourse.png') }}" alt="Web Developer">
                        </a>
                        <figcaption>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-eye text-white bsb-hover-fadeInLeft" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                            <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
                        </figcaption>
                    </figure>
                    <div class="card-body border p-4">
                        <div class="entry-header">
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
                                <a class="link-secondary text-decoration-none d-flex align-items-center" href="#!">
                                    <i class="fas fa-hourglass-half"></i>
                                    <span class="ms-2 fs-7">12%</span>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-eye text-white bsb-hover-fadeInLeft" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                            <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
                        </figcaption>
                    </figure>
                    <div class="card-body border p-4">
                        <div class="entry-header">
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
                                <a class="link-secondary text-decoration-none d-flex align-items-center" href="#!">
                                    <i class="fas fa-hourglass-half"></i>
                                    <span class="ms-2 fs-7">12%</span>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-eye text-white bsb-hover-fadeInLeft" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                            <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
                        </figcaption>
                    </figure>
                    <div class="card-body border p-4">
                        <div class="entry-header">
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
                                <a class="link-secondary text-decoration-none d-flex align-items-center" href="#!">
                                    <i class="fas fa-hourglass-half"></i>
                                    <span class="ms-2 fs-7">12%</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </article>
        </div>
    </div> --}}
@endsection

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-animation/bsb-animation.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-overlay/bsb-overlay.css">
    <style>
    </style>
@endpush
