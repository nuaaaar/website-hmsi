@extends('layouts.dashboard')

@section('title', 'Edit Anggota')

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
            <a href="{{ route('dashboard.department.show', $member->department_id) }}" class="btn btn-primary btn-icon">
                <span class="livicon-evo livicon-evo-holder" data-options="name: arrow-left.svg; style: lines; size: 1.2rem; strokeColor: #ffffff "></span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title font-weight-bold">Edit Anggota</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('dashboard.member.update', $member->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label>Nama Departemen</label>
                                    <input type="text" class="form-control" value="{{ $member->department->name }}" readonly>
                                    <input type="hidden" name="department_id" value="{{ $member->department_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto</label>
                                    <img src="{{ $member->image }}" style="height: 256px !important; width: auto !important" class="d-block image-preview mb-1">
                                    <input type="file" name="image" class="form-control input-image" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="position">Jabatan</label>
                                    <input type="text" name="position" class="form-control" value="{{ $member->position }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="index">Index</label>
                                    <input type="number" name="index" class="form-control" value="{{ $member->index }}" required>
                                    <small class="text-muted">Berfungsi untuk mengurutkan list anggota</small>
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

        let indexRoute = "{{ route('dashboard.organizational-structure.index') }}";
        if ($("a[href='" + indexRoute + "']")[0])
        {
            $("a[href='" + indexRoute + "']").closest("li").addClass("active");
        }

        $(document).on("change", ".input-image", function()
        {
            var previewElement = $(this).siblings(".image-preview");
            readURL(this, previewElement);
        });

        function readURL(input, previewElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(previewElement).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }else{
                $(previewElement).attr('src', '/app-assets/images/icon/image.png');
            }
        }
    </script>
@endsection
