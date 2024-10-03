@empty($course)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/course') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <form action="{{ url('/courses/' . $course->course_id . '/update') }}" method="POST" id="form-edit"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabelAdd">Edit Data Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="image_path" class="form-label">Tampilan</label>
                            <input class="form-control form-control-sm" name="image_path" id="image_path" type="file"
                                accept=".jpg, .jpeg, .png, .svg">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input value="{{ $course->title }}" type="text" name="title" id="title"
                            class="form-control" required>
                        <small id="error-title" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Kategori Pelajaran</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">- Pilih Kategori -</option>
                            @foreach ($category as $item)
                                <option {{ $item->category_id == $course->category ? 'selected' : '' }}
                                    value="{{ $item->category_id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <small id="error-category" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input value="{{ $course->info }}" type="text" name="info" id="info" class="form-control"
                            required>
                        <small id="error-info" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <div class="form-group mb-3" bis_skin_checked="1">
                            <label for="textAreaDescription" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="textAreaDescription" rows="3">{{ old('description', $course->description) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                    <button type="submit" class="btn btn-warning">Simpan</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $("#form-edit").validate({
                rules: {
                    category: {
                        required: true,
                        number: true
                    },
                    title: {
                        required: true,
                        maxlength: 150
                    },
                    info: {
                        required: true,
                        maxlength: 130
                    },
                    description: {
                        required: true,
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
                                $('#courseModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
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
@endempty
