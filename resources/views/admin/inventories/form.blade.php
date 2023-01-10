<div class="row">
    <div class="col-md-8">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama Inventori</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                       value="{{ old('name', $inventory->name) }}" placeholder="Masukan nama inventori">
                @error('name')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="total">Total Inventori</label>
                <input type="number" class="form-control @error('total') is-invalid @enderror" name="total" id="total"
                       value="{{ old('total', $inventory->total) }}" placeholder="Masukan total inventori">
                @error('total')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="used">Inventori Digunakan</label>
                <input type="number" class="form-control @error('used') is-invalid @enderror" name="used" id="used"
                       value="{{ old('used', $inventory->used) }}" placeholder="Masukan jumlah inventori yang digunakan">
                @error('used')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="broken">Inventori Rusak</label>
                <input type="number" class="form-control @error('broken') is-invalid @enderror" name="broken" id="broken"
                       value="{{ old('broken', $inventory->broken) }}" placeholder="Masukan jumlah inventori yang rusak">
                @error('broken')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="stock">Stok Inventori</label>
                <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" id="stock"
                       value="{{ old('stock', $inventory->stock) }}" placeholder="Masukan stok inventori">
                @error('stock')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-4 p-4">
        <img src="{{ asset($inventory->photo ?? 'img/default-avatar.svg') }}" id="photo-preview" width="100%" height="auto" class="inventory-photo img-fluid img-thumbnail" alt="Foto Siswa">
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
