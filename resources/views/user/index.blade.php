@extends('layout.template')

@section('content')
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
    </section>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        function modalAction(url = '') {
            $('#userModal').load(url, function() {
                $('#userModal').modal('show');
            });
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
