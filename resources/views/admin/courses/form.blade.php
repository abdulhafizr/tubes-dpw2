@section('head')
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

<div class="row">
    <div class="col-md-8">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama Pelajaran</label>
                <input type="text" class="form-control @error('course_name') is-invalid @enderror" id="name" name="name"
                       placeholder="Nama" value="{{ old('name', $course->name) }}">
                @error('name')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="start_time">Jam Mulai:</label>
                        <input type="text" class="form-control datetimepicker-input @error('start_time') is-invalid @enderror" data-toggle="datetimepicker"
                               data-target="#start_time" name="start_time" id="start_time"
                               value="{{ old('start_time', $course->end_time) }}" placeholder="10:00"/>
                        <!-- /.input group -->
                        @error('start_time')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="end_time">Jam Selesai:</label>
                        <input type="text" class="form-control datetimepicker-input @error('end_time') is-invalid @enderror" data-toggle="datetimepicker"
                               data-target="#end_time" name="end_time" id="end_time"
                               value="{{ old('date_of_birth', $course->end_time) }}" placeholder="12:00"/>
                        <!-- /.input group -->
                        @error('end_time')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="class_name">Nama Kelas</label>
                <input type="text" class="form-control @error('class_name') is-invalid @enderror" id="class_name" name="class_name"
                       placeholder="Masukan nama kelas" value="{{ old('class_name', $course->class_name) }}">
                @error('class_name')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="teacher_id">Nama Guru</label>
                    </div>
                    <select class="custom-select @error('teacher_id') is-invalid @enderror" id="teacher_id" name="teacher_id">
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('teacher_id')
                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-4 p-4">
        <img src="{{ asset($course-> teacher->photo ?? 'img/default-avatar.svg') }}" id="photo-preview" width="100%" height="auto" class="teacher-photo img-thumbnail" alt="Foto Guru">
    </div>
</div>

@section('script')
    <script src="{{ asset('plugins/moment/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"
            type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#start_time,#end_time').datetimepicker({
                format: 'LT'
            });
            $('#photo').change(function () {
                const reader = new FileReader();
                reader.onload = (e) => {
                    $('#photo-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
            const teacherSelector = $('#teacher_id');
            teacherSelector.change(function () {
                const teacherId = teacherSelector.val();
                fetch(`/dashboard/teacher/photo?id=${teacherId}`)
                    .then(response => response.json())
                    .then(data => $('#photo-preview').attr('src', '{{ url('/') }}' + '/' + data.photo))
            })
        });
    </script>
@endsection
