@extends('layout.template')

@section('content')
    @include('layout.breadcrumb')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title d-flex justify-content-between">
                    <button onclick="modalAction('{{ url('/user/reset') }}')" class="btn btn-danger">Reset</button>
                    <button onclick="modalAction('{{ url('/user/create') }}')" class="btn btn-primary">Tambah Data</button>
                </h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-form-label">Filter:</label>
                            <div class="col-2">
                                <select class="form-control" id="level_id" name="level_id" required>
                                    <option value="">- semua -</option>
                                    @foreach ($level as $item)
                                        <option value="{{ $item->level_id }}">{{ $item->level_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="table_user" class="table table-striped display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Level </th>
                            <th>Created On</th>
                            <th>Last Updated</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div id="userModal" class="modal fade animate shake" tabindex="-1" role="dialog" databackdrop="static"
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
                // Jika URL mengarah ke reset, tampilkan modal konfirmasi
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
                                dataUser.ajax.reload();
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
                $('#userModal').load(url, function() {
                    $('#userModal').modal('show');
                });
            }
        }
        var dataUser;
        $(document).ready(function() {
            dataUser = $('#table_user').DataTable({
                scrollX: true,
                serverSide: true,
                ajax: {
                    "url": "{{ url('user/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.level_id = $('#level_id').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    width: "10%",
                    orderable: false,
                    searchable: false
                }, {
                    data: "email",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "name",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "level.level_name",
                    className: "",
                    orderable: false,
                    searchable: true
                }, {
                    data: "created_at",
                    className: "",
                    orderable: true,
                    searchable: false
                }, {
                    data: "updated_at",
                    className: "",
                    orderable: true,
                    searchable: false
                }, {
                    data: "aksi",
                    className: "",
                    width: "15%",
                    orderable: false,
                    searchable: false
                }],
                order: [
                    [1,
                        'asc'
                    ]
                ]
            });
            $('#level_id').on('change', function() {
                dataUser.ajax.reload();
            });
        });
    </script>
@endpush
