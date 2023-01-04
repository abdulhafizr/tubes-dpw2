<div class="row">
    <div class="col-md-8">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama Ruang Kelas</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                       value="{{ old('name', $class_room->name) }}" placeholder="Masukan nama ruang kelas">
                @error('name')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="code">Kode Ruang Kelas</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code"
                       value="{{ old('code', $class_room->code) }}" placeholder="Masukan code ruang kelas">
                @error('code')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tables_amount">Jumlah Meja</label>
                <input type="number" class="form-control @error('tables_amount') is-invalid @enderror" name="tables_amount" id="tables_amount"
                       value="{{ old('tables_amount', $class_room->tables_amount) }}" placeholder="Masukan jumlah meja">
                @error('tables_amount')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="chairs_amount">Jumlah Kursi</label>
                <input type="number" class="form-control @error('chairs_amount') is-invalid @enderror" name="chairs_amount" id="chairs_amount"
                       value="{{ old('chairs_amount', $class_room->chairs_amount) }}" placeholder="Masukan jumlah kursi">
                @error('chairs_amount')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="projector_amount">Jumlah Proyektor</label>
                <input type="number" class="form-control @error('projector_amount') is-invalid @enderror" name="projector_amount" id="projector_amount"
                       value="{{ old('projector_amount', $class_room->projector_amount) }}" placeholder="Masukan jumlah projektor">
                @error('projector_amount')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ac_amount">Jumlah AC</label>
                <input type="number" class="form-control @error('ac_amount') is-invalid @enderror" name="ac_amount" id="ac_amount"
                       value="{{ old('ac_amount', $class_room->ac_amount) }}" placeholder="Masukan jumlah AC">
                @error('ac_amount')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="clipboard_amount">Jumlah Papan Tulis</label>
                <input type="number" class="form-control @error('clipboard_amount') is-invalid @enderror" name="clipboard_amount" id="clipboard_amount"
                       value="{{ old('clipboard_amount', $class_room->clipboard_amount) }}" placeholder="Masukan jumlah papan tulis">
                @error('clipboard_amount')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-4 p-4">
        <img src="{{ asset($class_room->photo ?? 'img/default-avatar.svg') }}" id="photo-preview" width="100%" height="auto" class="teacher-photo img-fluid img-thumbnail" alt="Foto Siswa">
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
    <script type="text/javascript">
        $(function () {
            $('#photo').change(function () {
                const reader = new FileReader();
                reader.onload = (e) => {
                    $('#photo-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#name').keyup(function () {
                const inputNameValue = $('#name').val()
                const code = inputNameValue.split(' ').join('-');
                $('#code').val(code);
            });
        });
    </script>
@endsection
