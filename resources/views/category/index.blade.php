@extends('layout.template')

@section('content')
    @include('layout.breadcrumb')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title d-flex justify-content-between">
                    <button onclick="modalAction('{{ url('/category/reset') }}')" class="btn btn-danger">Reset</button>
                    <button onclick="modalAction('{{ url('/category/create') }}')" class="btn btn-primary ml-auto">Tambah
                        Data</button>
                </h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <table id="table_category" class="table table-striped display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div id="categoryModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
            data-keyboard="false" data-width="75%" aria-hidden="true"></div>

        <div id="confirmResetModal" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="confirmResetModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmResetModalLabel">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            <h5 class="text-danger"><i class="icon fas fa-ban"></i> Konfirmasi !!!</h5>
                            Apakah Anda ingin menghapus semua data di bawah ini?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger" id="confirmResetButton">Ya, Hapus Semua</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        function modalAction(url = '') {
            if (url.includes('reset')) {
                $('#confirmResetModal').modal('show');
                $('#confirmResetButton').off('click').on('click', function() {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status) {
                                $('#confirmResetModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                dataCategory.ajax.reload();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: response.message
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: 'Tidak dapat menghapus data.'
                            });
                        }
                    });
                });
            } else {
                $('#categoryModal').load(url, function() {
                    $('#categoryModal').modal('show');
                });
            }
        }

        var dataCategory
        $(document).ready(function() {
            dataCategory = $('#table_category').DataTable({
                scrollX: true,
                serverSide: true,
                select: true,
                ajax: {
                    "url": "{{ url('category/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.category_id = $('#category_id').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        width: "5%",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "name",
                        className: "",
                        width: "80%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "",
                        width: "15%",
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [1,
                        'asc'
                    ]
                ]
            });
            $('#category_id').on('change', function() {
                dataCategory.ajax.reload();
            });
        });
    </script>
@endpush
