<form action="{{ url('/lesson/store') }}" method="POST" id="form-tambah" enctype="multipart/form-data">
    @csrf
    <div id="lessonModal" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabelAdd">Tambah Topik Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Materi</label>
                    <input type="text" value="{{ $course->title }}" class="form-control" required readonly>
                    <input type="hidden" name="course" id="course" value="{{ $course->course_id }}">
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="modul_path" class="form-label">Modul</label>
                        <input class="form-control form-control-sm" name="modul_path" id="modul_path" type="file"
                            accept=".pdf" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Topic Pelajaran</label>
                    <input type="text" name="lesson_title" id="lesson_title" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("#form-tambah").validate({
            rules: {
                course: {
                    required: true,
                    number: true
                },
                lesson_title: {
                    required: true,
                    maxlength: 150
                }
            },
            submitHandler: function(form) {
                var formData = new FormData(form);
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            }).then(() => {
                                location.reload();
                            });
                        } else { // Jika error
                            $('.error-text').text('');
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Terjadi kesalahan saat mengirim data.'
                        });
                        console.error('AJAX Error:', xhr);
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
