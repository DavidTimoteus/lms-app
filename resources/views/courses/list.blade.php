@extends('layout.template')
@section('content')
    <section class="container">
        @include('layout.breadcrumb')
        <div class="card-header mb-4">
            <h5 class="card-title d-flex justify-content-end">
                <button onclick="modalAction('{{ url('/courses/create') }}')" class="btn btn-primary">Tambah Data</button>
            </h5>
        </div>
        <div class="row gy-4 gy-md-5 gx-xl-6 gy-xl-6 gx-xxl-9 gy-xxl-9">
            @foreach ($courses as $course)
                <!-- Pastikan ini adalah koleksi kursus -->
                <div class="col-12 col-lg-4">
                    <article>
                        <div class="card border">
                            <figure class="card-img-top mb-0 overflow-hidden bsb-overlay-hover">
                                <a href="#!">
                                    <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy"
                                        src="{{ $course->image_path ? asset('storage/' . $course->image_path) : asset('assets/images/NoImage.jpg') }}">
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
                                        @foreach ($category as $c)
                                            @if ($course->category == $c->category_id)
                                                <li>
                                                    <a class="link-primary text-decoration-none"
                                                        href="#!">{{ $c->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <h2 class="card-title entry-title h4 m-0">
                                        <a class="text-decoration-none"
                                            onclick="modalAction('{{ url('/courses/' . $course->course_id . '/create') }}')"
                                            href="#!">
                                            {{ $course->title }}
                                        </a>
                                    </h2>
                                </div>
                                <p class="card-text entry-summary text-secondary">
                                    {{ $course->info }}
                                </p>
                            </div>
                            <div class="card-footer border-0 bg-transparent p-3">
                                <ul class="entry-meta list-unstyled d-flex justify-content-between align-items-center m-0">
                                    <div class="d-flex">
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
                                    </div>
                                    <div class="d-flex">
                                        <li>
                                            <a class="btn icon icon-left btn-warning" 
                                               onclick="modalAction('{{ url('/courses/' . $course->course_id . '/edit') }}')">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </a>
                                        </li>               
                                        <li>
                                            <span class="px-1"></span>
                                        </li>
                                        <li>
                                            <a class="btn icon icon-left btn-danger delete-course"
                                                data-id="{{ $course->course_id }}">
                                                <i class="bi bi-trash"></i>
                                                Delete
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        <div id="courseModal" class="modal fade animate shake" tabindex="-1" role="dialog" databackdrop="static"
            data-keyboard="false" data-width="75%" aria-hidden="true"></div>
    </section>
@endsection
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-animation/bsb-animation.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-overlay/bsb-overlay.css">
    <style>
        .card-img-top {
            width: 406px;
            height: 208px;
            overflow: hidden;
        }

        .card-img-top img {
            width: 100%;
            height: auto;
        }
    </style>
@endpush
@push('js')
    <script>
        function modalAction(url = '') {
            $('#courseModal').load(url, function() {
                $('#courseModal').modal('show');
            });
        }
    </script>
    <script>
        $(document).on('click', '.delete-course', function(e) {
            e.preventDefault();
            var courseId = $(this).data('id');
            var url = "{{ url('/courses') }}/" + courseId + "/delete";
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.status) {
                                Swal.fire(
                                    'Terhapus!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    location
                                        .reload();
                                });
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    response.message,
                                    'error'
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
@endpush
