@extends('layout.template')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title d-flex justify-content-between">
                    List of Lessons
                </h5>
            </div>
            <div class="card-body">
                <table id="table_lesson" class="table table-striped display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Materi</th>
                            <th>Progress</th>
                            <th>Nilai </th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        var dataLesson;
        $(document).ready(function() {
            dataLesson = $('#table_lesson').DataTable({
                scrollX: true,
                serverSide: true,
                ajax: {
                    "url": "{{ url('course/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.lesson_id = $('#lesson_id').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    width: "10%",
                    orderable: false,
                    searchable: false
                }, {
                    data: "lesson_title",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "progress_percentage",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "lesson_score",
                    className: "",
                    width: "10%",
                    orderable: false,
                    searchable: true
                }, {
                    data: "lesson_status",
                    className: "",
                    width: "10%",
                    orderable: false,
                    searchable: true
                }],
                order: [
                    [1,
                        'asc'
                    ]
                ]
            });
            $('#lesson_id').on('change', function() {
                dataLesson.ajax.reload();
            });
        });
    </script>
@endpush
