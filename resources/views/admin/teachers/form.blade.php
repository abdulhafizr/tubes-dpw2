@section('head')
    <link rel="stylesheet"
          href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

<div class="row">
    <div class="col-md-8">
        <div class="card-body">
            <div class="form-group">
                <label for="nip">Nomor Identitas Pegawai Negeri Sipil (NIP)</label>
                <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip"
                       value="{{ old('nip', $teacher->nip) }}" placeholder="Masukan nip">
                @error('nip')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Nama Guru</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                       value="{{ old('name', $teacher->name) }}" placeholder="Masukan nama">
                @error('name')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Alamat Guru</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                       value="{{ old('address', $teacher->address) }}" placeholder="Masukan alamat">
                @error('address')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="place_of_birth">Tempat Lahir Guru</label>
                <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" name="place_of_birth" id="place_of_birth"
                       value="{{ old('place_of_birth', $teacher->place_of_birth) }}" placeholder="Masukan tempat lahir">
                @error('place_of_birth')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="date_of_birth">Tanggal Lahir Guru</label>
                <input type="text" class="form-control datetimepicker-input @error('date_of_birth') is-invalid @enderror" data-toggle="datetimepicker"
                       data-target="#date_of_birth" name="date_of_birth" id="date_of_birth"
                       value="{{ old('date_of_birth', $teacher->date_of_birth) }}" placeholder="Masukan tanggal lahir"/>
                @error('date_of_birth')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">No Telepon Guru</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"
                       value="{{ old('phone', $teacher->phone) }}" placeholder="Masukan telepon">
                @error('phone')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender">Kelamin Guru</label>
                <select class="form-control" id="gender" name="gender">
                    @foreach($genders as $key => $value)
                        <option value="{{ $key }}" {{ $teacher->gender == $key ? 'selected' : ''}}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4 p-4">
        <img src="{{ asset($teacher->photo ?? 'img/default-avatar.svg') }}" id="photo-preview" width="100%" height="auto" class="teacher-photo img-fluid img-thumbnail" alt="Foto Guru">
        <div class="form-group">
            <div class="input-group mt-2">
                <div class="custom-file">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" aria-describedby="photoAddon">
                    <label class="custom-file-label" for="photo">Choose file</label>
                </div>
            </div>
            @error('photo')
            <span class="error d-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

@section('script')
    <script src="{{ asset('plugins/moment/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"
            type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#date_of_birth').datetimepicker({
                viewMode: 'years',
                format: 'YYYY-MM-DD'
            });
            $('#photo').change(function () {
                const reader = new FileReader();
                reader.onload = (e) => {
                    $('#photo-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
