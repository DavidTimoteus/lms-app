@extends('layout.template')
@section('content')
    <div class="card-header bg-transparent">
        <h3 class="card-title">My Course</h3>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs justify-content-center mb-4" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="All-Tab" data-bs-toggle="tab" href="#All" role="tab"
                    aria-controls="All" aria-selected="true">All</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="onProgress-tab" data-bs-toggle="tab" href="#onProgress" role="tab"
                    aria-controls="onProgress" aria-selected="false">On Progress</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="complete-tab" data-bs-toggle="tab" href="#complete" role="tab"
                    aria-controls="complete" aria-selected="false">Complete</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="All" role="tabpanel" aria-labelledby="All-Tab">

                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8 col-xxl-10">
                        <div class="card border-light-subtle p-4">
                            <div class="row gy-3 align-items-center">
                                <div class="col-md-4">
                                    <a href="#!" class="bsb-hover-image d-block rounded overflow-hidden">
                                        <img class="img-fluid author-avatar bsb-scale bsb-hover-scale-up" loading="lazy"
                                            src="{{ asset('assets/images/ExampleCourse.png') }}" alt="Iris Henry">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title mb-2">
                                            <a class="card-link text-decoration-none" href="#!">
                                                HTML, CSS, and Javascript for Web
                                                Developers
                                            </a>
                                        </h3>
                                        <p class="card-text mb-3">
                                            Learn: HTML | CSS | JavaScript | Web programming | Web development |
                                            Front-end | Responsive
                                            | JQuery
                                        </p>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">By : David Timoteus</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8 col-xxl-10">
                        <div class="card border-light-subtle p-4">
                            <div class="row gy-3 align-items-center">
                                <div class="col-md-4">
                                    <a href="#!" class="bsb-hover-image d-block rounded overflow-hidden">
                                        <img class="img-fluid author-avatar bsb-scale bsb-hover-scale-up" loading="lazy"
                                            src="{{ asset('assets/images/ExampleCourse.png') }}" alt="Iris Henry">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title mb-2">
                                            <a class="card-link text-decoration-none" href="#!">
                                                Basic Fundamentals of Interior & Graphics Design
                                            </a>
                                        </h3>
                                        <p class="card-text mb-3">
                                            Learn: HTML | CSS | JavaScript | Web programming | Web development |
                                            Front-end | Responsive
                                            | JQuery
                                        </p>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">By : David Timoteus</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8 col-xxl-10">
                        <div class="card border-light-subtle p-4">
                            <div class="row gy-3 align-items-center">
                                <div class="col-md-4">
                                    <a href="#!" class="bsb-hover-image d-block rounded overflow-hidden">
                                        <img class="img-fluid author-avatar bsb-scale bsb-hover-scale-up" loading="lazy"
                                            src="{{ asset('assets/images/ExampleCourse.png') }}" alt="Iris Henry">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title mb-2">
                                            <a class="card-link text-decoration-none" href="#!">
                                                Marketing 2024: Complete Guide To Instagram Growth
                                            </a>
                                        </h3>
                                        <p class="card-text mb-3">
                                            Learn: HTML | CSS | JavaScript | Web programming | Web development |
                                            Front-end | Responsive
                                            | JQuery
                                        </p>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">By : David Timoteus</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="onProgress" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8 col-xxl-10">
                        <div class="card border-light-subtle p-4">
                            <div class="row gy-3 align-items-center">
                                <div class="col-md-4">
                                    <a href="#!" class="bsb-hover-image d-block rounded overflow-hidden">
                                        <img class="img-fluid author-avatar bsb-scale bsb-hover-scale-up" loading="lazy"
                                            src="{{ asset('assets/images/ExampleCourse.png') }}" alt="Iris Henry">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title mb-2">
                                            <a class="card-link text-decoration-none" href="#!">
                                                HTML, CSS, and Javascript for Web
                                                Developers
                                            </a>
                                        </h3>
                                        <p class="card-text mb-3">
                                            Learn: HTML | CSS | JavaScript | Web programming | Web development |
                                            Front-end | Responsive
                                            | JQuery
                                        </p>
                                        <h6 class="card-subtitle mb-4 text-body-secondary">By : David Timoteus</h6>
                                        <div class="progress progress-primary  mb-4" bis_skin_checked="1">
                                            <div class="progress-bar progress-label" role="progressbar"
                                                style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                aria-valuemax="100" bis_skin_checked="1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="complete" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8 col-xxl-10">
                        <div class="card border-light-subtle p-4">
                            <div class="row gy-3 align-items-center">
                                <div class="col-md-4">
                                    <a href="#!" class="bsb-hover-image d-block rounded overflow-hidden">
                                        <img class="img-fluid author-avatar bsb-scale bsb-hover-scale-up" loading="lazy"
                                            src="{{ asset('assets/images/ExampleCourse.png') }}" alt="Iris Henry">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title mb-2">
                                            <a class="card-link text-decoration-none" href="#!">
                                                HTML, CSS, and Javascript for Web
                                                Developers
                                            </a>
                                        </h3>
                                        <p class="card-text mb-3">
                                            Learn: HTML | CSS | JavaScript | Web programming | Web development |
                                            Front-end | Responsive
                                            | JQuery
                                        </p>
                                        <h6 class="card-subtitle mb-3 text-body-secondary">By : David Timoteus</h6>
                                        <a href="#" class="btn icon icon-left btn-primary me-2">
                                            <i class="bi bi-award"></i>
                                            Score : 88
                                        </a>
                                        <a href="#" class="btn icon icon-left btn-outline-success">
                                            <i class="bi bi-download"></i>
                                            Download Certificate
                                        </a>
                                    </div>
                                </div>
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
    </style>
@endpush
