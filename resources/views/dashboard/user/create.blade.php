@extends('layouts.dashboard')

@section('title', 'Tambah Pengguna')

@section('style')
    <style>
        ul.error{
            list-style-position: inside;
            padding-left: 0;
        }
        .error>.bx{
            font-size: 0.857rem;
            margin-right: 6px;
        }
    </style>
@endsection

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <a href="{{ route('dashboard.user.index') }}" class="btn btn-primary btn-icon">
                <span class="livicon-evo livicon-evo-holder" data-options="name: arrow-left.svg; style: lines; size: 1.2rem; strokeColor: #ffffff "></span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title font-weight-bold">Tambah Pengguna</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('dashboard.user.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        let indexRoute = "{{ route('dashboard.user.index') }}";
        if ($("a[href='" + indexRoute + "']")[0])
        {
            $("a[href='" + indexRoute + "']").closest("li").addClass("active");
        }
    </script>
@endsection
