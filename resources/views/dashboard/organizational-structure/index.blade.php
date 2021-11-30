@extends('layouts.dashboard')

@section('title', 'Struktur Organisasi')

@section('style')
<style>
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title font-weight-bold">Struktur Organisasi</p>
                <a href="{{ route('dashboard.department.create') }}" class="btn btn-primary"
                    id="btn-create">Tambah</a>
            </div>
            <div class="card-body">
                <table class="table datatable table-responsive" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Departemen</th>
                            <th>Deskripsi</th>
                            <th class="text-center" style="width: 1%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                        <tr>
                            <td></td>
                            <td class="text-nowrap">{{ $department->name }}</td>
                            <td class="department-description">{{ Str::limit($department->description, 64)}}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('dashboard.department.show', $department->id) }}" class="btn btn-warning">Detail</a>
                                    <a href="{{ route('dashboard.department.edit', $department->id) }}" class="btn btn-secondary">Edit</a>
                                    <button class="btn btn-danger btn-delete" value="{{ $department->id }}">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<form action="" method="post" id="delete-form" class="d-none">
    @csrf
    @method("DELETE")
    <button type="submit" id="hidden-delete-button">Delete</button>
</form>
@endsection

@section('script')
<script>
    $('.btn-delete').on('click', function () {
            let id = $(this).val();
            $("#delete-form").prop("action", "{{ route('dashboard.department.index') }}/" + id);

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus data!',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonText: 'Batal',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.isConfirmed) {
                    $("#hidden-delete-button").click();
                }
            });
        });
</script>
@endsection
