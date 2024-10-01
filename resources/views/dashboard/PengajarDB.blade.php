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
                            <h6 class="text-muted font-semibold">Courses Created</h6>
                            <h6 class="font-extrabold mb-0">2 Course</h6>
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
                            <h6 class="font-extrabold mb-0">183 Mahasiswa</h6>
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
                                <i class="fas fa-file-import"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-9">
                            <h6 class="text-muted font-semibold">Quiz Created</h6>
                            <h6 class="font-extrabold mb-0">5 Quiz</h6>
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
                            <h6 class="font-extrabold mb-0">3 Quiz</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Aktivitas Harian Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <div id="chart-rekap-bulanan"></div>
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
