@extends('layouts.dashboard')

@section('title', $department->name)

@section('style')
<style>
</style>
@endsection

@section('content')
<div class="row mb-2">
    <div class="col-12">
        <a href="{{ route('dashboard.organizational-structure.index') }}" class="btn btn-primary btn-icon">
            <span class="livicon-evo livicon-evo-holder" data-options="name: arrow-left.svg; style: lines; size: 1.2rem; strokeColor: #ffffff "></span>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title font-weight-bold">{{ $department->name }}</p>
            </div>
            <div class="card-body">
                <p>{{ $department->description }}</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title font-weight-bold">Anggota</p>
                <a href="{{ route('dashboard.member.create') }}?department_id={{ $department->id }}" class="btn btn-primary" id="btn-create">Tambah</a>
            </div>
            <div class="card-body">
                <table class="table datatable table-responsive" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 1%">No</th>
                            <th style="width: 1%">Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th class="text-center" style="width: 1%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($department->members as $member)
                        <tr>
                            <td></td>
                            <td class="text-nowrap">
                                <a href="{{ $member->image }}">
                                    <img src="{{ $member->image }}" style="height: 128px !important; width: auto !important">
                                </a>
                            </td>
                            <td class="text-nowrap">{{ $member->name }}</td>
                            <td class="text-nowrap">{{ $member->position }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('dashboard.member.edit', $member->id) }}"
                                        class="btn btn-secondary">Edit</a>
                                    <button class="btn btn-danger btn-delete" value="{{ $member->id }}">Hapus</button>
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
        $("#delete-form").prop("action", "{{ route('dashboard.member.index') }}/" + id);

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

    let indexRoute = "{{ route('dashboard.organizational-structure.index') }}";
    if ($("a[href='" + indexRoute + "']")[0])
    {
        $("a[href='" + indexRoute + "']").closest("li").addClass("active");
    }
</script>
@endsection
