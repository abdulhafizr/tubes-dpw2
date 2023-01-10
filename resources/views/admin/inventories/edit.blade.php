@extends("admin.template")

@section("header_title", "INPUT INVENTORI")
@section("header_menu", "Dashboard")
@section("header_submenu", "Inventori")

<style>
    .inventory-photo {
        max-height: 415px!important;
    }
</style>

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <form method="post" action="{{ route('inventory.update', ['inventory' => $inventory]) }}" enctype="multipart/form-data">

                        @csrf
                        @method('put')

                        <div class="card-header">
                            <h3 class="card-title">Form Update Inventori</h3>
                        </div>
                        <!-- /.card-header -->

                        @include('admin.inventories.form')

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

