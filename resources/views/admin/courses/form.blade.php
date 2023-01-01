<!-- /.card-header -->
<div class="card-body">
    <div class="form-group">
        <label for="nama-pelajaran">Nama Pelajaran</label>
        <input type="text" class="form-control @error('nama_pelajaran') is-invalid @enderror" id="nama-pelajaran" name="nama_pelajaran"
               placeholder="Masukan nama pelajaran" value="{{ old('nama_pelajaran', $course->name) }}">
        @error('nama_pelajaran')
        <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Jadwal Pelajaran Mulai</label>
                <div class="input-group @error('jam_mulai') is-invalid @enderror date" id="timepicker1" data-target-input="nearest">
                    <input type="text" placeholder="12:00" class="form-control datetimepicker-input" name="jam_mulai"
                           data-target="#timepicker1" value="{{ old('jam_mulai', $course->start_time) }}">
                    <div class="input-group-append" data-target="#timepicker1"
                         data-toggle="datetimepicker1">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                    </div>
                </div>
                <!-- /.input group -->
                @error('jam_mulai')
                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Jadwal Pelajaran Selesai</label>
                <div class="input-group @error('jam_selesai') is-invalid @enderror date" id="timepicker" data-target-input="nearest">
                    <input type="text" placeholder="10:00" class="form-control datetimepicker-input" name="jam_selesai"
                           data-target="#timepicker" value="{{ old('jam_selesai', $course->end_time) }}">
                    <div class="input-group-append" data-target="#timepicker"
                         data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                    </div>
                </div>
                <!-- /.input group -->
                @error('jam_selesai')
                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="nama-kelas">Nama Kelas</label>
        <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama-kelas" name="nama_kelas"
               placeholder="Masukan nama kelas" value="{{ old('nama_kelas', $course->class_name) }}">
        @error('nama_kelas')
        <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="nama-guru">Nama Guru</label>
        <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="nama-guru" name="nama_guru"
               placeholder="Masukan nama guru" value="{{ old('nama_guru', $course->teacher_name) }}">
        @error('nama_guru')
        <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>
