@extends('layouts.dashboard')

@section('title', 'Pengguna')

@section('style')
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title font-weight-bold">Pengguna</p>
                <a href="{{ route('dashboard.user.create') }}" class="btn btn-primary"
                    id="btn-create">Tambah</a>
            </div>
            <div class="card-body">
                <table class="table datatable table-responsive" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: 15%">Nama</th>
                            <th>Username</th>
                            <th class="text-center" style="width: 1%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td></td>
                            <td class="text-nowrap">{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('dashboard.user.edit', $user->id) }}" class="btn btn-secondary">Edit</a>
                                    <button class="btn btn-danger btn-delete" value="{{ $user->id }}" {{ Auth::user()->id == $user->id ? 'disabled' : '' }}>Hapus</button>
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
            $("#delete-form").prop("action", "{{ route('dashboard.user.index') }}/" + id);

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
