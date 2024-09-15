@extends('layout.template')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title d-flex justify-content-between">
                    <button onclick="modalAction('{{ url('/level/reset') }}')" class="btn btn-danger">Reset</button>
                    <button onclick="modalAction('{{ url('/level/create') }}')" class="btn btn-primary ml-auto">Tambah
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
                <table id="table_level" class="table table-striped display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Level</th>
                            <th>Nama Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div id="levelModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
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
                            _token: '{{ csrf_token() }}' // Pastikan CSRF token disertakan
                        },
                        success: function(response) {
                            if (response.status) {
                                $('#confirmResetModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                dataLevel.ajax.reload(); // Reload DataTable setelah reset
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
                $('#levelModal').load(url, function() {
                    $('#levelModal').modal('show');
                });
            }
        }

        var dataLevel
        $(document).ready(function() {
            dataLevel = $('#table_level').DataTable({
                scrollX: true,
                serverSide: true,
                select: true,
                ajax: {
                    "url": "{{ url('level/list') }}",
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
                    },
                    {
                        data: "level_code",
                        className: "",
                        width: "12%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "level_name",
                        className: "",
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
                ]
            });

            $('#level_id').on('change', function() {
                dataLevel.ajax.reload();
            });
        });
    </script>
@endpush
