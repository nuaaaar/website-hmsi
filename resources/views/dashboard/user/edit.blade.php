@extends('layouts.dashboard')

@section('title', 'Edit Pengguna')

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
                    <p class="card-title font-weight-bold">{{ Auth::user()->id != $user->id ? 'Edit Pengguna' : 'Edit Profile' }}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('dashboard.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                    <span class="small text-muted">Abaikan jika tidak ingin mengubah password.</span>
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

        $(document).on("click", ".btn-select-thumbnail", function()
        {
            $(this).siblings(".input-thumbnail").click();
        });

        $(document).on("change", ".input-thumbnail", function()
        {
            var previewElement = $(this).data("preview-element");
            readURL(this, previewElement);
        });

        $(document).on("click", ".btn-delete-thumbnail", function()
        {
            $(this).siblings(".input-thumbnail").val("").trigger("change");
            var checkbox = $(this).data("checkbox-element");
            if (checkbox !== undefined)
            {
                $(checkbox).prop("checked", true)
            }
        });

        function readURL(input, previewElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(previewElement).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }else{
                $(previewElement).attr('src', '/app-assets/images/logo/logo-ngabsen.png');
            }
        }
    </script>
@endsection
